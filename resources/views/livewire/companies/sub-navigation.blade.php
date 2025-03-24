<flux:navbar class="mb-6">
    <flux:navbar.item wire:navigate href="{{ route('companies.show', $company) }}">Overview</flux:navbar.item>
    <flux:navbar.item wire:navigate href="{{ route('companies.contacts.index', $company) }}">
        Contacts
    </flux:navbar.item>
    <flux:navbar.item href="#">Activity</flux:navbar.item>
    <flux:navbar.item href="#">Deals</flux:navbar.item>
    <flux:navbar.item href="#">Tasks</flux:navbar.item>
</flux:navbar>
