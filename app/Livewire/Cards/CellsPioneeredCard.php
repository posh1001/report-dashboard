<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class CellsPioneeredCard extends Component
{
    public $cellPioneered = 0;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->cellPioneered = PostProgram::sum('cell_pioneered');
    }

    public function render()
    {
        $this->loadData();

        return view('livewire.cards.cells-pioneered-card');
    }
}
