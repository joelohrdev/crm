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
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">View</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse($clients as $client)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $client->name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->phone_number }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->email_address }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->status }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <a href="#" class="text-tkd-blue-600 hover:text-tkd-blue-900">View<span class="sr-only">, {{ $client->name }}</span></a>
                            </td>
                        </tr>
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
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" value="{{ __('Company Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" />
                    <x-jet-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="slug" autocomplete="slug" />
                    <x-jet-input-error for="slug" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="status" value="{{ __('Status') }}" />
                    <x-jet-input id="status" type="text" class="mt-1 block w-full" wire:model.defer="status" autocomplete="status" />
                    <x-jet-input-error for="status" class="mt-2" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="showModal = false">Cancel</x-jet-secondary-button>
                <x-jet-button type="submit">Save</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
