<?php

namespace App\Livewire\Companies;

use App\Livewire\Forms\CompanyForm;
use App\Models\Company;
use App\Models\User;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public Company $company;
    public CompanyForm $form;
    public $name;

    public function mount(): void
    {
        $this->form->setCompany($this->company);
    }

    public function updateCompany(): void
    {
        $this->form->update($this->company);

        Flux::toast(
            text: 'Company Updated Successfully',
            variant: 'success',
        );
    }

    public function render(): View
    {
        return view('livewire.companies.show', [
            'users' => User::query()
                ->whereNot('id', auth()->id())
                ->orderBy('name')
                ->get(),
        ]);
    }
}
