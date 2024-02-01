<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\Team;
use App\Models\User;
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
        
        // dd($user->getName());
        // $name=$user->getName();
        $user  = User::firstOrCreate([
            'email' => $user->getEmail(),
        ],[
            'name' => $user->getName(),
            
            'tokenFacebook' => $user->getId(),
        ]);
        $this->createUser($user);
        // Team::forceCreate([
        //     'user_id' => $user->id,
        //     'name' => explode(' ', $name, 2)[0]."'s Team",
        //     'personal_team' => true,
        // ]);
        
        // dd($user);
        auth()->login($user);
        return redirect()->to('/dashboard');
    }
    protected function createUser(User $user): void
  {
    $user->ownedTeams()->save(Team::forceCreate([
        'user_id' => $user->tokenFacebook,
        'name' => explode(' ', $user->name, 2)[0]."'s Team",
        'personal_team' => true,
    ]));
    
  }
}
