<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Task;
use App\View\Components\KanbanLayout;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Board extends Component
{
    public $groups;

    #[Rule('required')]
    public $description;

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
