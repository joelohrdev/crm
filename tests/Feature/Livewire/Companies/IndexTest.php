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

test('it can not see all companies if not admin', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $user = User::factory()->create(['is_admin' => false]);

    $adminCompany = Company::factory()->create();
    $userCompany = Company::factory()->create();

    $admin->companies()->attach($adminCompany);
    $user->companies()->attach($userCompany);

    $this->actingAs($user);

    $response = $this->get('/companies')
        ->assertDontSee($adminCompany->name)
        ->assertSee($userCompany->name);
});
