<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public $projects;

    public function mount()
    {
        $this->projects = Auth::user()->projects;
    }
    public function render()
    {
        return view('livewire.sidebar');
    }
}
