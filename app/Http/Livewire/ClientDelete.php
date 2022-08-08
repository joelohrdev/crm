<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Filament\Notifications\Notification;
use Livewire\Component;

class ClientDelete extends Component
{
    public $client;
    public $showDeleteModal = false;

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function showDeleteModal()
    {
        $this->showDeleteModal = true;
    }

    public function deleteClient()
    {
        Client::destroy($this->client->id);

        Notification::make()
            ->title('Client Successfully Deleted!')
            ->success()
            ->seconds(5)
            ->iconColor('success')
            ->send();

        return redirect()->route('client.index');

    }

    public function render()
    {
        return view('livewire.client-delete');
    }
}
