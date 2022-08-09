<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Filament\Notifications\Notification;
use Livewire\Component;

class ContactDelete extends Component
{
    public $contact;

    public $showDeleteModal = false;

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function showDeleteModal()
    {
        $this->showDeleteModal = true;
    }

    public function deleteContact()
    {
        Contact::destroy($this->contact->id);

        Notification::make()
            ->title('Contact Successfully Deleted!')
            ->success()
            ->seconds(5)
            ->iconColor('success')
            ->send();

        return redirect()->route('contact.index');
    }

    public function render()
    {
        return view('livewire.contact-delete');
    }
}
