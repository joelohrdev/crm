<?php

namespace App\Livewire\Companies;

use App\Enums\State;
use App\Models\Company;
use App\Models\User;
use Flux\Flux;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public string $name = '';
    public ?string $website = null;
    public ?string $phone = null;
    public ?string $address = null;
    public ?string $city = null;
    public ?State $state = null;
    public ?string $zip = null;
    public ?array $selectedEmployees = null;

    public function createCompany()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255', 'unique:companies,name'],
            'website' => ['nullable', 'url'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', new Enum(State::class)],
            'zip' => ['nullable', 'string', 'max:255'],
            'selectedEmployees' => ['nullable', 'array'],
        ]);

        $company = Company::create([
            'name' => $this->name,
            'website' => $this->website,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ]);

        $company->users()->attach($this->selectedEmployees);

        Flux::toast(
            text: 'The company has been created successfully.',
            heading: 'Company created',
            variant: 'success',
        );

        return $this->redirectRoute('companies.show', $company);
    }

    public function render(): View
    {
        return view('livewire.companies.create', [
            'users' => User::query()
                ->whereNot('id', auth()->id())
                ->orderBy('name')
                ->get(),
        ]);
    }
}
