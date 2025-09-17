<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PostProgram;

class Navbar extends Component
{
    public $notifications = 0;

    protected $listeners = ['report-submitted' => 'incrementNotifications'];

    public function mount()
    {
        // Load notifications from session, default to 0
        $this->notifications = session('notifications_count', 0);
    }

    // Increment when a new report is submitted
    public function incrementNotifications()
    {
        $this->notifications++;
        session(['notifications_count' => $this->notifications]);
    }

    // Clear notifications when bell clicked
    public function clearNotifications()
    {
        $this->notifications = 0;
        session(['notifications_count' => 0]);
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
