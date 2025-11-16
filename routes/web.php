<?php
use App\Http\Controllers\FrontLoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CryptoIdeaController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubscriptionController;
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

use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

// Frontend login routes (user)
Route::get('/user-login', [FrontLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user-login', [FrontLoginController::class, 'login'])->name('user.login.submit');
Route::get('/user-register', [FrontLoginController::class, 'showRegisterForm'])->name('user.register');
Route::post('/user-register', [FrontLoginController::class, 'register'])->name('user.register.submit');
Route::post('/user-logout', [FrontLoginController::class, 'logout'])->name('user.logout');

// Protected user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [FrontLoginController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/research-reports', [FrontLoginController::class, 'researchReports'])->name('user.research_reports');
    Route::get('/research-report/{public_id}', [App\Http\Controllers\ResearchReportController::class, 'show'])->name('research.report.detail');
    // User profile routes
    Route::get('/profile', [FrontLoginController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [FrontLoginController::class, 'editProfile'])->name('user.profile.edit');
    Route::put('/profile', [FrontLoginController::class, 'updateProfile'])->name('user.profile.update');
});

// Public download route (no auth required)
Route::get('/research-report/download/{public_id}/{token}', [App\Http\Controllers\ResearchReportController::class, 'download'])
    ->name('research.report.download')
    ->where('token', '[A-Za-z0-9]+');

// Contact page routes
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Admin routes
Route::get('admin/login', [LoginController::class, 'login'])->name('login');
Route::post('do-login', [LoginController::class, 'doLogin'])->name('do.login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes for authenticated admins
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    // Home route - commonly used after authentication
    Route::get('/home', function () {
        return view('admin.adminhome');
    })->name('home');

    // Resource route for categories
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class, [
        'names' => [
            'index' => 'categories.index',
            'create' => 'categories.create',
            'edit' => 'categories.edit',
            'show' => 'categories.show',
        ],
        'parameters' => [
            'categories' => 'category',
        ],
    ]);
    
    // Resource route for research reports
    Route::resource('research-reports', App\Http\Controllers\Admin\ResearchReportController::class);

    // Resource route for notifications
    Route::resource('notifications', NotificationController::class);

    // Resource route for users
    Route::resource('users', UserController::class);

    // Resource route for crypto ideas
    Route::resource('crypto-ideas', CryptoIdeaController::class);

    // Resource route for subscriptions
    Route::resource('subscriptions', SubscriptionController::class);
});

