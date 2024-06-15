<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditTask extends Component
{
    public Task $task;

    public TaskForm $form;

    public function mount()
    {
        $this->form->setTask($this->task);
    }

    public function render()
    {
        return view('livewire.edit-task');
    }

    public function update()
    {
        $this->form->update();

        $this->dispatch('task-updated');
    }

    public function resetDialogForm($isOpen)
    {
        if ($isOpen) {
            $this->form->setTask($this->task);
        }
    }
}
