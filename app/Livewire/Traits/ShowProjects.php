<?php

namespace App\Livewire\Traits;

use App\Models\Project;

trait ShowProjects
{
    public int $counter = 3;

    public function getTotalProperty()
    {
        return Project::count();
    }

    public function showMore()
    {
        if ($this->counter < $this->total) {
            $this->counter += 3;
        }
    }

    public function showLess()
    {
        $this->reset('counter');
    }
}