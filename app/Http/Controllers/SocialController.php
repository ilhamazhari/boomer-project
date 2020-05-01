<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;

class SocialController extends Controller
{
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        try{
            $user = Socialite::driver($driver)->user();

            $create = User::firstOrCreate([
                'email' => $user->getEmail()
                ], [
                'socialite_id' => $user->getId(),
                'socialite_name' => $user->driver(),
                'fullname' => $user->getName(),
                'photo' => $user->getAvatar(),
                'email_verified_at' => now(),
            ]);

            auth()->login($create, true);
            return redirect($this->redirectPath());
        }catch(\Exception $e){
            return redirect()->route('login');
        }
    }
}
