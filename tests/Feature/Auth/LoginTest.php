<?php

use App\Http\Livewire\Auth\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertAuthenticatedAs;
use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

it('Should be able to sing in to an account', function(){
    /** @var User $user */
    $user = User::factory()->createOne();

    livewire(Login::class)
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertHasNoErrors();

    assertAuthenticatedAs($user);
});
test('Email should be required', function(){
    livewire(Login::class)
        ->set('email', '')
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors(['email']);
});
test('Email should be valid', function(){
    livewire(Login::class)
        ->set('email', 'email#email.com')
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors(['email']);
});
test('Pasword should be required', function(){
    livewire(Login::class)
        ->set('email', 'email@email.com')
        ->set('password', '')
        ->call('login')
        ->assertHasErrors(['password']);
});
