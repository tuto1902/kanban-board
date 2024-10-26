<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Group;
use Livewire\Component;

class AddTask extends Component
{
    public TaskForm $form;
    public Group $group;

    public function render()
    {
        return view('livewire.add-task');
    }

    public function store()
    {
        $this->form->store($this->group);

        $this->dispatch('task-created');
    }
}
