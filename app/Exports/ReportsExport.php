<?php

namespace App\Exports;

use App\Models\PostProgram;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PostProgram::select(
            'group_name',
            'name',
            'designation',
            'awareness',
            'phone',
            'foundation_school',
            'baptized',
            'service_centers',
            'new_cells',
            'returning_invitees',
            'new_church',
            'attendance',
            'new_cell_leaders',
            'outreach_locations',
            'leaders_for_outreach',
            'pastors_coordinators',
            'cell_pioneered',
            'churches_pioneered',
            'centers_pioneered'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Group',
            'Name',
            'Designation',
            'Awareness',
            'Phone',
            'Number Enrolled In Foundation School',
            'Number Baptized',
            'Number Service Centers',
            'Number Of New Cells',
            'Returning Invitees From ANOB',
            'Number Of New Churches',
            'Highest Service Attendance',
            'New Cell Leaders',
            'Outreach Locations',
            'Leaders for Outreach',
            'Pastors/Coordinators',
            'Cells Pioneered',
            'Churches Pioneered',
            'Centers Pioneered',
        ];
    }
}
