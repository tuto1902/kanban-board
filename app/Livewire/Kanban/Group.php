<?php

namespace App\Livewire\Kanban;

use Livewire\Component;
use App\Models\Group as GroupModel;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;

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

    #[Computed]
    public function tasks()
    {
       return $this->group->tasks()->inOrder()->get();
    }

    public function sort($taskId, $targetSortPosition, $targetGroupId)
    {
        $task = Task::find($taskId);
        if($task->group->getKey() !== $targetGroupId) {
            $task->moveToPosition(999999);
            $targetGroup = GroupModel::findOrFail($targetGroupId);
            $task->group()->associate($targetGroup);

        }
        $task->moveToPosition($targetSortPosition);
    }

}
