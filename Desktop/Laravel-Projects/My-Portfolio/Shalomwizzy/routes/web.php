<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LearningsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\Mailer\Transport\Smtp\Auth\LoginAuthenticator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// PAGES CONTROLLER
Route::get('/project', [PagesController::class, 'project'])->name('projects.userIndex');
Route::get('/', [PagesController::class, 'welcome'])->name('welcome');
Route::get('/skillsIndex', [PagesController::class, 'skillsIndex'])->name('skills.userIndex');
Route::get('/learningsIndex', [PagesController::class, 'learningsIndex'])->name('learnings.userIndex');
Route::get('/welcome-section', [PagesController::class, 'WelcomeSection'])->name('welcome.section');
Route::get('/thankYou',[PagesController::class, 'thankYou'])->name('thank.you');
Route::get('/aboutMe',[PagesController::class, 'aboutMe'])->name('about.me');

// ADMIN ROUTES
    Route::middleware(['auth', 'role.checker'])->group(function () {
    Route::get('/admin.home', [AdminAuthController::class, 'admin'])->name('admin.home');
    Route::get('/admin-welcome', [AdminAuthController::class, 'adminWelcome'])->name('admin.welcome');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


// CATEGORY ROUTES
    Route::middleware(['auth', 'role.checker'])->group(function () {
    Route::get('category.create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category.store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category.index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('category.edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::delete('category.destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('category.update/{id}', [CategoryController::class, 'update'])->name('category.update');
    // Add other category routes as needed
});


// PROJECTS ROUTES
    Route::middleware(['auth', 'role.checker'])->group(function () {
    Route::get('/projects.index', [ProjectsController::class, 'index'])->name('projects.index');
    Route::get('/projects.create', [ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/projects.store', [ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectsController::class, 'destroy'])->name('projects.destroy');

});



// SKILLS ROUTES
    Route::middleware(['auth', 'role.checker'])->group(function () {
    Route::get('/skills.index', [SkillsController::class, 'index'])->name('skills.index');
    Route::get('/skills.create', [SkillsController::class, 'create'])->name('skills.create');
    Route::post('/skills.store', [SkillsController::class, 'store'])->name('skills.store');
    Route::get('/skills/{skill}/edit', [SkillsController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{skill}', [SkillsController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillsController::class, 'destroy'])->name('skills.destroy');
    
});

// LEARNING ROUTES

    Route::middleware(['auth', 'role.checker'])->group(function () {
    Route::get('/learnings.index', [LearningsController::class, 'index'])->name('learnings.index');
    Route::get('/learnings.create', [LearningsController::class, 'create'])->name('learnings.create');
    Route::post('/learnings.store', [LearningsController::class, 'store'])->name('learnings.store');
    Route::get('/learnings/{learning}/edit', [LearningsController::class, 'edit'])->name('learnings.edit');
    Route::put('/learnings/{learning}', [LearningsController::class, 'update'])->name('learnings.update');
    Route::delete('/learnings/{learning}', [LearningsController::class, 'destroy'])->name('learnings.destroy');
});



//MAIL ROUTE
Route::post('/sendMails', [MailController::class, 'sendMails'])->name('send.mail');
Route::get('contactMe', [MailController::class, 'contactMe'])->name('contact.me');



