<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjectForm extends Form
{
    public $name;
    public ?Project $project;

    public function store()
    {
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
        $this->project->update([
            'name' => $this->name
        ]);
    }

    public function delete()
    {
        $this->project->delete();
    }
}
