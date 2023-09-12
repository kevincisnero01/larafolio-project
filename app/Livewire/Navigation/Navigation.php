<?php

namespace App\Livewire\Navigation;

use App\Models\NavigationItem;
use Livewire\Component;
use App\Livewire\Traits\Notification;
use App\Livewire\Traits\Slideover;
class Navigation extends Component
{
    use Notification, Slideover;

    public $items;

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

    public function deleteItem(NavigationItem $object)
    {   
        // se usa obligatoriamente object como nombre para el modal
        $item = $object; 
        
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
