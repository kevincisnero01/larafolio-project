<?php

namespace App\Livewire\Navigation;

use App\Models\NavigationItem;
use Livewire\Component;

class FooterLink extends Component
{
    protected $listeners = ['itemsHaveBeenUpdated' => 'render'];

    public function render()
    {
        $items = NavigationItem::get();
        return view('livewire.navigation.footer-link', ['items' => $items]);
    }
}
