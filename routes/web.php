<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BackendDashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', function () {
    return Inertia::render('App', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::post('/create_user', [RegisteredUserController::class, 'store'])->name('user.create');

Route::get('/new-arrivals', function () {
    return inertia('NewArrivals');
})->name('newArrivals');
Route::get('/exclusive', function () {
    return inertia('Exclusive');
})->name('exclusive');
Route::get('/about-us', function () {
    return inertia('AboutUs');
})->name('aboutUs');

Route::get('/all_products', function () {
    return inertia('Categories/All');
})->name('browse.all');
Route::get('/accessories', function () {
    return inertia('Categories/Accessories');
})->name('browse.accessories');
Route::get('/brands', function () {
    return inertia('Categories/Brands');
})->name('browse.brands');
Route::get('/shoes', function () {
    return inertia('Categories/Shoes');
})->name('browse.shoes');
Route::get('/wearables', function () {
    return inertia('Categories/Wearables');
})->name('browse.wearables');

//route for linking all the assets
Route::get('assets/{path}', function ($path) {
    return response()->file(resource_path("assets/$path"));
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware(['auth', 'verified'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/backend', [BackendDashboardController::class, 'index']);

require __DIR__ . '/auth.php';
