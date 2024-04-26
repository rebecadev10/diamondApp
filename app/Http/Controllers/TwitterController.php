<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class TwitterController extends Controller
{
    //
    public function redirect(){
        return Socialite::driver('twitter')->redirect();
    }
    public function callback()
    {
        //  no eliminar stateless para evitar el cierre de sesion ignora el error 
        $user = Socialite::driver('twitter')->stateless()->user();
        
        
        $user  = User::firstOrCreate([
            'facebook_id'=>$user->getId(),
         ],[
             'name' => $user->getName(),
             'email' => $user->getEmail(),
             // 'token' => $token,  //sin permisologia para acceder al token del usuario
             
         ]);
         $this->createUserTeam($user);
         $this->createUserFacebook($user);
        //imprimir informaion que trae facebook del usuario
        // dd($user->token);'
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
}