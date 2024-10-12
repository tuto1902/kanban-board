<?php

namespace App\Livewire\Forms;

use App\Models\Label;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LabelForm extends Form
{
    #[Validate('required', onUpdate: false)]
    public $name;

    #[Validate('required', onUpdate: false)]
    public $color;

    public function store()
    {
        $this->validate();

        Label::create([
            'name' => $this->name,
            'color' => $this->color
        ]);
    }
}
