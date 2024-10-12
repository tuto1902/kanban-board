<?php

namespace App\Livewire\Kanban;

use Livewire\Component;
use App\Models\Group as GroupModel;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Js;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Group extends Component
{
    public GroupModel $group;

    #[Url]
    public ?string $search = '';

    #[Url]
    public ?int $projectId = null;

    public function mount(GroupModel $group)
    {
        $this->authorize('view', $group);
        $this->group = $group;
    }

    public function render()
    {
        return view('livewire.kanban.group');
    }

    #[Computed]
    public function tasks()
    {
        return $this->group->tasks()
            ->when($this->projectId, fn (Builder $query, $projectId) => $query->forProject($projectId))
            ->when($this->search, fn (Builder $query, $search) => $query->filter($search))
            ->inOrder()
            ->get();
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

    #[On([ 'project-filter', 'project-deleted' ])]
    public function onProjectFilter($projectId = null)
    {
       $this->projectId = $projectId;
    }

    #[On('tasks-filter')]
    public function onTasksFilter($search = null)
    {
        $this->search = $search;
    }
}
