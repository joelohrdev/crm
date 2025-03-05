<div>
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Companies</flux:heading>
        <flux:button variant="primary" size="sm">Add Company</flux:button>
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
            <flux:table.column>Date</flux:table.column>
            <flux:table.column>Status</flux:table.column>
            <flux:table.column>Amount</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->companies() as $company)
                <flux:table.row>
                    <flux:table.cell>{{ $company->name }}</flux:table.cell>
                    <flux:table.cell>Jul 29, 10:45 AM</flux:table.cell>
                    <flux:table.cell>
                        <flux:badge color="green" size="sm" inset="top bottom">Paid</flux:badge>
                    </flux:table.cell>
                    <flux:table.cell variant="strong">$49.00</flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
