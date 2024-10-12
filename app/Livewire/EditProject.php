<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

class EditProject extends Component
{
    public ProjectForm $form;
    public bool $showDialog = false;

    public function render()
    {
        return view('livewire.edit-project');
    }

    public function update()
    {
        $this->form->update();
        $this->showDialog = false;
        $this->dispatch('project-updated');
    }

    public function destroy()
    {
        $this->form->delete();
        $this->showDialog = false;
        $this->dispatch('project-deleted');
    }

    #[On('edit-project')]
    public function setProject(Project $project)
    {
        $this->form->setProject($project);
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
