<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Task;
use App\View\Components\KanbanLayout;
use Illuminate\Support\Facades\DB;
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

    public function sort($taskId, $targetSortPosition)
    {
        $task = Task::find($taskId);
        $currentSortPosition = $task->sort;
        
        if ($currentSortPosition == $targetSortPosition) {
            return;
        }

        DB::transaction(function () use ($task, $currentSortPosition, $targetSortPosition){
            $group = $task->group;
    
            $task->update(['sort' => -1]);
    
            $tasks = $group->tasks()->whereBetween('sort', [
                min($currentSortPosition, $targetSortPosition),
                max($currentSortPosition, $targetSortPosition),
            ]);
    
            if($currentSortPosition < $targetSortPosition) {
                // Dragging down, shift up
                $tasks->decrement('sort');
            } else {
                // Dragging up, shift down
                $tasks->increment('sort');
            }
    
            $task->update(['sort' => $targetSortPosition]);
        });
    }
}