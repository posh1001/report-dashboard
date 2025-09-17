<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PostProgram;

class ReportCharts extends Component
{
    protected $listeners = ['report-submitted' => 'refreshCharts'];

    public $groups = [];
    public $foundation = [];
    public $serviceCenters = [];
    public $newLeaders = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->groups = PostProgram::pluck('group_name')->toArray();
        $this->foundation = PostProgram::pluck('foundation_school')->toArray();
        $this->serviceCenters = PostProgram::pluck('service_centers')->toArray();
        $this->newLeaders = PostProgram::pluck('new_leaders')->toArray();
    }

    public function refreshCharts()
    {
        $this->loadData();

        // Dispatch browser event to update charts
        $this->dispatchBrowserEvent('updateCharts', [
            'groups' => $this->groups,
            'foundation' => $this->foundation,
            'serviceCenters' => $this->serviceCenters,
            'newLeaders' => $this->newLeaders,
        ]);
    }

    public function render()
    {
        return view('livewire.report-charts', [
            'groups' => $this->groups,
            'foundation' => $this->foundation,
            'serviceCenters' => $this->serviceCenters,
            'newLeaders' => $this->newLeaders,
        ]);
    }
}

