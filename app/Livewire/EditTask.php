<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskForm;
use App\Models\Label;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditTask extends Component
{
    public $showDialog = false;

    public TaskForm $form;

    public $projects;

    public function mount()
    {
        $this->projects = Auth::user()->projects;
    }

    #[Computed]
    public function labels()
    {
        return Label::all();
    }

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

    public function destroy()
    {
        $this->form->destroy();
        $this->showDialog = false;
        $this->dispatch('task-deleted');
    }

    #[On([ 'edit-task', 'label-created', 'label-updated', 'label-deleted', 'label-canceled' ])]
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

    #[On('project-created')]
    public function refreshProject()
    {
        $this->projects = Auth::user()->projects;
    }
}
