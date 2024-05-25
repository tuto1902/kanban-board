<?php

namespace App\Livewire;

use App\Models\Group;
use App\View\Components\KanbanLayout;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Board extends Component
{
    public $groups;

    public function mount()
    {
        $this->groups = Group::all();
    }

    #[Layout(KanbanLayout::class)]
    public function render()
    {
        return view('livewire.board');
    }
}
