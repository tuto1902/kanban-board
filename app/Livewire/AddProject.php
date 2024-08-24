<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjectForm;
use Livewire\Component;

class AddProject extends Component
{
    public ProjectForm $form;

    public function render()
    {
        return view('livewire.add-project');
    }

    public function store()
    {
        $this->form->store();
    }
}
