<?php

use App\Http\Livewire\Auth\Register;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('should be able to register a user', function(){
    livewire(Register::class)
        ->set('name', 'Joe Doe')
        ->set('email', 'email@email.com')
        ->set('password', 'password')
        ->call('save')
        ->assertHasNoErrors();

    assertDatabaseCount('users', 1);
});

test('all fields should be required', function(){
    livewire(Register::class)
    ->set('name', '')
        ->set('email', '')
        ->set('password', '')
        ->call('save')
        ->assertHasErrors(['name', 'email', 'password']);

    assertDatabaseCount('users', 0);
});

test('email should be valid', function(){
    livewire(Register::class)
    ->set('name', 'Joe Doe')
        ->set('email', 'email#email.com')
        ->set('password', 'password')
        ->call('save')
        ->assertHasErrors(['email']);
    
        assertDatabaseCount('users', 0);
});

