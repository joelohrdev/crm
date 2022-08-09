<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Filament\Notifications\Notification;
use Livewire\Component;

class ClientShow extends Component
{
    public $client;

    public $showModal = false;

    public function mount(Client $client)
    {
        $this->client = $client;
        $this->name = $client->name;
        $this->status = $client->status;
        $this->address = $client->address;
        $this->city = $client->city;
        $this->state = $client->state;
        $this->postal_code = $client->postal_code;
        $this->phone_number = $client->phone_number;
        $this->email_address = $client->email_address;
    }

    public function showModal()
    {
        $this->showModal = true;
    }

    public function updateClient()
    {
        $this->client->update([
            'name' => $this->name,
            'status' => $this->status,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'phone_number' => $this->phone_number,
            'email_address' => $this->email_address,
        ]);

        $this->showModal = false;

        Notification::make()
            ->title('Client Successfully Updated!')
            ->success()
            ->seconds(5)
            ->iconColor('success')
            ->send();
    }

    public function render()
    {
        return view('livewire.client-show');
    }
}
