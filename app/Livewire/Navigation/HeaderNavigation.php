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

    //reglas de validacion
    protected $rules = [
        'items.*.label' => 'required|max:20',
        'items.*.link' => 'required|max:50',

    ];

    public function openSlide($addNewItem = false)
    {
        //cambiar valor del menu: true, false
        $this->addNewItem = $addNewItem;

        //abrir menu lateral
        $this->openSlideover = true;
    }

    public function edit()
    {
        //1-actualizacion masiva
        $this->validate();

        //2-actualizacion masiva
        foreach ($this->items as $item) {
            $item->save();
        }

        //3-cerrar el menu lateral
        $this->reset('openSlideover');

        //4-disparar el evento de la notificacion
        $this->dispatch('notify', message: __('Menu items updated successfully!')); 
    }

    public function deleteItem(NavigationItem $item)
    {
        //1-eliminar elemento de la navegacion 
        $item->delete();
        
        //2-refrescar componente de navegacion
        $this->mount();

        //3-disparar el evento de la notificacion
        $this->dispatch('deleteMessage', message: __('Menu item has been deleted.'));
    }

    public function render()
    {
        return view('livewire.navigation.header-navigation');
    }
}
