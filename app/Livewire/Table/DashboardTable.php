<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PostProgram;

class DashboardTable extends Component
{
    public $currentStep = 1;
    public $totalSteps = 3;
    public $successMessage = '';

    // Step 1
    public $group_name, $name, $designation, $awareness, $phone;

    // Step 2
    public $new_cell_leaders, $outreach_locations, $leaders_for_outreach, $pastors_coordinators;

    // Step 3
    public $foundation_school = 0, $baptized = 0, $service_centers = 0;

    protected $rules = [
        // Step 1
        'group_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'designation' => 'nullable|string|max:255',
        'awareness' => 'required|string|max:3', // Yes/No
        'phone' => 'nullable|string|max:20',

        // Step 2
        'new_cell_leaders' => 'nullable|string|max:1000',
        'outreach_locations' => 'nullable|string|max:1000',
        'leaders_for_outreach' => 'nullable|string|max:1000',
        'pastors_coordinators' => 'nullable|string|max:1000',

        // Step 3
        'foundation_school' => 'nullable|integer|min:0',
        'baptized' => 'nullable|integer|min:0',
        'service_centers' => 'nullable|integer|min:0',
    ];

    public function mount()
    {
        $this->resetForm();
    }

    public function render()
    {
        return view('livewire.dashboard-table');
    }

    // Step-specific rules
    public function rulesForStep()
    {
        return match($this->currentStep) {
            1 => [
                'group_name' => $this->rules['group_name'],
                'name' => $this->rules['name'],
                'designation' => $this->rules['designation'],
                'awareness' => $this->rules['awareness'],
                'phone' => $this->rules['phone'],
            ],
            2 => [
                'new_cell_leaders' => $this->rules['new_cell_leaders'],
                'outreach_locations' => $this->rules['outreach_locations'],
                'leaders_for_outreach' => $this->rules['leaders_for_outreach'],
                'pastors_coordinators' => $this->rules['pastors_coordinators'],
            ],
            3 => [
                'foundation_school' => $this->rules['foundation_school'],
                'baptized' => $this->rules['baptized'],
                'service_centers' => $this->rules['service_centers'],
            ],
        };
    }

    public function nextStep()
    {
        $this->validate($this->rulesForStep());
        if ($this->currentStep < $this->totalSteps) {
            $this->currentStep++;
        }
        $this->resetValidation();
    }

    public function prevStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
        $this->resetValidation();
    }

    public function submit()
    {
        $this->validate();

        DashboardTable::create([
            'group_name' => $this->group_name,
            'name' => $this->name,
            'designation' => $this->designation,
            'awareness' => $this->awareness,
            'phone' => $this->phone,
            'new_cell_leaders' => $this->new_cell_leaders,
            'outreach_locations' => $this->outreach_locations,
            'leaders_for_outreach' => $this->leaders_for_outreach,
            'pastors_coordinators' => $this->pastors_coordinators,
            'foundation_school' => $this->foundation_school ?: 0,
            'baptized' => $this->baptized ?: 0,
            'service_centers' => $this->service_centers ?: 0,
        ]);

        $this->resetForm();
        $this->currentStep = 1;
        $this->successMessage = 'Report submitted successfully!';
        $this->resetValidation();

        $this->dispatch('report-submitted');

        $currentNotifications = session('notifications_count', 0);
        session(['notifications_count' => $currentNotifications + 1]);
    }

    private function resetForm()
    {
        $this->group_name = null;
        $this->name = null;
        $this->designation = null;
        $this->awareness = null;
        $this->phone = null;
        $this->new_cell_leaders = null;
        $this->outreach_locations = null;
        $this->leaders_for_outreach = null;
        $this->pastors_coordinators = null;
        $this->foundation_school = 0;
        $this->baptized = 0;
        $this->service_centers = 0;
    }
}
