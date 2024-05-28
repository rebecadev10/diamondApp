<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\Team;
use App\Models\User;
use App\Models\UserFacebook;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect(){
  return Socialite::driver('facebook')->scopes(['email'])->redirect();
    }
    public function callback()
    {
        //  no eliminar stateless para evitar el cierre de sesion ignora el error 
        $facebookUser = Socialite::driver('facebook')->stateless()->user();
        
        //imprimir informaion que trae facebook del usuario
        // dd($user->token);

        // $token = $user->token; // Acceder correctamente al token del usuario


        // Verificar si el usuario ya está registrado
        $user = User::where('facebook_id', $facebookUser->getId())->orWhere('email', $facebookUser->getEmail())->first();
//si no existe, registramos el usuario y creamos el equipo
if(!$user){

  $user  = User::firstOrCreate([
    'facebook_id'=>$user->getId(),
 ],[
     'name' => $user->getName(),
     'email' => $user->getEmail(),
     'token' => $user->token,  //sin permisologia para acceder al token del usuario
     
 ]);
 $this->createUserTeam($user);
 $this->createUserFacebook($user);

}

        
        // dd($user);
        auth()->login($user);
        return redirect()->to('/dashboard');
    }
    protected function createUserTeam(User $user): void
  {
    $user->ownedTeams()->save(Team::forceCreate([
        'user_id' => $user->id,
        'name' => explode(' ', $user->name, 2)[0]."'s Team",
        'personal_team' => true,
    ]));
    
  }

  protected function createUserFacebook(User $user): void
  {
   UserFacebook::forceCreate([
        'facebook_id' => $user->id,
        'name' =>  $user->name,
        'email'=> $user->email,
        
        // investigar como acceder al token de facebook del usuario
        
    ]);
    
  }
}
