<?php

namespace App\Livewire\Forms;

use App\Enums\State;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CompanyForm extends Form
{
    #[Validate('required|string|max:255|unique:companies,name')]
    public string $name = '';

    #[Validate('nullable|url')]
    public string $website = '';

    #[Validate('nullable|string|max:255')]
    public string $phone = '';

    #[Validate('nullable|string|max:255')]
    public string $address = '';

    #[Validate('nullable|string|max:255')]
    public string $city = '';

    #[Validate('nullable', [new Enum(State::class)])]
    public ?State $state = null;

    #[Validate('nullable|string|max:255')]
    public string $zip = '';

    #[Validate('nullable|array')]
    public array $selectedEmployees = [];
}
