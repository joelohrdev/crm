<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CompanyForm extends Form
{
    #[Validate('required|string|max:255|unique:companies,name')]
    public $name = '';

    #[Validate('nullable|url')]
    public $website = '';

    #[Validate('nullable|string|max:255')]
    public $phone = '';

    #[Validate('nullable|string|max:255')]
    public $address = '';

    #[Validate('nullable|string|max:255')]
    public $city = '';

    #[Validate('nullable')]
    public $state;

    #[Validate('nullable|string|max:255')]
    public $zip = '';
}
