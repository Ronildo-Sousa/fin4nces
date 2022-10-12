<?php

use App\Http\Livewire\Finances\Create;
use App\Models\FinanceType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;


uses(RefreshDatabase::class);

it('Should be able to create a new finance', function () {
    $financeType = FinanceType::factory()->create();

    /** @var User $user */
    $user = User::factory()->createOne();

    actingAs($user);

    livewire(Create::class)
        ->set('finance_type', $financeType->id)
        ->set('date', fake()->date())
        ->set('description', 'Description test')
        ->set('amount', 500)
        ->call('save')
        ->assertHasNoErrors();

    assertDatabaseCount('finances', 1);
});

test('All fields should be required', function () {
    /** @var User $user */
    $user = User::factory()->createOne();

    actingAs($user);

    livewire(Create::class)
        ->set('finance_type')
        ->set('date', '')
        ->set('description', '')
        ->set('amount')
        ->call('save')
        ->assertHasErrors(['finance_type', 'date', 'description', 'amount']);

    assertDatabaseCount('finances', 0);
});

test('Type should be in enum', function () {
    $financeType = FinanceType::factory()->create();

    /** @var User $user */
    $user = User::factory()->createOne();

    actingAs($user);

    livewire(Create::class)
        ->set('finance_type', 0)
        ->set('date', fake()->date())
        ->set('description', 'description test')
        ->set('amount', 30.5)
        ->call('save')
        ->assertHasErrors(['finance_type']);

    assertDatabaseCount('finances', 0);
});

test('Date should be a valid date', function () {
    $financeType = FinanceType::factory()->create();

    /** @var User $user */
    $user = User::factory()->createOne();

    actingAs($user);

    livewire(Create::class)
        ->set('finance_type', $financeType->id)
        ->set('date', 'some date')
        ->set('description', 'description test')
        ->set('amount', 30.5)
        ->call('save')
        ->assertHasErrors(['date']);

    assertDatabaseCount('finances', 0);
});

test('Amount should be grather than zero', function () {
    $financeType = FinanceType::factory()->create();

    /** @var User $user */
    $user = User::factory()->createOne();

    actingAs($user);

    livewire(Create::class)
        ->set('finance_type', $financeType->id)
        ->set('date', fake()->date())
        ->set('description', 'description test')
        ->set('amount', -1)
        ->call('save')
        ->assertHasErrors(['amount']);

    assertDatabaseCount('finances', 0);
});
