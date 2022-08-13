<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-flow-col-dense lg:grid-cols-3">
                <livewire:client-show :client="$client"/>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg space-y-6 lg:col-start-2 lg:col-span-2 p-10">
                    <livewire:client-contacts-index/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
