<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    
    public function index()
    {
        $skills = skills::orderBy('id', 'desc')->paginate(8);
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        $categories = Categories::all()->sortBy('name');
        return view('skills.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'integer',
            'name' => 'required|max:80|string',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:5028',
        ]);

        // Image upload logic
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'skill_' . time() . '.' . $image->extension();
            $image->move(public_path('skills'), $imageName);
            $imagePath = 'skills/' . $imageName;
        }

        $skill = Skills::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'image' => $imagePath ?? null,
        ]);

        if ($skill) {
            return back()->with('success', 'Skill Created Successfully');
        } else {
            return back()->with('error', 'Skill Creation Failed. Please Try Again Later!');
        }
    }

    public function edit(Skills $skill)
    {
        $categories = Categories::all()->sortBy('name');
        return view('skills.edit', compact('skill', 'categories'));
    }

    public function update(Request $request, skills $skill)
    {
        $request->validate([
            'name' => 'nullable|string|max:80',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:5028',
        ]);

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'skill_' . time() . '.' . $image->extension();
            $image->move(public_path('skills'), $imageName);
            $imagePath = 'skills/' . $imageName;
            $skill->update(['image' => $imagePath]);
        }

        $skill->update([
            'name' => $request->input('name'),
        ]);

        
        return redirect()->route('skills.index')->with('success', 'Skill updated successfully');
    }

    public function destroy(Skills $skill)
    {
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully');
    }
}

