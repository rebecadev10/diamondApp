<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use App\Models\UserGoogle;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        //  no eliminar stateless para evitar el cierre de sesion ignora el error 
        $googleUser = Socialite::driver('google')->stateless()->user();
      
        $user = User::firstOrCreate([
            'google_id' => $googleUser->getId(),
        ], [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
        $this->createUserTeam($user);
        $this->createUserGoogle($user);
     
        auth()->login($user);  
        return redirect('/dashboard');
    }
    protected function createUserTeam(User $user):void
    {
    $user->ownedTeams()->save(Team::forceCreate([
        'user_id' => $user->id,
        'name' => explode(' ', $user->name, 2)[0]."'s Team",
        'personal_team' => true,
    ]));       
}
protected function createUserGoogle(User $user): void
{
 UserGoogle::forceCreate([
      'google_id' => $user->id,
      'name' =>  $user->name,
      'email'=> $user->email,
      'google_token' => $user->token,
      'google_refresh_token' => $user->refreshToken,
      
      // investigar como acceder al token de facebook del usuario
      
  ]);
  
}
}

