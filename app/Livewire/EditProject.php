<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
use Livewire\Component;

class EditProject extends Component
{
    public ProjectForm $form;
    public Project $project;

    public function mount()
    {
        $this->form->setProject($this->project);
    }

    public function render()
    {
        return view('livewire.edit-project');
    }

    public function update()
    {
        $this->form->update();
    }

    public function delete()
    {
        $this->form->delete();
    }
}
