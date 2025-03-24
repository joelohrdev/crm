<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Illuminate\View\View;
use Livewire\Component;

class SubNavigation extends Component
{
    public Company $company;

    public function render(): View
    {
        return view('livewire.companies.sub-navigation');
    }
}
