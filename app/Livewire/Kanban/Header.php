<?php

namespace App\Livewire\Kanban;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class Header extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.kanban.header');
    }
}
