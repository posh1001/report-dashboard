<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class CentersPioneeredCard extends Component
{
    public $centersPioneered = 0;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Get all entries from the "centers_pioneered" column
        $entries = PostProgram::pluck('centers_pioneered');

        $count = 0;
        foreach ($entries as $entry) {
            if (!empty($entry)) {
                // Split by comma, trim, and count each item
                $items = array_filter(array_map('trim', explode(',', $entry)));
                $count += count($items);
            }
        }

        $this->centersPioneered = $count;
    }

    public function render()
    {
        // Refresh value on every render
        $this->loadData();

        return view('livewire.cards.centers-pioneered-card');
    }
}
