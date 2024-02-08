<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
// public function __construct()
    // {
    //     $this->middleware(['auth', 'verified', 'role.checker']);
    // }

    public function index()
    {
        $projects = Projects::orderBy('id', 'desc')->paginate(8);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Categories::all()->sortBy('name');
        return view('projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'integer',
            'name' => 'required|max:80|string',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:5028',
            'description' => 'nullable|string',
            'ui_ux' => 'nullable|string',
            'front_end' => 'nullable|string',
            'back_end' => 'nullable|string',
            'stack_used' => 'nullable|string',
            'github_link' => 'nullable|string',
            'live_link' => 'nullable|string',
           
        ]);

        // Image upload logic
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'project_' . time() . '.' . $image->extension();
            $image->move(public_path('projects'), $imageName);
            $imagePath = 'projects/' . $imageName;
        }

        $project = projects::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'ui_ux' => $request->input('ui_ux'),
            'front_end' => $request->input('front_end'),
            'back_end' => $request->input('back_end'),
            'stack_used' => $request->input('stack_used'),
            'github_link' => $request->input('github_link'),
            'live_link' => $request->input('live_link'),
            'image' => $imagePath ?? null,
        ]);

        if ($project) {
            return back()->with('success', 'Project Created Successfully');
        } else {
            return back()->with('error', 'Project Creation Failed. Please Try Again Later!');
        }
    }

    public function edit(Projects $project)
    {
        $categories = Categories::all()->sortBy('name');
        return view('projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Projects $project)
    {
        $request->validate([
            'name' => 'nullable|string|max:80',
            'description' => 'nullable|string',
            'ui_ux' => 'nullable|string',
            'front_end' => 'nullable|string',
            'back_end' => 'nullable|string',
            'stack_used' => 'nullable|string',
            'github_link' => 'nullable|string',
            'live_link' => 'nullable|string',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:5028',
        ]);

        // Image update logic
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'project_' . time() . '.' . $image->extension();
            $image->move(public_path('projects'), $imageName);
            $imagePath = 'projects/' . $imageName;
            $project->update(['image' => $imagePath]);
        }

        $project->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'ui_ux' => $request->input('ui_ux'),
            'front_end' => $request->input('front_end'),
            'back_end' => $request->input('back_end'),
            'stack_used' => $request->input('stack_used'),
            'github_link' => $request->input('github_link'),
            'live_link' => $request->input('live_link'),
        ]);

        // Redirect back to the product index page with a success message
        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

 
    


    public function destroy(Projects $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
