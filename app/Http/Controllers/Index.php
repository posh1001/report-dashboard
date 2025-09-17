<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostProgram;

class ReportController extends Controller
{
    /**
     * Display a listing of the reports.
     */
    public function index()
    {
        // Get latest reports with pagination (10 per page)
        $reports = PostProgram::latest()->paginate(10);

        return view('reports.index', compact('reports'));
    }

    /**
     * Display a specific report.
     */
    public function show(PostProgram $report)
    {
        return view('reports.show', compact('report'));
    }
}
