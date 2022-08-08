<div class="px-4 sm:px-6 lg:px-8">
    <div class="flex justify-end sm:items-center">
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <button wire:click="create" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-tkd-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-tkd-blue-700 focus:outline-none focus:ring-2 focus:ring-tkd-blue-500 focus:ring-offset-2 sm:w-auto">Add client</button>
        </div>
    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">View</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($clients as $client)
                            <livewire:client-index
                                :key="$client->id"
                                :client="$client"
                            />
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="text-center py-5">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No clients</h3>
                                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new client.</p>
                                        <div class="mt-6">
                                            <button wire:click="create" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-tkd-blue-600 hover:bg-tkd-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-tkd-blue-500">
                                                <!-- Heroicon name: solid/plus -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                                </svg>
                                                New Project
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
    <form wire:submit.prevent="createClient" action="#" method="post">
        <x-jet-dialog-modal wire:model.defer="showModal">
            <x-slot name="title">Create new client</x-slot>
            <x-slot name="content">
                <div class="mb-5">
                    <input wire:model.defer="name" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Company Name" required>
                </div>
                <div class="mb-5">
                    <select wire:model.defer="status" name="status" id="status" class="w-full bg-gray-100 text-sm rounded-lg border-none px-4 py-2">
                        <option value="active">Active</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>
                <div class="mb-5">
                    <input wire:model.defer="address" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Address" required>
                </div>
                <div class="mb-5">
                    <input wire:model.defer="city" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="City" required>
                </div>
                <div class="mb-5">
                    <input wire:model.defer="state" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="State" required>
                </div>
                <div class="mb-5">
                    <input wire:model.defer="postal_code" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Zip Code" required>
                </div>
                <div class="mb-5">
                    <input wire:model.defer="phone_number" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Phone Number" required>
                </div>
                <div class="mb-5">
                    <input wire:model.defer="email_address" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Email Address" required>
                </div>
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" wire:click="$set('showModal', false)">
                    Cancel
                </button>
                <button type="submit" class="ml-5 inline-flex items-center px-4 py-2 bg-tkd-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-tkd-blue-700 active:bg-tkd-blue-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Save
                </button>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
