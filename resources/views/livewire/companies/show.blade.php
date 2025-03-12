<div>
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">
                <div class="flex items-center">
                    {{ $company->name }}
                    <flux:button wire:click="toggleFavorite" variant="ghost" size="sm">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="{{ $company->favorite ? 'fill-yellow-500 text-yellow-500' : 'text-gray-500' }} size-4 transition-all duration-300 hover:scale-110 active:scale-90"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
                            />
                        </svg>
                    </flux:button>
                </div>
            </flux:heading>
            <flux:subheading size="sm">
                <flux:badge color="{{ $company->status->color() }}" variant="pill" size="sm" class="mr-3">
                    {{ $company->status->label() }}
                </flux:badge>
                {{ $company->website }}
            </flux:subheading>
        </div>
        <flux:button
            wire:navigate
            href="{{ route('companies.index') }}"
            variant="primary"
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

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            <flux:tabs class="mb-6 w-full" variant="segmented">
                <flux:tab>Overview</flux:tab>
                <flux:tab>Contacts</flux:tab>
                <flux:tab>Deals</flux:tab>
                <flux:tab>Activity</flux:tab>
                <flux:tab>Tasks</flux:tab>
            </flux:tabs>
            <flux:card>
                <flux:heading size="lg" class="mb-6">Company Overview</flux:heading>
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
            </flux:card>
        </div>
        <div class="space-y-6">
            <flux:card>
                <flux:heading size="lg" class="mb-6">Company Details</flux:heading>
            </flux:card>
            <flux:card>
                <flux:heading size="lg" class="mb-6">Quick Actions</flux:heading>
            </flux:card>
            <flux:card>
                <flux:heading size="lg" class="mb-6">Upcoming Tasks</flux:heading>
            </flux:card>
        </div>
    </div>
</div>
