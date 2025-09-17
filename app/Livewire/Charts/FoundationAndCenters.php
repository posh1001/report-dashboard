<?php

namespace App\Livewire\Charts;

use Livewire\Component;
use App\Models\PostProgram;

class FoundationAndCenters extends Component
{
    public $groups = [];
    public $foundation = [];
    public $serviceCenters = [];

    // snake_case (available to Blade as $cell_pioneered, etc.)
    public $cell_pioneered = [];
    public $churches_pioneered = [];
    public $centers_pioneered = [];

    // camelCase duplicates (available to Blade as $cellPioneered, etc.)
    public $cellPioneered = [];
    public $churchesPioneered = [];
    public $centersPioneered = [];

    // Poll interval in seconds
    public $pollInterval = 5;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Always fetch the latest data
        $programs = PostProgram::select(
            'group_name',
            'foundation_school',
            'service_centers',
            'cell_pioneered',
            'churches_pioneered',
            'centers_pioneered'
        )->get();

        $this->groups           = $programs->pluck('group_name')->toArray();
        $this->foundation       = $programs->pluck('foundation_school')->map(fn($v) => (int) $v)->toArray();
        $this->serviceCenters   = $programs->pluck('service_centers')->map(fn($v) => (int) $v)->toArray();

        // Map new fields (cast to int for charts; non-numeric become 0)
        $this->cell_pioneered    = $programs->pluck('cell_pioneered')->map(fn($v) => (int) $v)->toArray();
        $this->churches_pioneered= $programs->pluck('churches_pioneered')->map(fn($v) => (int) $v)->toArray();
        $this->centers_pioneered = $programs->pluck('centers_pioneered')->map(fn($v) => (int) $v)->toArray();

        // Keep camelCase copies so either style works in views
        $this->cellPioneered     = $this->cell_pioneered;
        $this->churchesPioneered = $this->churches_pioneered;
        $this->centersPioneered  = $this->centers_pioneered;
    }

    public function render()
    {
        return view('livewire.charts.foundation-and-centers', [
            'pollInterval' => $this->pollInterval
        ]);
    }
}
