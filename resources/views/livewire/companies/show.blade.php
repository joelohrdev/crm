<div>
    <div class="flex items-center justify-between">
        <flux:heading size="xl">{{ $company->name }}</flux:heading>
    </div>
    <flux:separator variant="subtle" class="my-4" />
    <div class="mt-6 flex flex-col gap-4 lg:flex-row lg:gap-6">
        <div class="w-80">
            <flux:navlist>
                <flux:navlist.group>
                    <flux:navlist.item href="{{ route('companies.show', $company) }}">General</flux:navlist.item>
                    <flux:navlist.item href="#">Contacts</flux:navlist.item>
                    <flux:navlist.item href="#">Deals</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>
        </div>
        <div class="flex-1 space-y-6">
            <form wire:submit.prevent="updateCompany" class="space-y-6">
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

                <flux:field>
                    <flux:label>Assign Employees</flux:label>
                    <flux:select variant="listbox" multiple wire:model="form.selectedEmployees">
                        @foreach ($users as $user)
                            <flux:select.option :value="$user->id">{{ $user->name }}</flux:select.option>
                        @endforeach
                    </flux:select>
                </flux:field>

                <flux:button type="submit" variant="primary">Update</flux:button>
            </form>
        </div>
    </div>
</div>
