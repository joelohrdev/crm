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
            <flux:table.column>Status</flux:table.column>
            <flux:table.column>Amount</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->companies() as $company)
                <flux:table.row>
                    <flux:table.cell>{{ $company->name }}</flux:table.cell>
                    <flux:table.cell>
                        <div class="flex items-center -space-x-2">
                            @foreach ($company->users as $user)
                                <flux:tooltip :content="$user->name">
                                    <span
                                        class="inline-flex size-8 items-center justify-center rounded-full border border-gray-200 bg-white text-xs font-semibold text-gray-800 shadow-2xs dark:border-neutral-700 dark:bg-neutral-900 dark:text-white"
                                    >
                                        {{ $user->initials() }}
                                    </span>
                                </flux:tooltip>
                            @endforeach
                        </div>
                    </flux:table.cell>
                    <flux:table.cell>
                        <flux:badge color="green" size="sm" inset="top bottom">Paid</flux:badge>
                    </flux:table.cell>
                    <flux:table.cell variant="strong">$49.00</flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
