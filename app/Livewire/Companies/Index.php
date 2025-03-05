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

    public $sortBy = 'name';
    public $sortDirection = 'desc';

    public function sort($column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[Computed]
    public function companies(): LengthAwarePaginator
    {
        return Company::query()
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->orderBy('name')
            ->with('users')
            ->paginate($this->perPage);
    }

    public function render(): View
    {
        return view('livewire.companies.index');
    }
}
