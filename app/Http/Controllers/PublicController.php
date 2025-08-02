<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $projects = Project::where('is_published', true)->latest()->take(3)->get(); // Ambil 3 proyek terbaru
        return view('public.home', compact('projects'));
    }

    public function projects()
    {
        $projects = Project::where('is_published', true)->latest()->paginate(9);
        return view('public.projects.index', compact('projects'));
    }

    public function showProject(Project $project)
    {
        // Pastikan proyek diterbitkan
        if (!$project->is_published) {
            abort(404);
        }
        return view('public.projects.show', compact('project'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }

    // public function submitContactForm(Request $request) { ... }
}