<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjectForm extends Form
{
    #[Validate('required', onUpdate: false)]
    public $name;

    public ?Project $project;

    public function store()
    {
        $this->validate();

        Auth::user()->projects()->create([
            'name' => $this->name
        ]);
    }

    public function setProject(Project $project)
    {
        $this->project = $project;
        $this->name = $project->name;
    }

    public function update()
    {
        $this->validate();

        $this->project->update([
            'name' => $this->name
        ]);
    }

    public function delete()
    {
        $this->project->delete();
    }
}
