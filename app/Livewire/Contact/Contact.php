<?php

namespace App\Livewire\Contact;

use App\Livewire\Traits\Notification;
use App\Livewire\Traits\Slideover;
use Livewire\Component;
use App\Models\PersonalInformation;

class Contact extends Component
{
    use Slideover,Notification;

    public PersonalInformation $contact;

    protected $rules = ['contact.email' => 'required|email:filter'];

    public function mount()
    {
        $this->contact = PersonalInformation::first() ?? new PersonalInformation();
    }

    public function edit()
    {
        $this->validate();
        
        $this->contact->save();

        $this->reset('openSlideover');

        $this->notify('Contact email updated successfully!');
    }
    
    public function render()
    {
        return view('livewire..contact.contact');
    }
}
