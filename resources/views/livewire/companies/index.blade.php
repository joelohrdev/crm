<div>
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Companies</flux:heading>
        <flux:button wire:navigate href="{{ route('companies.create') }}" variant="primary" size="sm">
            Add Company
        </flux:button>
    </div>
    <flux:separator variant="subtle" class="my-4" />

    <div class="mb-5 flex justify-end">
        <flux:select wire:model.live="perPage" size="sm" class="!w-auto">
            <flux:select.option value="10">10 per page</flux:select.option>
            <flux:select.option value="25">25 per page</flux:select.option>
            <flux:select.option value="50">50 per page</flux:select.option>
            <flux:select.option value="100">100 per page</flux:select.option>
        </flux:select>
    </div>

    <flux:table :paginate="$this->companies">
        <flux:table.columns>
            <flux:table.column>Name</flux:table.column>
            <flux:table.column>Employees</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->companies() as $company)
                <flux:table.row>
                    <flux:table.cell>{{ $company->name }}</flux:table.cell>
                    <flux:table.cell>
                        <div class="flex items-center -space-x-2">
                            @foreach ($company->users as $user)
                                <flux:tooltip :content="$user->name">
                                    <x-avatar>{{ $user->initials() }}</x-avatar>
                                </flux:tooltip>
                            @endforeach
                        </div>
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
