<?php

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
