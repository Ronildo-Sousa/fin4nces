<?php

namespace App\Http\Controllers;

use App\Actions\Auth\AuthSocial;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Response;

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

    public function authRgister(string $provider)
    {
        $playload = (new AuthSocial)->run($provider);

        return response()->json([$playload], Response::HTTP_CREATED);
    }
}
