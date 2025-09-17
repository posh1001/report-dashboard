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
        $leaders = PostProgram::pluck('cell_pioneered');

        $count = 0;
        foreach ($leaders as $entry) {
            if (!empty($entry)) {
                $names = array_filter(array_map('trim', explode(',', $entry)));
                $count += count($names);
            }
        }

        $this->cellPioneered = $count;
    }

    public function render()
    {
        return view('livewire.cards.cells-pioneered-card');
    }
}
