<?php

namespace App\Actions\Auth;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthSocial
{
    public function run(string $provider): bool
    {
        $providerUser = Socialite::driver($provider)->user();

        try {
            /**
             * @var User $user
             */
            $user = User::query()
                ->updateOrCreate([
                    'auth_id' => $providerUser->id,
                ], [
                    'name' => $providerUser->name,
                    'email' => $providerUser->email,
                    'password' => $providerUser->token,
                    'auth_provider' => $provider,
                    'auth_secret' => $providerUser->token
                ]);
            Auth::login($user);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
