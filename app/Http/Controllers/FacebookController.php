<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
     public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // Aquí puedes guardar el token de acceso del usuario en tu base de datos si lo necesitas

        return redirect()->route('publish-post', ['accessToken' => $user->token]);
    }

    public function publishPost(Request $request)
    {
        $accessToken = $request->input('accessToken');
        // Puedes utilizar el accessToken para publicar en el perfil de Facebook del usuario
    }
}
