<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Filament\Notifications\Notification;
use Livewire\Component;

class ClientsIndex extends Component
{
    public $name;
    public $slug;
    public $status = 'active';
    public $address;
    public $city;
    public $state;
    public $postal_code;
    public $phone_number;
    public $email_address;

    public $showModal = false;

    protected $rules = [
        'name'   => 'required',
        'status' => 'required',
        'address' => 'nullable',
        'city' => 'nullable',
        'state' => 'nullable',
        'postal_code' => 'nullable',
        'phone_number' => 'nullable',
        'email_address' => 'nullable',
    ];

    public function createClient()
    {
        $this->validate();

        $client = Client::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'phone_number' => $this->phone_number,
            'email_address' => $this->email_address,
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
            'clients' => Client::paginate(10)
        ]);
    }
}
