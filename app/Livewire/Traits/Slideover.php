<?php

namespace App\Livewire\Traits;

trait Slideover
{
    public $openSlideover = false;
    public $addNewItem = false;

    public function openSlide($addNewItem = false)
    {
        //cambiar valor del menu: true, false
        $this->addNewItem = $addNewItem;

        //abrir menu lateral
        $this->openSlideover = true;
    }
}