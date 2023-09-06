<?php

namespace App\Livewire\Traits;

trait Notification
{
    public function notify($message = '', $event = 'notify')
    {
        $this->dispatch($event, message: __("$message")); 
    }
}