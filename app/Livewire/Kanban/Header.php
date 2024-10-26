<?php

namespace App\Livewire\Kanban;

use App\Livewire\Actions\Logout;
use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Header extends Component
{
    public string $title;

    #[Url]
    public string $search = '';

    #[Url]
    public ?int $projectId = null;

    public function mount()
    {
        if ($this->projectId) {
            $this->title = Project::find($this->projectId)->name;
        } else {
            $this->title = 'All Tasks';
        }
    }

    public function updated($property)
    {
        if ($property == 'search') {
            $this->dispatch('tasks-filter', $this->search);
        }
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.kanban.header');
    }

    #[On(['project-filter', 'project-deleted'])]
    public function onProjectFilter($projectId = null)
    {
        $this->projectId = $projectId;
        if ($projectId) {
            $this->title = Project::find($projectId)->name;
        } else {
            $this->title = 'All Tasks';
        }
    }
}
