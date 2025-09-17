<?php

namespace App\Livewire\Cards;

use Livewire\Component;
use App\Models\PostProgram;

class FoundationSchoolCard extends Component
{
    // Listen for "report-submitted" event
    protected $listeners = ['report-submitted' => '$refresh'];

    public function render()
    {
        $totalFoundationSchool = PostProgram::sum('foundation_school');

        return view('livewire.cards.foundation-school-card', compact('totalFoundationSchool'));
    }
}
