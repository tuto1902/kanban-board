<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class Sidebar extends Component
{
    #[Url]
    public ?int $projectId = null;

    #[Computed]
    public function projects() {
        return Auth::user()->projects;
    }

    #[Computed]
    public function taskCount()
    {
        return Task::count();
    }

    public function render()
    {
        return view('livewire.sidebar');
    }

    public function setProjectId($projectId = null)
    {
        $this->projectId = $projectId;
        $this->dispatch('project-filter', $projectId);
    }
}
