<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Allow mass assignment
    protected $fillable = [
        'username',
        'password',
    ];

    // Hide sensitive fields
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Optional: auto-hash passwords
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
