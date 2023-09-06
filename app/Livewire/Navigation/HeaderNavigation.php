<?php

namespace App\Livewire\Navigation;

use App\Models\NavigationItem;
use Livewire\Component;

class HeaderNavigation extends Component
{
    public $items;
    public $openSlideover = false;
    public $addNewItem = false;

    protected $listeners = ['deleteItem'];

    public function mount()
    {
        $this->items = NavigationItem::all();
    }

    protected $rules = [
        'items.*.label' => 'required|max:20',
        'items.*.link' => 'required|max:50',

    ];

    public function openSlide($addNewItem = false)
    {
        $this->addNewItem = $addNewItem;
        $this->openSlideover = true;
    }

    public function edit()
    {
        $this->validate();

        foreach ($this->items as $item) {
            $item->save();
        }

        $this->reset('openSlideover');

        $this->dispatch('notify', message: __('Menu items updated successfully!')); 
    }

    public function deleteItem(NavigationItem $item)
    {
        $item->delete();

        $this->mount();

        $this->dispatch('deleteMessage', message: __('Menu item has been deleted.'));
    }

    public function render()
    {
        return view('livewire.navigation.header-navigation');
    }
}
