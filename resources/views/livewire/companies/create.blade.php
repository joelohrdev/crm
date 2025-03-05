<div>
    <div class="flex items-center justify-between">
        <flux:heading size="xl">Create Company</flux:heading>
    </div>
    <flux:separator variant="subtle" class="my-4" />

    <div class="mx-auto w-full max-w-2xl">
        <form wire:submit.prevent="createCompany" class="space-y-6">
            <flux:field>
                <flux:label badge="Required">Company Name</flux:label>

                <flux:input wire:model="name" />

                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label>Website</flux:label>

                <flux:input wire:model="website" placeholder="https://example.com" />

                <flux:error name="website" />
            </flux:field>

            <flux:field>
                <flux:label>Address</flux:label>

                <flux:input wire:model="address" />

                <flux:error name="address" />
            </flux:field>

            <div class="grid grid-cols-3 gap-6">
                <flux:field>
                    <flux:label>City</flux:label>

                    <flux:input wire:model="city" />

                    <flux:error name="city" />
                </flux:field>

                <flux:field>
                    <flux:label>State</flux:label>
                    <flux:select wire:model="state" variant="listbox" searchable>
                        @foreach (\App\Enums\State::cases() as $state)
                            <flux:select.option :value="$state">{{ $state->label() }}</flux:select.option>
                        @endforeach
                    </flux:select>
                </flux:field>

                <flux:field>
                    <flux:label>Zip Code</flux:label>

                    <flux:input wire:model="zip" />

                    <flux:error name="zip" />
                </flux:field>
            </div>

            <flux:field>
                <flux:label>Phone Number</flux:label>

                <flux:input type="tel" mask="999-999-9999" wire:model="phone" placeholder="999-999-9999" />

                <flux:error name="phone" />
            </flux:field>

            <flux:field>
                <flux:label>Assign Employees</flux:label>
                <flux:select variant="listbox" multiple wire:model="selectedEmployees">
                    @foreach ($users as $user)
                        <flux:select.option :value="$user->id">{{ $user->name }}</flux:select.option>
                    @endforeach
                </flux:select>
            </flux:field>

            <flux:button type="submit" variant="primary">Submit</flux:button>
            <flux:button wire:navigate href="{{ route('companies.index') }}">Cancel</flux:button>
        </form>
    </div>
</div>
