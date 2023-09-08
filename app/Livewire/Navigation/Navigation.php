<?php

namespace App\Livewire\Navigation;

use App\Models\NavigationItem;
use Livewire\Component;
use App\Livewire\Traits\Notification;

class Navigation extends Component
{
    use Notification;

    public $items;
    public $openSlideover = false;
    public $addNewItem = false;

    protected $listeners = ['deleteItem','itemAdded' => 'updateDataAfterAddItem'];

    public function mount()
    {
        $this->items = NavigationItem::all();
    }

    //reglas de validacion
    protected $rules = [
        'items.*.label' => 'required|max:20',
        'items.*.link' => 'required|max:40',

    ];

    public function openSlide($addNewItem = false)
    {
        //cambiar valor del menu: true, false
        $this->addNewItem = $addNewItem;

        //abrir menu lateral
        $this->openSlideover = true;
    }

    public function updateDataAfterAddItem()
    {
        $this->mount();
        
        $this->openSlideover = false;
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
        $this->notify('Menu items updated successfully!');
    }

    public function deleteItem(NavigationItem $item)
    {
        //1-eliminar elemento de la navegacion 
        $item->delete();
        
        //2-refrescar componente de <navegacion></navegacion>
        $this->mount();

        //3-disparar el evento de la notificacion
        $this->notify('Menu item has been deleted.', 'deleteMessage');

    }

    public function render()
    {
        return view('livewire.navigation.navigation');
    }
}
