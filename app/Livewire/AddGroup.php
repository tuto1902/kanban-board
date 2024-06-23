<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddGroup extends Component
{
    #[Validate('required')]
    public string $name;

    public function render()
    {
        return view('livewire.add-group');
    }

    public function store()
    {
        $this->validate();

        Group::create([
            'name' => $this->name
        ]);

        $this->reset();

        $this->dispatch('group-created');
    }
}
