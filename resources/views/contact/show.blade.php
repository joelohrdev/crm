<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contacts : <span class="text-tkd-blue-700">{{ $contact->name }}</span>
            </h2>
            <livewire:client-delete
                :key="$contact->id"
                :client="$contact"
            />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <livewire:contact-show :contact="$contact"/>
            </div>
        </div>
    </div>
</x-app-layout>
