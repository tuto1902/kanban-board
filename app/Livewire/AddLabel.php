<?php

namespace App\Livewire;

use App\Livewire\Forms\LabelForm;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class AddLabel extends Component
{
    public bool $showDialog = false;

    public LabelForm $form;
    public ?Task $task = null;

    public function render()
    {
        return view('livewire.add-label');
    }

    public function store()
    {
        $this->form->store();
        $this->showDialog = false;
        $this->dispatch('label-created', task: $this->task);
    }

    #[On('edit-task')]
    public function setTask(Task $task)
    {
        $this->task = $task;
    }

    #[On('add-label')]
    public function showAddProjectDialog()
    {
        $this->showDialog = true;
    }

    public function resetDialogForm($isOpen)
    {
        if ($isOpen == false) {
            // $this->form->reset();
            // $this->form->resetErrorBag();
            if ($this->task) {
                $this->dispatch('label-canceled', task: $this->task);
            }
        }
    }
}
