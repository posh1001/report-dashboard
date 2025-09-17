<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class NewLeadersCard extends Component
{
    public $totalNewLeaders = 0;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $leaders = PostProgram::pluck('new_cell_leaders');

        $count = 0;
        foreach ($leaders as $entry) {
            if (!empty($entry)) {
                $names = array_filter(array_map('trim', explode(',', $entry)));
                $count += count($names);
            }
        }

        $this->totalNewLeaders = $count;
    }

    public function render()
    {
        // Refresh leaders count every time Livewire re-renders
        $this->loadData();

        return view('livewire.cards.new-leaders-card');
    }
}
