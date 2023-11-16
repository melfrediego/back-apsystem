<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DashboardComponent extends Component
{
    public $dados = "Dados 0001";
    
    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
