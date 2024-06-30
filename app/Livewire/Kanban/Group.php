<?php

namespace App\Livewire\Kanban;

use Livewire\Component;
use App\Models\Group as GroupModel;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class Group extends Component
{
    public GroupModel $group;

    public function mount(GroupModel $group)
    {
        $this->group = $group;
    }

    public function render()
    {
        return view('livewire.kanban.group');
    }
    
    public function sort($taskId, $targetSortPosition, $targetGroupId)
    {
        $task = Task::find($taskId);
        if($task->group->getKey() !== $targetGroupId) {
            $this->moveToPosition($task, 999999);

            $task->group()->dissociate();
            $targetGroup = GroupModel::findOrFail($targetGroupId);
            $task->group()->associate($targetGroup);

            $this->moveToPosition($task, $targetSortPosition);
        }
    }

    public function moveToPosition($task, $targetSortPosition)
    {
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
