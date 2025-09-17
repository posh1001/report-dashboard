<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostProgram extends Model
{
    protected $fillable = [
        'group_name',
        'name',
        'designation',
        'awareness',
        'phone',
        'new_cell_leaders',
        'outreach_locations',
        'leaders_for_outreach',
        'pastors_coordinators',
        'foundation_school',
        'baptized',
        'service_centers',
    ];

    protected $casts = [
        'foundation_school' => 'integer',
        'baptized' => 'integer',
        'service_centers' => 'integer',
        // if new_cell_leaders, outreach_locations, pastors_coordinators are numbers:
        'new_cell_leaders' => 'string',
        'outreach_locations' => 'string',
        'pastors_coordinators' => 'string',
    ];
}
