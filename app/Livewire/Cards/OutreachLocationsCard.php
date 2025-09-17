<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class OutreachLocationsCard extends Component
{
    protected $listeners = ['report-submitted' => '$refresh'];

    public function render()
    {
        $totalOutreachLocations = PostProgram::whereNotNull('outreach_locations')
                                             ->where('outreach_locations', '!=', '')
                                             ->count();

        return view('livewire.cards.outreach-locations-card', compact('totalOutreachLocations'));
    }
}
