<?php

use App\Enums\State;
use App\Livewire\Companies\Create;
use App\Models\Company;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guests are redirected to the login page', function () {
    $this->get('/companies/create')->assertRedirect('/login');
});

test('company index page is displayed', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/companies/create')
        ->assertSee('Create Company')
        ->assertOk();
});

test('new company can be created', function () {
    $this->actingAs($user = User::factory()->create());

    $response = Livewire::test(Create::class)
        ->set('name', 'Test Company')
        ->set('website', 'https://testcompany.com')
        ->set('address', '123 Fake St.')
        ->set('city', 'Springfield')
        ->set('state', State::ALABAMA)
        ->set('zip', '62701')
        ->call('createCompany');

    // TODO: Add random users to the company

    $response->assertHasNoErrors();

    $company = Company::where('name', 'Test Company')->first();

    $response->assertRedirect(route('companies.show', $company));
});

test('new company can not be created without name', function () {
    $this->actingAs($user = User::factory()->create());

    $response = Livewire::test(Create::class)
        ->set('website', 'https://testcompany.com')
        ->set('address', '123 Fake St.')
        ->set('city', 'Springfield')
        ->set('state', 'IL')
        ->set('zip', '62701')
        ->call('createCompany');

    $response->assertHasErrors();
});
