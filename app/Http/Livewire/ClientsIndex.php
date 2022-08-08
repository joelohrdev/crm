<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Filament\Notifications\Notification;
use Livewire\Component;

class ClientsIndex extends Component
{
    public $name;
    public $slug;
    public $status;

    public $showModal = false;

    protected $rules = [
        'name'   => 'required',
        'slug'   => 'required',
        'status' => 'required',
    ];

    public function createClient()
    {
        $this->validate();

        $client = Client::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
        ]);

        $this->reset();

        $this->showModal = false;

        Notification::make()
            ->title('Client Successfully Saved!')
            ->success()
            ->seconds(5)
            ->send();
    }

    public function create()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.clients-index', [
            'clients' => Client::paginate(20)
        ]);
    }
}
