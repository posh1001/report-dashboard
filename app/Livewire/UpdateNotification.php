<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PostProgram;

class UpdateNotification extends Component
{
    public $notifications = 0;        // Badge count
    public $currentReports = [];      // Latest reports
    public $showDropdown = false;     // Controls dropdown state

    public function mount()
    {
        $this->refreshReports();
    }

    /**
     * Refresh unread notifications
     */
    public function refreshReports()
    {
        // Fetch unread reports
        $this->currentReports = PostProgram::where('read', false)
            ->latest()
            ->take(10)
            ->get();

        $this->notifications = $this->currentReports->count();
    }

    /**
     * Toggle dropdown open/close
     */
    public function toggleDropdown()
    {
        $this->showDropdown = !$this->showDropdown;

        // If dropdown opens → mark notifications as read
        if ($this->showDropdown) {
            $this->markAllAsRead();
        }
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        PostProgram::where('read', false)->update(['read' => true]);
        $this->notifications = 0;

        // Refresh to show updated state
        $this->refreshReports();
    }

    public function render()
    {
        return view('livewire.update-notification');
    }
}
