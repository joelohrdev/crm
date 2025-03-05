<?php

namespace App\Livewire\Companies;

use App\Livewire\Companies\Traits\Searchable;
use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use Searchable, WithPagination;

    #[Session]
    public int $perPage = 10;

    public $sortBy = 'name';
    public $sortDirection = 'asc';

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
        $query = Company::with('users');

        $query = $this->applySearch($query);

        return $query
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate($this->perPage);
    }

    public function render(): View
    {
        return view('livewire.companies.index');
    }
}
