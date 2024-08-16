<?php

namespace App\Livewire\Kanban;

use Livewire\Component;
use App\Models\Group as GroupModel;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;

class Group extends Component
{
    public GroupModel $group;
    public ?Project $project;

    public function mount(GroupModel $group, ?Project $project)
    {
        $this->authorize('view', $group);
        $this->group = $group;
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.kanban.group');
    }

    #[Computed]
    public function tasks()
    {
        $tasksQuery = $this->group->tasks()->inOrder();
        if($this->project) {
            $tasksQuery = $tasksQuery->forProject($this->project->getKey());
        }
        return $tasksQuery->get();
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
