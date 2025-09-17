<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminNavbar extends Component
{
    public $userInitial;
    public $notifications = 0;

    public function mount()
    {
        $user = Auth::user();

        if ($user && $user->is_admin) {
            $this->userInitial = strtoupper(substr($user->username ?? 'U', 0, 1));
            $this->notifications = $user->unreadNotifications()->count();
        }
    }

    public function clearNotifications()
    {
        $user = Auth::user();
        if ($user) {
            $user->unreadNotifications->markAsRead();
            $this->notifications = 0;
        }
    }

    public function render()
    {
        return view('livewire.admin-navbar');
    }
}
