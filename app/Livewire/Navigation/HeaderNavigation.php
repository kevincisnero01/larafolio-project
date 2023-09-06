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
        // notify
    }

    public function render()
    {
        return view('livewire.navigation.header-navigation');
    }
}
