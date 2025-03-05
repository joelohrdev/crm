<?php

namespace App\Livewire\Forms;

use App\Enums\State;
use App\Models\Company;
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

    public function setCompany(Company $company): void
    {
        $this->name = $company->name;
        $this->website = $company->website;
        $this->phone = $company->phone;
        $this->address = $company->address;
        $this->city = $company->city;
        $this->state = $company->state;
        $this->zip = $company->zip;
        $this->selectedEmployees = $company->users->pluck('id')->toArray();
    }

    public function update(Company $company): void
    {
        $this->validate();

        $company->update([
            'name' => $this->name,
            'website' => $this->website,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ]);

        $company->users()->sync($this->selectedEmployees);
    }
}
