<?php

namespace App\Http\Livewire;

use Filament\Forms;
use App\Models\Client;
use Filament\Notifications\Notification;
use Livewire\Component;

class ClientEdit extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public Client $client;

    public $showModal = false;

    public function showModal()
    {
        $this->showModal = true;
    }

    public function mount(Client $client)
    {
        $this->client = $client;

        $this->form->fill([
            'name' => $this->client->name,
            'status' => $this->client->status,
            'address' => $this->client->address,
            'city' => $this->client->city,
            'state' => $this->client->state,
            'postal_code' => $this->client->postal_code,
            'phone_number' => $this->client->phone_number,
            'email_address' => $this->client->email_address,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name'),
            Forms\Components\Select::make('status')
                ->options([
                    'active' => 'Active',
                    'closed' => 'Closed',
                ]),
            Forms\Components\TextInput::make('address'),
            Forms\Components\Grid::make(3)
                ->schema([
                    Forms\Components\TextInput::make('city'),
                    Forms\Components\TextInput::make('state'),
                    Forms\Components\TextInput::make('postal_code'),
                ]),
            Forms\Components\TextInput::make('phone_number'),
            Forms\Components\TextInput::make('email_address'),
        ];
    }

    public function updateClient()
    {
        $this->client->name = $this->name;
        $this->client->status = $this->status;
        $this->client->address = $this->address;
        $this->client->city = $this->city;
        $this->client->state = $this->state;
        $this->client->postal_code = $this->postal_code;
        $this->client->phone_number = $this->phone_number;
        $this->client->email_address = $this->email_address;
        $this->client->save();

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
        return view('livewire.client-edit');
    }
}
