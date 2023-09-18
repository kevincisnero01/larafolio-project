<?php

namespace App\Livewire\Navigation;

use Livewire\Component;
use App\Models\NavigationItem;
use App\Livewire\Traits\Notification;

class Item extends Component
{
    use Notification;

    public NavigationItem $item;

    protected $rules = [
        'item.label' => 'required|max:20',
        'item.link' => 'required|max:40'
    ];

    public function mount()
    {
        $this->item = new NavigationItem();
    }

    public function save()
    {
        $this->validate();

        $this->item->save();

        $this->dispatch('itemAdded')->to(Navigation::class);

        $this->dispatch('itemsHaveBeenUpdated')->to(FooterLink::class);

        $this->mount();

        $this->notify('Item created successfully!');
        
    }

    public function render()
    {
        return view('livewire.navigation.item');
    }
}
