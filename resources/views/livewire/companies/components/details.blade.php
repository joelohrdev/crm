<flux:card>
    <flux:heading size="lg" class="mb-6">
        Company Details
        <div class="mt-3 space-y-3 text-sm text-gray-500">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-x-2">
                    <flux:icon.calendar />
                    Created
                </div>
                <span>{{ $company->created_at->format('F d, Y') }}</span>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-x-2">
                    <flux:icon.clock />
                    Last Updated
                </div>
                <span>{{ $company->updated_at->format('F d, Y') }}</span>
            </div>
        </div>
    </flux:heading>
</flux:card>
