<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class ClientShow extends Component
{
    public $client;

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.client-show');
    }
}
