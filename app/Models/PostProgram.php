<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostProgram extends Model
{
    protected $fillable = [
        // Step 1
        'group_name',
        'name',
        'designation',
        'awareness',
        'phone',

        // Step 2
        'new_cell_leaders',
        'outreach_locations',
        'leaders_for_outreach',
        'pastors_coordinators',
        'cell_pioneered',
        'churches_pioneered',
        'centers_pioneered',

        // Step 3
        'foundation_school',
        'baptized',
        'service_centers',
        'new_cells',
        'returning_invitees',
        'new_church',
        'attendance',

        // Notifications
        'is_read',
    ];

    protected $casts = [
        // Step 3 numbers
        'foundation_school'   => 'integer',
        'baptized'            => 'integer',
        'service_centers'     => 'integer',
        'new_cells'           => 'integer',
        'returning_invitees'  => 'integer',
        'new_church'          => 'integer',
        'attendance'          => 'integer',

        // Notifications
        'is_read'             => 'boolean',
    ];
}
