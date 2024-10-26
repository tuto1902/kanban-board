<?php

namespace App\Livewire;

use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditGroup extends Component
{
    public GroupForm $form;

    public Group $group;

    public function mount()
    {
        $this->form->setGroup($this->group);
    }

    public function render()
    {
        return view('livewire.edit-group');
    }

    public function update()
    {
        $this->form->update();

        $this->dispatch('group-updated');
    }

    public function resetForm(bool $isEditing)
    {
        if ($isEditing == false) {
            $this->form->name = $this->group->name;
        }
    }
}
