<?php

use App\Http\Livewire\Finances\Create;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;

it('Should be able to create a new finance', function(){
    /** @var User $user */
    $user = User::factory()->createOne();
    
    actingAs($user);

    livewire(Create::class)
        ->set('type', 'expense')
        ->set('date', fake()->date())
        ->set('description', 'Description test')
        ->set('amount', 500)
        ->call('save')
        ->assertHasNoErrors();
    
    assertDatabaseCount('finances', 1);
});

// test('All fields should be required', function(){

// });

// test('Type should be in enum', function(){

// });

// test('Date should be a valid date', function(){

// });

// test('Amount should be numeric', function(){

// });