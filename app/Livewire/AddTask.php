<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddTask extends Component
{
    #[Validate('required')]
    public $description;

    public Group $group;

    public function render()
    {
        return view('livewire.add-task');
    }

    public function store()
    {
        $this->validate();

        $this->group->tasks()->create([
            'description' => $this->pull('description'),
        ]);

        $this->dispatch('task-created');
    }
}
