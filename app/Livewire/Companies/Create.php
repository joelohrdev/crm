<?php

namespace App\Livewire\Companies;

use App\Livewire\Forms\CompanyForm;
use Illuminate\View\View;
use Livewire\Component;

class Create extends Component
{
    public CompanyForm $form;

    public function createCompany(): void
    {
        $this->validate();
    }

    public function render(): View
    {
        return view('livewire.companies.create');
    }
}
