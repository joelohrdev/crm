<?php

namespace App\Livewire\Companies;

use App\Livewire\Forms\CompanyForm;
use App\Models\Company;
use App\Models\User;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public CompanyForm $form;

    public function createCompany(): null
    {
        $this->validate();

        $company = Company::create([
            'name' => $this->form->name,
            'website' => $this->form->website,
            'phone' => $this->form->phone,
            'address' => $this->form->address,
            'city' => $this->form->city,
            'state' => $this->form->state,
            'zip' => $this->form->zip,
        ]);

        $company->users()->attach($this->form->selectedEmployees);

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
            'users' => User::query()->whereNot('name', auth()->user()->name)->orderBy('name')->get(),
        ]);
    }
}
