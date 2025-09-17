<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PostProgram;

class UpdateNotification extends Component
{
    public $notifications = 0;
    public $currentReports = [];
    public $showDropdown = false;
    public $badgeHidden = false;      // Tracks if badge should be hidden

    public function mount()
    {
        $this->refreshReports();
    }

    // Refresh unread notifications
    public function refreshReports()
    {
        $this->currentReports = PostProgram::where('read', false)->latest()->get();

        // Only show badge if it hasn't been hidden yet
        if (!$this->badgeHidden) {
            $this->notifications = $this->currentReports->count();
        }
    }

    // Toggle dropdown
    public function toggleDropdown()
    {
        $this->showDropdown = !$this->showDropdown;

        if ($this->showDropdown && !$this->badgeHidden) {
            // Hide badge when dropdown opens
            $this->badgeHidden = true;
            $this->notifications = 0;

            // Optionally mark all as read in DB so they stay persistent
            PostProgram::where('read', false)->update(['read' => true]);
        }
    }

    public function render()
    {
        return view('livewire.update-notification');
    }
}
