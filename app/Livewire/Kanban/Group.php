<?php

namespace App\Livewire\Kanban;

use Livewire\Component;
use App\Models\Group as GroupModel;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Group extends Component
{
    public GroupModel $group;
    public Project $project;

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
        $this->project = $this->projectId ? Project::find($this->projectId) : new Project();
        $tasksQuery = $this->group->tasks()->inOrder();
        if($this->project->getKey()) {
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

    #[On('project-filter')]
    public function onProjectFilter($projectId = null)
    {
       $this->projectId = $projectId;
    }
}
