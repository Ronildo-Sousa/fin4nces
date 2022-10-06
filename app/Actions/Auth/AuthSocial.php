<?php

namespace App\Actions\Auth;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthSocial
{
    public function run(string $provider): array
    {
        $providerUser = Socialite::driver($provider)->user();
      
        /**
         * @var User $user
         */
        $user = User::query()
            ->updateOrCreate([
                'auth_id' => $providerUser->id,
            ],[
                'name' => $providerUser->name,
                'email' => $providerUser->email,
                'password' => $providerUser->token,
                'auth_provider' => $provider,
                'auth_secret' => $providerUser->token
            ]);
        
       
        if($user->tokens->count() > 0) {
            $user->tokens()->delete();
        }
        $token = $user->createToken($user->email)->plainTextToken;
        
        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
