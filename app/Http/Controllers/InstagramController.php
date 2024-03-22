<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class InstagramController extends Controller
{
    public function redirectToInstagram()
    {
        return Socialite::driver('instagram')->redirect();
    }

    public function handleInstagramCallback()
    {
        $user = Socialite::driver('instagram')->user();

        // Aquí puedes guardar el token de acceso del usuario en tu base de datos si lo necesitas

        return redirect()->route('publish-post', ['accessToken' => $user->token]);
    }

    public function login()
    {
        return view('instagram_login');
    }
}

