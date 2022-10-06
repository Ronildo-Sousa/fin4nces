<?php

namespace App\Actions\Auth;

use Laravel\Socialite\Facades\Socialite;

class Register
{
    public function run(string $provider)
    {
        $user = Socialite::driver('github')->user();

        dd($user);
    }
}
