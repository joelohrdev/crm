<div>
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Companies</flux:heading>
        <flux:button wire:navigate href="{{ route('companies.create') }}" variant="primary" size="sm">
            Add Company
        </flux:button>
    </div>
    <flux:separator variant="subtle" class="my-4" />

    <div class="mb-5 flex items-center justify-between">
        <flux:input
            type="search"
            wire:model.live.debounce.500ms="search"
            size="sm"
            placeholder="Search..."
            icon="magnifying-glass"
            class="max-w-80"
        />
        <flux:select wire:model.live="perPage" size="sm" class="!w-auto">
            <flux:select.option value="10">10 per page</flux:select.option>
            <flux:select.option value="25">25 per page</flux:select.option>
            <flux:select.option value="50">50 per page</flux:select.option>
            <flux:select.option value="100">100 per page</flux:select.option>
        </flux:select>
    </div>

    <flux:table :paginate="$this->companies">
        <flux:table.columns>
            <flux:table.column
                sortable
                :sorted="$sortBy === 'name'"
                :direction="$sortDirection"
                wire:click="sort('name')"
            >
                Name
            </flux:table.column>
            <flux:table.column>Employees</flux:table.column>
            <flux:table.column>Status</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->companies() as $company)
                <flux:table.row>
                    <flux:table.cell>
                        <div class="flex items-center">
                            {{ $company->name }}
                            @if ($company->favorite)
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="mr-1 h-5 w-5 text-yellow-400"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    />
                                </svg>
                            @endif
                        </div>
                    </flux:table.cell>
                    <flux:table.cell>
                        <div class="flex items-center -space-x-2">
                            @foreach ($company->users as $user)
                                <flux:tooltip :content="$user->name">
                                    <x-avatar>{{ $user->initials() }}</x-avatar>
                                </flux:tooltip>
                            @endforeach
                        </div>
                    </flux:table.cell>
                    <flux:table.cell>
                        <flux:badge size="sm" inset="top bottom" color="{{ $company->status->color() }}">
                            {{ $company->status->label() }}
                        </flux:badge>
                    </flux:table.cell>
                    <flux:table.cell class="flex justify-end">
                        <flux:button
                            wire:navigate.hover
                            href="{{ route('companies.show', $company) }}"
                            size="sm"
                            variant="ghost"
                            inset="top bottom"
                        >
                            View
                        </flux:button>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
