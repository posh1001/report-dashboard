<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostProgram;

class ReportController extends Controller
{
    /**
     * Display a list of all reports.
     */
    public function index()
    {
        // Get all reports, you can paginate if needed
        $reports = PostProgram::latest()->get();

        return view('reports.index', compact('reports'));
    }

    /**
     * Display a single report.
     */
    public function show(PostProgram $report)
    {
        return view('reports.show', compact('report'));
    }
}
