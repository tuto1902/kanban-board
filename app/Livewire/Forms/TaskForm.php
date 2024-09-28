<?php

namespace App\Livewire\Forms;

use App\Models\Group;
use App\Models\Project;
use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task;

    #[Validate('required', onUpdate: false)]
    public $description;
    public $projectId;

    public function setTask(Task $task)
    {
        $this->task = $task;
        $this->description = $task->description;
        $this->projectId = $task->project?->getKey();
    }

    public function store(Group $group)
    {
        $this->validate();

        $group->tasks()->create([
            'description' => $this->pull('description'),
        ]);
    }

    public function update()
    {
        $this->validate();

        $this->task->description = $this->description;

        if ($this->projectId) {
            $this->task->project()->associate(Project::find($this->projectId));
        } else {
            $this->task->project()->disassociate();
        }

        $this->task->save();
    }

    public function destroy()
    {
        $this->task->delete();
    }
}
