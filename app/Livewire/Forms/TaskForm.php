<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task;

    #[Validate('required', onUpdate: false)]
    public $description;

    public function setTask(Task $task)
    {
        $this->task = $task;
        $this->description = $task->description;
    }

    public function update()
    {
        $this->validate();

        $this->task->update([
            'description' => $this->description
        ]);
    }
}
