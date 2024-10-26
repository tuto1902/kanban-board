<?php

namespace App\Livewire\Forms;

use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GroupForm extends Form
{
    #[Validate('required', onUpdate: false)]
    public string|null $name;

    public ?Group $group;

    public function setGroup(Group $group)
    {
       $this->group = $group;
       $this->name = $group->name;
    }

    public function store()
    {
        $this->validate();

        Auth::user()->groups()->create([
            'name' => $this->name
        ]);

        $this->reset('name');
    }

    public function update()
    {
        $this->validate();

        $this->group->update([
            'name' => $this->name
        ]);
    }
}
