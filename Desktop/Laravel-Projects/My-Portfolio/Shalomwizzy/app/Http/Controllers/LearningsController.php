<?php

// namespace App\Http\Controllers;

// use App\Models\Categories;
// use App\Models\Learnings;
// use Illuminate\Http\Request;

// class LearningsController extends Controller
// {

    
//     public function index()
//     {
//         $learnings = learnings::orderBy('id', 'desc')->paginate(8);
//         return view('learnings.index', compact('learnings'));
//     }

//     public function create()
//     {
//         $categories = Categories::all()->sortBy('name');
//         return view('learnings.create', compact('categories'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'category_id' => 'integer',
//             'name' => 'required|max:80|string',
//             'image' => 'image|mimes:jpg,jpeg,png,gif|max:5028',
//             'description' => 'nullable|string',
//             'current_learning' => 'nullable|string',
//             'start_date' => 'nullable|date',
//             'end_date' => 'nullable|date',
//             'status' => 'nullable|string',
//             'tags' => 'nullable|string',
//             'skills_gained' => 'nullable|string',
//             'resources' => 'nullable|string',
//             'external_links' => 'nullable|string',
//             'rating' => 'nullable|numeric',
//         ]);

//         // Image upload logic
//         if ($request->hasFile('image')) {
//             $image = $request->file('image');
//             $imageName = 'learning_' . time() . '.' . $image->extension();
//             $image->move(public_path('learnings'), $imageName);
//             $imagePath = 'learnings/' . $imageName;
//         }
        

//         $learning = Learnings::create([
//             'category_id' => $request->input('category_id'),
//             'name' => $request->input('name'),
//             'description' => $request->input('description'),
//             'current_learning' => $request->input('current_learning'),
//             'start_date' => $request->input('start_date'),
//             'end_date' => $request->input('end_date'),
//             'status' => $request->input('status'),
//             'tags' => $request->input('tags'),
//             'skills_gained' => $request->input('skills_gained'),
//             'resources' => $request->input('resources'),
//             'external_links' => $request->input('external_links'),
//             'rating' => $request->input('rating'),
//             'image' => $imagePath ?? null,
//         ]);
        

//         if ($learning) {
//             return back()->with('success', ' Learning Created Successfully');
//         } else {
//             return back()->with('error', 'Learning Creation Failed. Please Try Again Later!');
//         }
//     }

//     public function edit(Learnings $learning)
//     {
//         $categories = Categories::all()->sortBy('name');
//         return view('learnings.edit', compact('learning', 'categories'));
//     }

//     public function update(Request $request, learnings $learning)
//     {
//         $request->validate([
//             'name' => 'nullable|string|max:80',
//             'image' => 'image|mimes:jpg,jpeg,png,gif|max:5028',
//             'description' => 'nullable|string',
//             'current_learning' => 'nullable|string',
//             'start_date' => 'nullable|date',
//             'end_date' => 'nullable|date',
//             'status' => 'nullable|string',
//             'tags' => 'nullable|string',
//             'skills_gained' => 'nullable|string',
//             'resources' => 'nullable|string',
//             'external_links' => 'nullable|string',
//             'rating' => 'nullable|numeric',
//         ]);

        
//         if ($request->hasFile('image')) {
//             $image = $request->file('image');
//             $imageName = 'learning_' . time() . '.' . $image->extension();
//             $image->move(public_path('learnings'), $imageName);
//             $imagePath = 'learnings/' . $imageName;
//             $learning->update(['image' => $imagePath]);
//         }

              

//         $learning->update([
//             'name' => $request->input('name'),
//             'description' => $request->input('description'),
//             'current_learning' => $request->input('current_learning'),
//             'start_date' => $request->input('start_date'),
//             'end_date' => $request->input('end_date'),
//             'status' => $request->input('status'),
//             'tags' => $request->input('tags'),
//             'skills_gained' => $request->input('skills_gained'),
//             'resources' => $request->input('resources'),
//             'external_links' => $request->input('external_links'),
//             'rating' => $request->input('rating'),
//         ]);

        
//         return redirect()->route('learnings.index')->with('success', 'Learning updated successfully');
//     }

//     public function destroy(Learnings $learning)
//     {
//         $learning->delete();

//         return redirect()->route('learnings.index')->with('success', 'Learning deleted successfully');
//     }
// }



namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Learnings;
use Illuminate\Http\Request;

class LearningsController extends Controller
{
    public function index()
    {
        $learnings = Learnings::orderBy('id', 'desc')->paginate(8);
        return view('learnings.index', compact('learnings'));
    }

    public function create()
    {
        $categories = Categories::all()->sortBy('name');
        $learning = new Learnings();
        return view('learnings.create', compact('categories', 'learning'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'integer',
            'name' => 'required|max:80|string',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:5028',
            'description' => 'nullable|string',
            'current_learning' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'nullable|string',
            'tags' => 'nullable|string',
            'skills_gained' => 'nullable|string',
            'resources' => 'nullable|string',
            'external_links_name.*' => 'nullable|string',
            'external_links_url.*' => 'nullable|string|url',
            'rating' => 'nullable|numeric',
        ]);

        // Image upload logic
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'learning_' . time() . '.' . $image->extension();
            $image->move(public_path('learnings'), $imageName);
            $imagePath = 'learnings/' . $imageName;
        }

        $externalLinks = [];

        foreach ($request->input('external_links_name') as $key => $name) {
            $url = $request->input('external_links_url')[$key];
            if ($name && $url) {
                $externalLinks[] = ['name' => $name, 'url' => $url];
            }
        }

        $learning = Learnings::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'current_learning' => $request->input('current_learning'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),
            'tags' => $request->input('tags'),
            'skills_gained' => $request->input('skills_gained'),
            'resources' => $request->input('resources'),
            'external_links' => json_encode($externalLinks),
            'rating' => $request->input('rating'),
            'image' => $imagePath ?? null,
        ]);

        if ($learning) {
            return back()->with('success', ' Learning Created Successfully');
        } else {
            return back()->with('error', 'Learning Creation Failed. Please Try Again Later!');
        }
    }

    public function edit(Learnings $learning)
    {
        $categories = Categories::all()->sortBy('name');
        return view('learnings.edit', compact('learning', 'categories'));
    }

    public function update(Request $request, Learnings $learning)
    {
        $request->validate([
            'name' => 'nullable|string|max:80',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:5028',
            'description' => 'nullable|string',
            'current_learning' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'status' => 'nullable|string',
            'tags' => 'nullable|string',
            'skills_gained' => 'nullable|string',
            'resources' => 'nullable|string',
            'external_links_name.*' => 'nullable|string',
            'external_links_url.*' => 'nullable|string|url',
            'rating' => 'nullable|numeric',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'learning_' . time() . '.' . $image->extension();
            $image->move(public_path('learnings'), $imageName);
            $imagePath = 'learnings/' . $imageName;
            $learning->update(['image' => $imagePath]);
        }

        $externalLinks = [];

        foreach ($request->input('external_links_name') as $key => $name) {
            $url = $request->input('external_links_url')[$key];
            if ($name && $url) {
                $externalLinks[] = ['name' => $name, 'url' => $url];
            }
        }

        $learning->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'current_learning' => $request->input('current_learning'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),
            'tags' => $request->input('tags'),
            'skills_gained' => $request->input('skills_gained'),
            'resources' => $request->input('resources'),
            'external_links' => json_encode($externalLinks),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('learnings.index')->with('success', 'Learning updated successfully');
    }

    public function destroy(Learnings $learning)
    {
        $learning->delete();

        return redirect()->route('learnings.index')->with('success', 'Learning deleted successfully');
    }
}


