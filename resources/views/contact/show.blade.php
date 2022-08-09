<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Contacts : <span class="text-tkd-blue-700">{{ $contact->name }}</span>
                </h2>
                <livewire:contact-delete
                    :key="$contact->id"
                    :client="$contact"
                />
            </div>
            <div>
                <livewire:contact-show :key="$contact->id" :contact="$contact"/>
            </div>
        </div>
    </div>
</x-app-layout>
