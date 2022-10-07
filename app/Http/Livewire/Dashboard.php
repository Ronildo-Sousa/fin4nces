<?php

namespace App\Http\Livewire;

use App\Actions\Auth\AuthSocial;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount(string $provider)
    {
        $payload = (new AuthSocial)->run($provider);
        dd($payload);
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
