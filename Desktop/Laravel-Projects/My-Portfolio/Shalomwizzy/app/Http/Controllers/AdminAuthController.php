<?php

// app/Http/Controllers/AdminAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Categories;
use App\Models\Learnings;
use App\Models\Projects;
use App\Models\Skills;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function admin()
    {
        return view('admin.home');
    }

   

    // public function adminWelcome()
    // {
    //     return view('admin.admin-welcome');
    // }

//     public function welcome()
// {
//     return $this->loadWelcomeView();
// }

// public function adminWelcome()
// {
//     return $this->loadWelcomeView();
// }

public function adminWelcome(Request $request)
{
    $projectOffset = $request->get('project_offset', 0);
    $skillsOffset = $request->get('skill_offset', 0);
    $learningsOffset = $request->get('learning_offset', 0);

    $projects = Projects::orderBy('created_at', 'desc')->take(3)->get();
    $skills = Skills::orderBy('created_at', 'desc')->skip($skillsOffset)->take(6)->get();
    $learnings = Learnings::orderBy('id', 'desc')->skip($learningsOffset)->take(3)->get();

    return view('admin.admin-welcome', compact('projects', 'skills', 'skillsOffset', 'learnings', 'learningsOffset'));
}






    /**
     * Handle an admin login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/admin/dashboard');
        }

        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
