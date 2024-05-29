<?php

namespace App\Livewire\Forms;

use App\Models\Planificacion;
use App\Models\PhotosPublicPost;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PostCreateForm extends Form
{
    use WithFileUploads;

    public $tipo_red_social = '';
    public $descripcion;
    public $date_public_facebook;
    public $time_public_facebook;
    public $date_public_instagram;
    public $time_public_instagram; 
    public $images = [];
    public $imageKey;

    protected $rules = [
        'tipo_red_social' => 'required',
        'descripcion' => 'required|min:3',
        'date_public_facebook' => 'required|date',
        'time_public_facebook' => 'required',
        'date_public_instagram' => 'required|date',
        'time_public_instagram' => 'required',
        'images.*' => 'nullable|image', // Validate each image individually
    ];

    protected $messages = [
        'descripcion.required' => 'El campo descripcion es requerido',
    ];

    protected $validationAttributes = [
        'tipo_red_social' => 'Red Social',
        'descripcion' => 'Descripcion',
        'date_public_facebook' => 'Fecha',
        'time_public_facebook' => 'Hora',
        'date_public_instagram' => 'Fecha',
        'time_public_instagram' => 'Hora',
        'images' => 'Imagenes',
    ];

    public function mount()
    {
        $this->imageKey = rand();
    }

    public function save()
    {
        $this->validate();

        // Crear la planificación
        $post = Planificacion::create([
            'tipo_red_social' => $this->tipo_red_social,
            'descripcion' => $this->descripcion,
            'date_public_facebook' => $this->date_public_facebook,
            'time_public_facebook' => $this->time_public_facebook,
            'date_public_instagram' => $this->date_public_instagram,
            'time_public_instagram' => $this->time_public_instagram,
            //'user_id' => Auth::id(), // Obtener el ID del usuario autenticado
        ]);

        // Guardar las imágenes y crear registros en la tabla PhotosPublicPost
        foreach ($this->images as $index => $image) {
            $imagePath = $image->store('posts');
            $post->photosPublicPost()->create([
                'image_path' => $imagePath,
            ]);
            // Mantenemos un seguimiento de las claves de las imágenes para restablecerlas después de guardar
            $this->imageKey[$index] = rand();
        }

        // Realizar la publicación en Facebook
        $this->publicarEnFacebook($post);

        // Limpiar el formulario y restablecer las claves de las imágenes
        $this->reset(['images', 'imageKey']);
        
        // Redireccionar a la página de planificación
        return redirect()->route('planificacion');
    }

    protected function publicarEnFacebook(Planificacion $post)
    {
        $accessToken = $this->obtenerAccessTokenFacebook(); // Obtener el token de acceso de Facebook

        // Obtener la URL de la imagen
        $imageURL = $this->obtenerURLImagenFacebook($post->photosPublicPost->first()->image_path);

        // Subir la imagen a Facebook
        $response = Http::withToken($accessToken)
            ->post('https://graph.facebook.com/me/photos', [
                'url' => $imageURL,
                'published' => false, // Publicar como borrador
                'caption' => $post->descripcion,
                'scheduled_publish_time' => $this->calcularFechaPublicacion($post->date_public_facebook, $post->time_public_facebook)->getTimestamp(),
            ]);

        // Verificar si la publicación de la imagen fue exitosa
        if ($response->successful()) {
            $photoId = $response['id'];
            // Publicar la imagen subida en el feed
            Http::withToken($accessToken)
                ->post('https://graph.facebook.com/me/feed', [
                    'attached_media' => json_encode([['media_fbid' => $photoId]]),
                    'message' => $post->descripcion,
                    'scheduled_publish_time' => $this->calcularFechaPublicacion($post->date_public_facebook, $post->time_public_facebook)->getTimestamp(),
                ]);
        } else {
            // Manejar el error de subida
            throw new \Exception('Error al subir la imagen a Facebook: ' . $response['error']['message']);
        }
    }

    protected function obtenerAccessTokenFacebook()
    {
        $shortLivedToken = Auth::user()->facebook_access_token; // Obtener el token de acceso de Facebook del usuario autenticado

        // Intercambiar el token de acceso de corta duración por uno de larga duración
        $response = Http::get('https://graph.facebook.com/oauth/access_token', [
            'grant_type' => 'fb_exchange_token',
            'client_id' => env('FACEBOOK_APP_ID'),
            'client_secret' => env('FACEBOOK_APP_SECRET'),
            'fb_exchange_token' => $shortLivedToken,
        ]);

        if ($response->successful()) {
            return $response->json()['access_token'];
        }

        throw new \Exception('Error al obtener el token de acceso de Facebook: ' . $response['error']['message']);
    }

    protected function calcularFechaPublicacion($date, $time)
    {
        $dateTime = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $time);
        return $dateTime->addMinutes(5); // Agregar un pequeño margen de tiempo
    }

    protected function obtenerURLImagenFacebook($photoPath)
    {
        // Lógica para obtener la URL de la imagen almacenada en tu sistema de archivos
        return asset('storage/' . $photoPath);
    }

    public function render()
    {
        $user = Auth::user();
        $facebookAccount = $user->facebookAccount;

        return view('livewire.forms.post-create-form', compact('facebookAccount'));
    }
}
