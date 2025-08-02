<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project; // Make sure this is present
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule; // Make sure this is present for update method

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $technologiesInput = $request->input('technologies');
        $technologiesArray = [];

        if (!empty($technologiesInput)) {
            $technologiesArray = array_map('trim', explode(',', $technologiesInput));
            $technologiesArray = array_filter($technologiesArray);
            $technologiesArray = array_values($technologiesArray);
        }

        $request->merge(['technologies' => $technologiesArray]);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255|unique:projects,title', // Added unique validation
            'short_description' => 'required|string|max:255',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'demo_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string|max:50',
            'is_published' => 'boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('project-images', 'public');
        }

        $slug = Str::slug($validatedData['title']);

        Project::create([
            'title' => $validatedData['title'],
            'slug' => $slug,
            'short_description' => $validatedData['short_description'],
            'long_description' => $validatedData['long_description'],
            'image' => $imagePath,
            'demo_url' => $validatedData['demo_url'],
            'github_url' => $validatedData['github_url'],
            'technologies' => $validatedData['technologies'],
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyek berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project) // <-- THIS METHOD MUST BE HERE
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $technologiesInput = $request->input('technologies');
        $technologiesArray = [];

        if (!empty($technologiesInput)) {
            $technologiesArray = array_map('trim', explode(',', $technologiesInput));
            $technologiesArray = array_filter($technologiesArray);
            $technologiesArray = array_values($technologiesArray);
        }

        $request->merge(['technologies' => $technologiesArray]);

        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('projects')->ignore($project->id)],
            'short_description' => 'required|string|max:255',
            'long_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'demo_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string|max:50',
            'is_published' => 'boolean',
        ]);

        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            if ($project->image && Storage::disk('public')->exists($project->image)) {
                Storage::disk('public')->delete($project->image);
            }
            $imagePath = $request->file('image')->store('project-images', 'public');
        }

        $slug = $project->slug;
        if ($project->title !== $validatedData['title']) {
            $slug = Str::slug($validatedData['title']);
        }

        $project->update([
            'title' => $validatedData['title'],
            'slug' => $slug,
            'short_description' => $validatedData['short_description'],
            'long_description' => $validatedData['long_description'],
            'image' => $imagePath,
            'demo_url' => $validatedData['demo_url'],
            'github_url' => $validatedData['github_url'],
            'technologies' => $validatedData['technologies'],
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyek berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
                         ->with('success', 'Proyek berhasil dihapus!');
    }
}