<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Computed]
    public function companies(): LengthAwarePaginator
    {
        return Company::orderBy('name')->paginate(12);
    }

    public function render(): View
    {
        return view('livewire.companies.index');
    }
}
