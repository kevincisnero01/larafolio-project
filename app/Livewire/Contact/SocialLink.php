<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Livewire\Traits\Slideover;
use App\Livewire\Traits\Notification;
use App\Models\SocialLink as SocialLinkModel;

class SocialLink extends Component
{
    use Slideover, Notification;

    public SocialLinkModel $socialLink;
    public $socialLinkSelected = '';

    protected $rules = [
        'socialLink.name' => 'required|max:20',
        'socialLink.url' => 'required|url',
        'socialLink.icon' => [
            'nullable', 
            'regex:/^(fa-brands|fa-solid)\sfa-[a-z-]+/i'//ingresar: 'fa-brands' oh 'fa-solid' + espacio + guion + letras y guion
        ],
    ];

    //hook para detectar el select de social links
    public function updatedSocialLinkSelected()
    {
        $data = SocialLinkModel::find($this->socialLinkSelected);

        if ($data) {
            $this->socialLink = $data;
        } else {
            $this->socialLinkSelected = '';
        }
    }

    public function mount()
    {
        $this->socialLink = new SocialLinkModel();
    }

    

    public function create()
    {
        //si se va a crear despues de editar verificamos para limpiar
        if($this->socialLink->getKey()) {
            $this->socialLink = new SocialLinkModel();

            $this->reset('socialLinkSelected');
        }

        $this->openSlide(true);
    }

    public function save()
    {
        $this->validate();

        $this->socialLink->save();

        $this->reset(['socialLinkSelected','openSlideover']);

        $this->notify('Social link saved successfully!');
    }
    
    public function render()
    {
        $socialLinks = SocialLinkModel::get();

        return view('livewire..contact.social-link', [ 'socialLinks' => $socialLinks ]);
    }
}
