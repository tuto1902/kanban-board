<?php

namespace App\Livewire\Kanban;

use App\Models\Task;
use Livewire\Component;

class Card extends Component
{
    public Task $task;
    public $showDialog = false;

    public function render()
    {
        return view('livewire.kanban.card');
    }

    public function closeModal()
    { 
        $this->showDialog = false;
    }
}
