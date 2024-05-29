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
        // dd($facebookUser);

        // $token = $user->token; // Acceder correctamente al token del usuario


        // Verificar si el usuario ya está registrado
        $user = User::where('facebook_id', $facebookUser->getId())->orWhere('email', $facebookUser->getEmail())->first();
// //si no existe, registramos el usuario y creamos el equipo
if(!$user){

  $facebookUser  = User::firstOrCreate([
    'facebook_id'=>$facebookUser->getId(),
 ],[
     'name' => $facebookUser->getName(),
     'email' => $facebookUser->getEmail(),
     // 'token' => $token,  //sin permisologia para acceder al token del usuario
     
 ]);
//  $user=$facebookUser;
 $this->createUserTeam($facebookUser);
 $this->createUserFacebook($facebookUser);

}

        
//         // dd($user);
        auth()->login($user);
        return redirect()->to('/dashboard');
    }
    protected function createUserTeam(User $facebookUser): void
  {
    $facebookUser->ownedTeams()->save(Team::forceCreate([
        'user_id' => $facebookUser->id,
        'name' => explode(' ', $facebookUser->name, 2)[0]."'s Team",
        'personal_team' => true,
    ]));
    
  }

  protected function createUserFacebook(User $facebookUser): void
  {
   UserFacebook::forceCreate([
        'facebook_id' => $facebookUser->id,
        'name' =>  $facebookUser->name,
        'email'=> $facebookUser->email,
        
        // investigar como acceder al token de facebook del usuario
        
    ]);
    
  }
}
