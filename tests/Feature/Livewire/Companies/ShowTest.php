<?php

use App\Livewire\Companies\Show;
use App\Models\Company;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('a company can be shown', function () {
    $this->actingAs(User::factory()->create());

    $company = Company::factory()->create();

    $response = $this->get(route('companies.show', $company));

    $response->assertStatus(200);
    $response->assertSee($company->name);
});

test('a company cannot be shown when the user is not authenticated', function () {
    $company = Company::factory()->create();

    $response = $this->get(route('companies.show', $company));

    $response->assertRedirect(route('login'));
});

test('company information can be updated', function () {
    $this->actingAs(User::factory()->create());

    $company = Company::factory()->create();

    $response = Livewire::test(Show::class, ['company' => $company])
        ->set('name', 'New Company Name')
        ->call('updateCompany');

    $response->assertHasNoErrors();

    $company->refresh();

    expect($company->name)->toBe('New Company Name');
});
