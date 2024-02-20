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
        return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
        //  no eliminar stateless para evitar el cierre de sesion ignora el error 
        $user = Socialite::driver('facebook')->stateless()->user();
        
        // dd($user->token);
        // $name=$user->getName();
        $user  = User::firstOrCreate([
           'facebook_id'=>$user->getId(),
        ],[
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'token' => $user->token,
            
        ]);
        $this->createUserTeam($user);
        $this->createUserFacebook($user);
        // Team::forceCreate([
        //     'user_id' => $user->id,
        //     'name' => explode(' ', $name, 2)[0]."'s Team",
        //     'personal_team' => true,
        // ]);
        
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
        'tokenFacebook' =>$user->token,
        // 'tokenFacebook' => $user->token['access_token'],
        // investigar como acceder al token de facebook del usuario
        
    ]);
    
  }
}
