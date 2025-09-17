<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class NewLeadersCard extends Component
{
    protected $listeners = ['report-submitted' => '$refresh'];

    public function render()
    {
        $totalNewLeaders = PostProgram::whereNotNull('new_cell_leaders')
                                      ->where('new_cell_leaders', '!=', '')
                                      ->count();

        return view('livewire.cards.new-leaders-card', compact('totalNewLeaders'));
    }
}
