<?php

namespace App\Http\Controllers;
 
use Facebook\Facebook;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\FacebookRedirectLoginHelper;

class FacebookAuthController extends Controller
{
public function redirectToFacebook()
{
    $fb = new Facebook([
        'app_id' => env('FACEBOOK_APP_ID'),
        'app_secret' => env('FACEBOOK_APP_SECRET'),
        'redirect_uri' => env('FACEBOOK_REDIRECT_URI'),
        'default_graph_version' =>'v12.0',
        'beta_mode' => env('FACEBOOK_ENABLE_BETA', true),
    ]);
    $fb = app(Facebook::class);
    $helper = $fb->getRedirectLoginHelper();
    
    // Generar una URL de inicio de sesión de Facebook
    $permissions = ['email']; // Puedes agregar más permisos según tus necesidades
    $loginUrl = $helper->getLoginUrl(route('facebook.callback'), $permissions);
    
    // Redirigir al usuario a la URL de inicio de sesión de Facebook
    return redirect()->to($loginUrl);
}

public function callback()
{
    $fb = app(Facebook::class);
    $helper = $fb->getRedirectLoginHelper();

    try {
        // Obtener el token de acceso de Facebook
        $accessToken = $helper->getAccessToken();
    } catch (FacebookSDKException $e) {
        // Manejar errores SDK de Facebook
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        return;
    }

    if (!isset($accessToken)) {
        // Si no se obtiene el token de acceso, redirigir al usuario al inicio de sesión
        return $this->redirectToFacebook();
    }

    // El token de acceso se ha obtenido correctamente, ahora puedes usarlo para obtener los datos del usuario
    // Puedes almacenar el token en la sesión, en la base de datos, etc.
    
    // Redirigir al usuario a la página deseada después del inicio de sesión
    return redirect()->route('dashboard');
}
}