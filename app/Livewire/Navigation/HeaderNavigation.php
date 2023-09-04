<?php

namespace App\Livewire\Navigation;

use App\Models\NavigationItem;
use Livewire\Component;

class HeaderNavigation extends Component
{
    public $items;
    public $openSlideover = false;
    public $addNewItem = false;

    public function mount()
    {
        $this->items = NavigationItem::all();
    }

    public function openSlide($addNewItem = false)
    {
        $this->addNewItem = $addNewItem;
        $this->openSlideover = true;
    }

    public function render()
    {
        return view('livewire.navigation.header-navigation');
    }
}
