<?php

namespace Database\Factories;

use App\Enums\State;
use App\Models\Company;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'website' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->randomElement(State::cases())->value,
            'zip' => $this->faker->postcode(),
            'created_at' => CarbonImmutable::now(),
            'updated_at' => CarbonImmutable::now(),
        ];
    }
}
