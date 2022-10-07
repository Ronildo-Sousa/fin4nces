<?php

namespace App\Http\Livewire\Auth;

use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;

class Form extends Component
{
    public function authenticate(string $provider)
    {
        $validProvider = $this->validateProvider($provider);
        if (!$validProvider) {
            return;
        }
   
        return redirect()->to(Socialite::driver($provider)->redirect()->getTargetUrl());
    }

    private function validateProvider(string $provider): bool
    {
        $provider = strtolower($provider);
        $providers = [
            'github',
        ];

        return in_array($provider, $providers);
    }

    public function render()
    {
        return view('livewire.auth.form');
    }
}
