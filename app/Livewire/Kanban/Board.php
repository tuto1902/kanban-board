<?php

namespace App\Livewire\Kanban;

use App\Models\Group;
use App\Models\Task;
use App\View\Components\KanbanLayout;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Board extends Component
{
    #[Rule('required')]
    public string $name;

    #[Computed]
    public function groups()
    {
       return Group::inOrder()->get();
    }

    #[Layout(KanbanLayout::class)]
    public function render()
    {
        return view('livewire.kanban.board');
    }

    public function store()
    {
        $this->validate();

        Group::create([
            'name' => $this->name
        ]);

        $this->reset('name');
    }

    public function sort($groupId, $targetSortPosition)
    {
        $group = Group::find($groupId);
        $group->moveToPosition($targetSortPosition);
    }
}
