<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class ChurchesPioneeredCard extends Component
{
    public $churchesPioneered = 0;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Get all entries from the "churches_pioneered" column
        $entries = PostProgram::pluck('churches_pioneered');

        $count = 0;
        foreach ($entries as $entry) {
            if (!empty($entry)) {
                // Split by comma, trim spaces, and count each item
                $items = array_filter(array_map('trim', explode(',', $entry)));
                $count += count($items);
            }
        }

        $this->churchesPioneered = $count;
    }

    public function render()
    {
        // Refresh value on every render
        $this->loadData();

        return view('livewire.cards.churches-pioneered-card');
    }
}
