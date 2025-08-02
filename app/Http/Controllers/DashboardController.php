<?php

namespace App\Http\Controllers;

use App\Models\Project; // Penting: Import model Project
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the user's dashboard.
     */
    public function index(): View
    {
        $totalProjects = Project::count(); // Ambil total proyek
        $publishedProjects = Project::where('is_published', true)->count(); // Ambil total proyek yang diterbitkan

        return view('dashboard', compact('totalProjects', 'publishedProjects'));
    }
}