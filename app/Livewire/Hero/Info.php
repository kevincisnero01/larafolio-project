<?php

namespace App\Livewire\Hero;

use App\Models\PersonalInformation;
use Livewire\Component;
use App\Livewire\Traits\Slideover;
class Info extends Component
{
    use Slideover;

    public PersonalInformation $info;
    public $cvFile = null;
    public $imageFile = null;

    public function mount()
    {
        $this->info = PersonalInformation::first() ?? new PersonalInformation();
    }

    public function render()
    {
        return view('livewire.hero.info');
    }
}
