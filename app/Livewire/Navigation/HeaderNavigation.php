<?php

namespace App\Livewire\Navigation;

use App\Models\NavigationItem;
use Livewire\Component;

class HeaderNavigation extends Component
{
    public $items;

    public function mount()
    {
        $this->items = NavigationItem::all();
    }

    public function render()
    {
        return view('livewire.navigation.header-navigation');
    }
}
