<?php

namespace App\Livewire\Forms;

use App\Models\Planificacion;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class PostCreateForm extends Form
{
    use WithFileUploads;
    //declaramos las propiedades de la clase
    // #[Rule('required')]
    public $tipo_red_social='';
    // #[Rule('required')]
       public $descripcion;
    //    #[Rule('required')]
       public $date_public_facebook;
    //    #[Rule('required')]
       public $time_public_facebook;
    //    #[Rule('required')]
       public $date_public_instagram;
    //    #[Rule('required')]
       public $time_public_instagram; 
    //    #[Rule('required')]
       public $image;
       public $imageKey;

       public function save()
       {
    
       $this->validate();
      
        $post =  Planificacion::create(
        
       $this->only(['tipo_red_social','descripcion','date_public_facebook','time_public_facebook','date_public_instagram','time_public_instagram'])
           );
           if($this->image){
            $post->media_photo_path = $this->image->store('posts');
            $post->save();
           }

           $this->reset();
           $this->imageKey=rand();
       }
         public function rules()// definimos la validacion de cada propiedad del formulario
    {
       return [
        'tipo_red_social'=>'required',
        'descripcion'=>'required | min:3',
        'date_public_facebook'=>'required',
        'time_public_facebook'=>'required',
        'date_public_instagram'=>'required',
        'time_public_instagram'=>'required',   
        'image'=>'nullable|image|max:1024',
       ];
    }
    public function messages()//    cambiar el mensaje de un input determinado
    {
        return[
            'descripcion.required'=>'El campo descripcion es requerido',
        ];
    }
    public function validationAttributes()//    cambiar el nombre de la propiedad para los usuarios
    {
        return [
            'tipo_red_social'=>'Red Social ',
            'descripcion'=>'Descripcion',
            'date_public_facebook'=>'Fecha ',
            'time_public_facebook'=>'Hora',
            'date_public_instagram'=>'Fecha',
            'time_public_instagram'=>'Hora', 
        ];
    }
}
