<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PostProgram;

class PostProgramDashboard extends Component
{
    use WithPagination;

    public $search = ''; // search query
    protected $listeners = ['report-submitted' => '$refresh', 'search-updated' => 'updateSearch'];

    // Reset pagination when search changes
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateSearch($value)
    {
        $this->search = $value;
    }

    public function render()
    {
        $reports = PostProgram::query()
            ->when($this->search, function($query) {
                $query->where('group_name', 'like', "%{$this->search}%")
                      ->orWhere('name', 'like', "%{$this->search}%")
                      ->orWhere('designation', 'like', "%{$this->search}%")
                      ->orWhere('awareness', 'like', "%{$this->search}%")
                      ->orWhere('phone', 'like', "%{$this->search}%")
                      ->orWhere('new_cell_leaders', 'like', "%{$this->search}%")
                      ->orWhere('outreach_locations', 'like', "%{$this->search}%")
                      ->orWhere('leaders_for_outreach', 'like', "%{$this->search}%")
                      ->orWhere('pastors_coordinators', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.post-program-dashboard', compact('reports'));
    }
}
