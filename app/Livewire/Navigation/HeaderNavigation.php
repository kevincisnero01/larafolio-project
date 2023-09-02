<?php

namespace App\Livewire\Navigation;

use Livewire\Component;

class HeaderNavigation extends Component
{
    public $items;

    public function mount()
    {
        //$this->items = Item::get
    }

    public function render()
    {
        return view('livewire.navigation.header-navigation');
    }
}
