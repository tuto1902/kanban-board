<?php

namespace App\Livewire\Kanban;

use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use App\Models\Task;
use App\View\Components\KanbanLayout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Board extends Component
{
    public GroupForm $form;

    #[Computed]
    public function groups()
    {
       return Auth::user()->groups()->inOrder()->get();
    }

    #[Layout(KanbanLayout::class)]
    public function render()
    {
        return view('livewire.kanban.board');
    }

    public function store()
    {
        $this->form->store();
    }

    public function sort($groupId, $targetSortPosition)
    {
        $group = Group::find($groupId);
        $group->moveToPosition($targetSortPosition);
    }
}
