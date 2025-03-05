<?php

namespace App\Livewire\Companies\Traits;

trait Searchable
{
    public string $search = '';

    public function updatedSearchable($property): void
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    public function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query->where('name', 'like', '%' . $this->search . '%');
    }
}
