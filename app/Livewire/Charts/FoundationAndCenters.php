<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\PostProgram;

class FoundationAndCenters extends Component
{
    public $groups = [];
    public $foundation = [];
    public $serviceCenters = [];

    // Poll interval in seconds
    public $pollInterval = 5;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Always fetch the latest data
        $programs = PostProgram::select('group_name', 'foundation_school', 'service_centers')->get();

        $this->groups = $programs->pluck('group_name')->toArray();
        $this->foundation = $programs->pluck('foundation_school')->map(fn($v) => (int)$v)->toArray();
        $this->serviceCenters = $programs->pluck('service_centers')->map(fn($v) => (int)$v)->toArray();
    }

    public function render()
    {
        // Pass poll interval so Blade can use it in wire:poll
        return view('livewire.charts.foundation-and-centers', [
            'pollInterval' => $this->pollInterval
        ]);
    }
}
