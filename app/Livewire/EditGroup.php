<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditGroup extends Component
{
    #[Validate('required')]
    public string $name;

    public Group $group;

    public function mount()
    {
        $this->name = $this->group->name;
    }

    public function render()
    {
        return view('livewire.edit-group');
    }

    public function update()
    {
        $this->validate();

        $this->group->update([
            'name' => $this->name
        ]);

        $this->dispatch('group-updated');
    }

    public function resetForm(bool $isEditing)
    {
        if ($isEditing == false) {
            $this->name = $this->group->name;
        }
    }
}
