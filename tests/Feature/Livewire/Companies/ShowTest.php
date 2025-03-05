<?php

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
