<div>
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">
                <div class="flex items-center gap-x-3">
                    {{ $company->name }}
                    <flux:button variant="ghost" size="sm" icon="star"></flux:button>
                </div>
            </flux:heading>
            <flux:subheading size="sm">
                <flux:badge variant="pill" size="sm" class="mr-3">Active</flux:badge>
                {{ $company->website }}
            </flux:subheading>
        </div>
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

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            <flux:tabs class="mb-6 w-full" variant="segmented">
                <flux:tab>Overview</flux:tab>
                <flux:tab>Contacts</flux:tab>
                <flux:tab>Deals</flux:tab>
                <flux:tab>Activity</flux:tab>
                <flux:tab>Tasks</flux:tab>
            </flux:tabs>
            <div class="rounded-lg border p-6">
                <flux:heading size="lg">Overview</flux:heading>
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
        <div class="space-y-6">
            <div class="rounded-lg border p-6">right</div>
            <div class="rounded-lg border p-6">right</div>
            <div class="rounded-lg border p-6">right</div>
        </div>
    </div>
</div>
