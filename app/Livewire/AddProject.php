<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjectForm;
use Livewire\Attributes\On;
use Livewire\Component;

class AddProject extends Component
{
    public ProjectForm $form;
    public bool $showDialog = false;

    public function render()
    {
        return view('livewire.add-project');
    }

    public function store()
    {
        $this->form->store();
        $this->showDialog = false;
        $this->dispatch('project-created');
    }

    #[On('add-project')]
    public function showAddProjectDialog()
    {
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
