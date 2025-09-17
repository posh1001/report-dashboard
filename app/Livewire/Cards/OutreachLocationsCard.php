<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class OutreachLocationsCard extends Component
{
    public $totalOutreachLocations = 0;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $entries = PostProgram::pluck('outreach_locations');

        $count = 0;

        foreach ($entries as $entry) {
            if (!empty($entry)) {
                // Convert to string, split by comma, trim spaces, remove empties
                $locations = array_filter(array_map('trim', explode(',', (string)$entry)));

                $count += count($locations);
            }
        }

        $this->totalOutreachLocations = $count;
    }

    public function render()
    {
        // Refresh every render to keep live updates
        $this->loadData();

        return view('livewire.cards.outreach-locations-card');
    }
}
