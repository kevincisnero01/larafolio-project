<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\PersonalInformation;

class Contact extends Component
{
    public PersonalInformation $contact;

    public function mount()
    {
        $this->contact = PersonalInformation::select('email')->first() ?? new PersonalInformation();
    }
    
    public function render()
    {
        return view('livewire..contact.contact');
    }
}
