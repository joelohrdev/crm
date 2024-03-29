<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactShow extends Component
{
    public $contact;

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function render()
    {
        return view('livewire.contact-show');
    }
}
