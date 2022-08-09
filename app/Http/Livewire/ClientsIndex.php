<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Str;

class ClientsIndex extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

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

    public function mount(): void
    {
        $this->form->fill([
            'name' => $this->name,
            'slug' => $this->slug,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'phone_number' => $this->phone_number,
            'email_address' => $this->email_address,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->unique()
                ->required()
                ->label('Company Name')
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
            Forms\Components\Hidden::make('slug'),
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

    public function createClient()
    {

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
            ->iconColor('success')
            ->send();
    }

    protected function getFormModel(): Model|string|null
    {
        return Client::class;
    }

    public function create()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.clients-index', [
            'clients' => Client::where('status', 'active')->orderBy('name', 'asc')->paginate(10),
        ]);
    }
}
