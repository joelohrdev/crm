<div class="bg-white shadow overflow-hidden sm:rounded-lg lg:col-start-1 lg:col-span-1">
    <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
        <div class="flex space-x-3">
            <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $client->name }}</h3>
            @if($client->status === 'active')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800"> Active </span>
            @else
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800"> Closed </span>
            @endif
        </div>
        <div
             x-data="{ open: false }"
             @click.away="open = false"
             @close.stop="open = false"
             class="flex-shrink-0 pr-2 relative"
        >
            <button
                type="button"
                class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
                id="pinned-project-options-menu-0-button"
                @click="open = ! open"
            >
                <span class="sr-only">Open options</span>
                <svg class="w-5 h-5" x-description="Heroicon name: solid/dots-vertical" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                </svg>
            </button>

            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="z-10 mx-3 origin-top-right absolute right-10 top-3 w-48 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                x-ref="menu-items"
                x-description="Dropdown menu, show/hide based on menu state."
                x-bind:aria-activedescendant="activeDescendant"
                role="menu"
                aria-orientation="vertical"
                aria-labelledby="pinned-project-options-menu-0-button"
                tabindex="-1"
                @keydown.arrow-up.prevent="onArrowUp()"
                @keydown.arrow-down.prevent="onArrowDown()"
                @keydown.tab="open = false"
                @keydown.enter.prevent="open = false; focusButton()"
                @keyup.space.prevent="open = false; focusButton()"
                style="display: none;"
            >

                <div class="py-1" role="none">
                    <livewire:client-edit
                        :key="$client->id"
                        :client="$client"
                    />
                    <livewire:client-delete
                        :key="$client->id"
                        :client="$client"
                    />                </div>
            </div>

        </div>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
        <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Address</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->address }} <br />{{ $client->city }}, {{ $client->state }} {{ $client->postal_code }}</dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Phone Number</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->phone_number }}</dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Email address</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $client->email_address }}</dd>
            </div>
        </dl>
    </div>
</div>
