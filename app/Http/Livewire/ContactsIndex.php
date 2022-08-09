<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Contact;
use Filament\Forms;
use Filament\Notifications\Notification;
use Livewire\Component;
use Str;

class ContactsIndex extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $name;

    public $slug;

    public $client;

    public $position;

    public $phone_number;

    public $extension;

    public $email_address;

    public $showModal = false;

    public function mount(): void
    {
        $this->form->fill([
            'name' => $this->name,
            'slug' => $this->slug,
            'client' => $this->client,
            'position' => $this->position,
            'phone_number' => $this->phone_number,
            'extension' => $this->extension,
            'email_address' => $this->email_address,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
            Forms\Components\Hidden::make('slug'),
            Forms\Components\Select::make('client_id')
                ->relationship('client', 'name')
                ->label('Client')
                ->columnSpan('full'),
            Forms\Components\TextInput::make('position'),
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('phone_number')
                        ->helperText('Ex: 1231231233'),
                    Forms\Components\TextInput::make('extension'),
                ]),
            Forms\Components\TextInput::make('email_address'),
        ];
    }

    protected function getFormModel(): string
    {
        return Contact::class;
    }

    public function showCreateModal()
    {
        return $this->showModal = true;
    }

    public function submit(): void
    {
        Contact::create($this->form->getState());

        $this->reset();

        $this->showModal = false;

        Notification::make()
            ->title('Contact Successfully Saved!')
            ->success()
            ->seconds(5)
            ->iconColor('success')
            ->send();
    }

    public function render()
    {
        return view('livewire.contacts-index', [
            'contacts' => Contact::paginate(20),
        ]);
    }
}
