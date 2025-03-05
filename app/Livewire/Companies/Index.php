<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Session]
    public int $perPage = 10;

    #[Computed]
    public function companies(): LengthAwarePaginator
    {
        return Company::orderBy('name')->with('users')->paginate($this->perPage);
    }

    public function render(): View
    {
        return view('livewire.companies.index');
    }
}
