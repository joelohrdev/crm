<?php

use App\Models\Company;
use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guests are redirected to the login page', function () {
    $this->get('/companies')->assertRedirect('/login');
});

test('company index page is displayed', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/companies')
        ->assertSee('Add Company')
        ->assertOk();
});

test('it can see companies', function () {
    $this->actingAs($user = User::factory()->create());

    $companies = Company::factory()->count(5)->create();

    $response = $this->get('/companies');

    $response->assertSee($companies->first()->name);
});
