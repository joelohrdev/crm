<?php

namespace App\Livewire\Companies;

use App\Enums\State;
use App\Models\Company;
use App\Models\User;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public Company $company;
    public $name;
    public $website;
    public $phone;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $status;
    public $favorite;
    public $selectedEmployees = [];

    public function mount(): void
    {
        $this->name = $this->company->name;
        $this->website = $this->company->website;
        $this->phone = $this->company->phone;
        $this->address = $this->company->address;
        $this->city = $this->company->city;
        $this->state = $this->company->state;
        $this->zip = $this->company->zip;
        $this->selectedEmployees = $this->company->users->pluck('id')->toArray();
    }

    public function toggleFavorite(): void
    {
        $this->company->update([
            'favorite' => ! $this->company->favorite,
        ]);
    }

    public function updateCompany(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('companies', 'id')->ignore($this->company->id)],
            'website' => ['nullable', 'url'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', new Enum(State::class)],
            'zip' => ['nullable', 'string', 'max:255'],
            'selectedEmployees' => ['nullable', 'array'],
        ]);

        $this->company->update([
            'name' => $this->name,
            'website' => $this->website,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ]);

        $this->company->users()->sync($this->selectedEmployees);

        Flux::toast(
            text: 'Company Updated Successfully',
            variant: 'success',
        );
    }

    public function getUsers()
    {
        return cache()->remember('assigned-users', now()->addMinutes(5), function () {
            return User::query()
                ->whereNot('id', auth()->id())
                ->orderBy('name')
                ->get();
        });
    }

    public function render(): View
    {
        return view('livewire.companies.show', [
            'users' => $this->getUsers(),
        ])->title($this->company->name);
    }
}
