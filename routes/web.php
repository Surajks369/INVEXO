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

Route::get('/', [HomeController::class, 'index']);

// Frontend login routes (user)
Route::get('/user-login', [FrontLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user-login', [FrontLoginController::class, 'login'])->name('user.login.submit');
Route::post('/user-logout', [FrontLoginController::class, 'logout'])->name('user.logout');

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

