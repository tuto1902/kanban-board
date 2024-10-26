<?php

namespace App\Livewire\Forms;

use App\Models\Label;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LabelForm extends Form
{
    public ?Label $label;

    #[Validate('required', onUpdate: false)]
    public $name;

    #[Validate('required', onUpdate: false)]
    public $color;

    public function setLabel(Label $label)
    {
        $this->label = $label;
        $this->name = $label->name;
        $this->color = $label->color;
    }

    public function store()
    {
        $this->validate();

        Label::create([
            'name' => $this->name,
            'color' => $this->color
        ]);
    }

    public function update()
    {
        $this->validate();

        $this->label->update([
            'name' => $this->name,
            'color' => $this->color
        ]);
    }

    public function delete()
    {
        $this->label->delete();
    }
}
