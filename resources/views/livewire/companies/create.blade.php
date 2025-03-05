<div>
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Create Company</flux:heading>
    </div>
    <flux:separator variant="subtle" class="my-4" />

    <div class="mx-auto w-full max-w-2xl">
        <form wire:submit.prevent="createCompany" class="space-y-6">
            <flux:field>
                <flux:label badge="Required">Company Name</flux:label>

                <flux:input wire:model="form.name" />

                <flux:error name="form.name" />
            </flux:field>

            <flux:field>
                <flux:label>Website</flux:label>

                <flux:input wire:model="form.website" placeholder="https://example.com" />

                <flux:error name="form.website" />
            </flux:field>

            <flux:field>
                <flux:label>Address</flux:label>

                <flux:input wire:model="form.address" />

                <flux:error name="form.address" />
            </flux:field>

            <div class="grid grid-cols-3 gap-6">
                <flux:field>
                    <flux:label>City</flux:label>

                    <flux:input wire:model="form.city" />

                    <flux:error name="form.city" />
                </flux:field>

                <flux:field>
                    <flux:label>State</flux:label>
                    <flux:select wire:model="form.state" variant="listbox" searchable>
                        @foreach (\App\Enums\State::cases() as $state)
                            <flux:select.option :value="$state">{{ $state->label() }}</flux:select.option>
                        @endforeach
                    </flux:select>
                </flux:field>

                <flux:field>
                    <flux:label>Zip Code</flux:label>

                    <flux:input wire:model="form.zip" />

                    <flux:error name="form.zip" />
                </flux:field>
            </div>

            <flux:field>
                <flux:label>Phone Number</flux:label>

                <flux:input type="tel" mask="999-999-9999" wire:model="form.phone" placeholder="999-999-9999" />

                <flux:error name="form.phone" />
            </flux:field>

            <flux:button type="submit" variant="primary">Submit</flux:button>
            <flux:button wire:navigate href="{{ route('companies.index') }}">Cancel</flux:button>
        </form>
    </div>
</div>
