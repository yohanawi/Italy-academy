<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ContactSubmissionController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public Website Routes
Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/courses', [WebsiteController::class, 'courses'])->name('courses');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact', [WebsiteController::class, 'storeContact'])->name('contact.store');

// Blog Routes - Website
Route::get('/blogs', [WebsiteController::class, 'blogs'])->name('blogs.index');
Route::get('/blogs/{slug}', [WebsiteController::class, 'blogShow'])->name('blogs.show');
Route::post('/blogs/{slug}/comments', [WebsiteController::class, 'storeComment'])->name('blogs.comments.store');

// Admin Panel Routes (with authentication and role check)
Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

    // Blog Management Routes - Admin
    Route::resource('blogs', AdminBlogController::class)->names([
        'index' => 'admin.blogs.index',
        'create' => 'admin.blogs.create',
        'store' => 'admin.blogs.store',
        'show' => 'admin.blogs.show',
        'edit' => 'admin.blogs.edit',
        'update' => 'admin.blogs.update',
        'destroy' => 'admin.blogs.destroy',
    ]);

    // Contact Submissions Routes - Admin
    Route::get('contact-submissions', [ContactSubmissionController::class, 'index'])->name('admin.contact-submissions.index');
    Route::get('contact-submissions/{contactSubmission}', [ContactSubmissionController::class, 'show'])->name('admin.contact-submissions.show');
    Route::patch('contact-submissions/{contactSubmission}/status', [ContactSubmissionController::class, 'updateStatus'])->name('admin.contact-submissions.update-status');
    Route::delete('contact-submissions/{contactSubmission}', [ContactSubmissionController::class, 'destroy'])->name('admin.contact-submissions.destroy');
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
