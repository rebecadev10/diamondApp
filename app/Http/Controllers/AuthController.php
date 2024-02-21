<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JoelButcher\Facebook\Facebook;
use JoelButcher\Facebook\Facades\Facebook as FacebookFacade;
class AuthController extends Controller
{
       public function redirect(){
        // return Socialite::driver('facebook')->redirect();
        $scopes = ['pages_manage_posts', 'pages_read_engagement', 'pages_show_list'];

        $pageUrl =  FacebookFacade::getRedirect(route('auth.callback'), $scopes);

//    return redirect($pageUrl);
    }
    public function callback()
    {
        $token = FacebookFacade::getToken();

        // Configurar el token en la instancia de Facebook
        $fb = app(Facebook::class);
        $fb->getFacebook()->setDefaultAccessToken($token);

        // Obtener el usuario de Facebook
        $user = $fb->getUser();
        echo $user->getId();
        echo $user->getName();
        // Puedes hacer lo que quieras con el usuario, como almacenarlo en la base de datos
        // O simplemente devolverlo a una vista para mostrarlo al usuario
        // return $user;
    }
}
