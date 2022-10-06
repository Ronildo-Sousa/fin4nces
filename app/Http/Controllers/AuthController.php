<?php

namespace App\Http\Controllers;

use App\Actions\Auth\Register;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function authRedirect(string $provider)
    {
        $validProvider = $this->validateProvider($provider);
        if (!$validProvider) {
            return;
        }
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback(string $provider)
    {
        (new Register)->run($provider);
    }

    private function validateProvider(string $provider): bool
    {
        $provider = strtolower($provider);
        $providers = [
            'github',
        ];

        return in_array($provider, $providers);
    }
}
