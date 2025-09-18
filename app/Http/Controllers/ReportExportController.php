<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new ReportsExport, 'reports.xlsx');
    }

    public function exportCsv()
    {
        return Excel::download(new ReportsExport, 'reports.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
