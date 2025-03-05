<?php

namespace App\Livewire\Companies;

use App\Livewire\Forms\CompanyForm;
use App\Models\Company;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public CompanyForm $form;

    public function createCompany(): null
    {
        $this->validate();

        $company = Company::create($this->form->all());

        Flux::toast(
            text: 'The company has been created successfully.',
            heading: 'Company created',
            variant: 'success',
        );

        return $this->redirectRoute('companies.show', $company);
    }

    public function render(): View
    {
        return view('livewire.companies.create');
    }
}
