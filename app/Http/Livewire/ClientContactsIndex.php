<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ClientContactsIndex extends Component
{
    public function render()
    {
        return view('livewire.client-contacts-index', [
            'contacts' => Contact::all()
        ]);
    }
}
