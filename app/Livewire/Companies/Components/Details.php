<?php

namespace App\Livewire\Companies\Components;

use App\Models\Company;
use Illuminate\View\View;
use Livewire\Component;

class Details extends Component
{
    public Company $company;

    public function render(): View
    {
        return view('livewire.companies.components.details');
    }
}
