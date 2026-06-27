<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\Auth\AdminAuthController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('contact',[ContactController::class,'index']);
Route::get('/projects',[ProjectsController::class,'index'])->name('projects');
Route::get('/projects/{id}',[ProjectsController::class,'show'])->name('projects.show');

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.dashboard');

    Route::get('/project/pdf', [AdminProjectController::class, 'cetakPdf'])->name('projects.pdf');

    Route::resource('projects', AdminProjectController::class)->names('admin.projects');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
});

// Route::get('/', function () {
//     return view('pages.home');
// });

// Route::get('/projects', function () {
//     return view('pages.projects');
// });

Route::get('/about', function () {
    return view('pages.about');
});

// Route::get('/contact', function () {
//     return view('pages.contact');
// });