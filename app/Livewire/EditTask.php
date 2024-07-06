<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditTask extends Component
{
    public $showDialog = false;

    public TaskForm $form;

    public function render()
    {
        return view('livewire.edit-task');
    }

    public function update()
    {
        $this->form->update();

        $this->showDialog = false;

        $this->dispatch('task-updated');
    }

    #[On('edit-task')]
    public function setTask(Task $task)
    {
        $this->form->setTask($task);
        $this->showDialog = true;
    }

    public function resetDialogForm($isOpen)
    {
        if ($isOpen == false) {
            $this->form->reset();
            $this->form->resetErrorBag();
        }
    }
}
