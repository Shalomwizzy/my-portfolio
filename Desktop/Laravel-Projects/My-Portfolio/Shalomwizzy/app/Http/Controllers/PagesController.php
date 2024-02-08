<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Learnings;
use App\Models\Projects;
use App\Models\Skills;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function adminWelcome()
{
    return $this->loadWelcomeView();
}

public function thankYou(){
    return view('thanksyou');
}

  

public function welcome(Request $request)
{
    $projectOffset = $request->get('project_offset', 0);
    $skillsOffset = $request->get('skill_offset', 0);
    $learningsOffset = $request->get('learning_offset', 0);

    $projects = Projects::orderBy('created_at', 'desc')->take(3)->get();
    $skills = Skills::orderBy('created_at', 'desc')->skip($skillsOffset)->take(6)->get();
    $learnings = Learnings::orderBy('id', 'desc')->skip($learningsOffset)->take(3)->get();

    return view('welcome', compact('projects', 'skills', 'skillsOffset', 'learnings', 'learningsOffset'));
}



private function loadWelcomeView()
{
    $projects = Projects::orderBy('created_at', 'desc')->take(3)->get();
    $skills = Skills::orderBy('created_at', 'desc')->take(6)->get();
    $learnings = Learnings::orderBy('id', 'desc')->take(3)->get();

    return view('welcome', compact('projects', 'skills', 'learnings'));
}



    public function WelcomeSection(Request $request)
{
    $projectOffset = $request->get('project_offset', 0);
    $skillsOffset = $request->get('skill_offset', 0);
    $learningsOffset = $request->get('learning_offset', 0); // Add learning offset

    $projects = Projects::orderBy('created_at', 'desc')->skip($projectOffset)->take(3)->get();
    $skills = Skills::orderBy('created_at', 'desc')->skip($skillsOffset)->take(6)->get();
    $learnings = Learnings::orderBy('id', 'desc')->skip($learningsOffset)->take(3)->get(); // Get learnings

    $projectView = $projects->isEmpty() ? null : view('partials.project-section', compact('projects', 'projectOffset'))->render();
    $skillView = $skills->isEmpty() ? null : view('partials.skills-section', compact('skills', 'skillsOffset'))->render();
    $learningView = $learnings->isEmpty() ? null : view('partials.learnings-section', compact('learnings', 'learningsOffset'))->render(); // Render learning view

    if ($request->ajax()) {
        return response()->json([
            'projectView' => $projectView,
            'skillView' => $skillView,
            'learningView' => $learningView, // Add learning view to the response
            'projectOffset' => $projectOffset + $projects->count(),
            'skillsOffset' => $skillsOffset + $skills->count(),
            'learningOffset' => $learningsOffset + $learnings->count(), // Increment the learning offset
        ]);
    }

    $skillsOffset = $skills->isEmpty() ? 0 : $skillsOffset + $skills->count();
    $projectOffset = $projects->isEmpty() ? 0 : $projectOffset + $projects->count();
    $learningsOffset = $learnings->isEmpty() ? 0 : $learningsOffset + $learnings->count(); // Increment the learning offset

    return view('partials.welcome-section', compact('projects', 'projectOffset', 'skills', 'skillsOffset', 'learnings', 'learningsOffset'));
}

    


    
    

    public function Project(Request $request)
    {
        $offset = $request->get('offset', 0);
        $projects = Projects::orderBy('created_at', 'desc')->skip($offset)->take(3)->get();
        $projectOffset = $offset + 3;
    
        if ($projects->isEmpty()) {
            // If there are no more projects, return a message
            return response()->json(['message' => 'No more projects available'], 200);
        }
    
        if ($request->ajax()) {
            // If it's an AJAX request, return only the partial view
            $view = view('partials.project-section', compact('projects', 'projectOffset'))->render();
    
            return response()->json(['view' => $view, 'projectOffset' => $projectOffset], 200);
        }
    
        // For non-AJAX requests, render the full view with the Load More button
        return view('projects.userIndex', compact('projects', 'offset', 'projectOffset'));
    }
    
    




    public function skillsIndex(Request $request)
    {
        $offset = $request->get('offset', 0);
        $skills = Skills::orderBy('created_at', 'desc')->skip($offset)->take(6)->get();
        $skillsOffset = $offset + 3;  // Define $skillsOffset
    
        if ($skills->isEmpty()) {
            // If there are no more skills, return a message
            return response()->json(['message' => 'No more skills available'], 200);
        }
    
        if ($request->ajax()) {
            // If it's an AJAX request, return only the partial view
            $view = view('partials.skills-section', compact('skills', 'skillsOffset'))->render();
    
            return response()->json(['view' => $view, 'skillsOffset' => $skillsOffset], 200);
        }
    
        // For non-AJAX requests, render the full view with the Load More button
        return view('skills.userIndex', compact('skills', 'offset', 'skillsOffset'));
    }
    

    public function learningsIndex(Request $request)
    {
        $offset = $request->get('offset', 0);
        $learnings = Learnings::orderBy('created_at', 'desc')->skip($offset)->take(3)->get();
        $learningsOffset = $offset + 3;
    
      
        
        if ($learnings->isEmpty()) {
            // If there are no more learnings, return a message
            return response()->json(['message' => 'No more learnings available'], 200);
        }
    
        if ($request->ajax()) {
            // If it's an AJAX request, return only the partial view
            $view = view('partials.learnings-section', compact('learnings', 'learningsOffset'))->render();
    
            return response()->json(['view' => $view, 'offset' => $learningsOffset], 200);
        }
    
        // For non-AJAX requests, render the full view with the Load More button
        return view('learnings.userIndex', compact('learnings', 'offset', 'learningsOffset'));
    }
  
    
    
    

}
    
    
    
    
