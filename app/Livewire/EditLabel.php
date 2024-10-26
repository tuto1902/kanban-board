<?php

namespace App\Livewire;

use App\Livewire\Forms\LabelForm;
use App\Models\Label;
use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class EditLabel extends Component
{
    public bool $showDialog = false;

    public LabelForm $form;
    public ?Task $task = null;

    #[On('edit-label')]
    public function showEditLabelDialog(Label $label)
    {
        $this->form->setLabel($label);
        $this->showDialog = true;
    }

    public function render()
    {
        return view('livewire.edit-label');
    }

    #[On('edit-task')]
    public function setTask(Task $task)
    {
        $this->task = $task;
    }

    public function update()
    {
        $this->form->update();
        $this->showDialog = false;
        $this->dispatch('label-updated', task: $this->task);
    }

    public function cancel()
    {
        $this->showDialog = false;
        if ($this->task) {
            $this->dispatch('label-canceled', task: $this->task);
        }
    }

    public function destroy()
    {
        $this->form->delete();
        $this->showDialog = false;
        $this->dispatch('label-deleted');
    }

    public function resetDialogForm($isOpen)
    {
        if ($isOpen == false) {
            $this->form->reset();
            $this->form->resetErrorBag();
        }
    }
}
