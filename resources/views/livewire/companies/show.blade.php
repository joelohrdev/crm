<div>
    <div class="flex items-center justify-between">
        <flux:heading size="xl">{{ $company->name }}</flux:heading>
        <flux:button
            wire:navigate
            href="{{ route('companies.index') }}"
            variant="primary"
            size="sm"
            class="group relative overflow-hidden transition-all duration-300 hover:pl-6"
        >
            <span
                class="absolute left-0 -translate-x-8 transform opacity-0 transition-transform duration-300 ease-in-out group-hover:translate-x-1 group-hover:opacity-100"
            >
                <svg
                    class="size-4"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                </svg>
            </span>
            Back
        </flux:button>
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

                <flux:button type="submit" variant="primary">Update</flux:button>
            </form>
        </div>
    </div>
</div>
