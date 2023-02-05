<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Models\Banner;
use App\Models\Petcare;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/petcare', [HomeController::class, 'petcare']);
Route::get('/petclinic', [HomeController::class, 'petclinic']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/about', [HomeController::class, 'about']);

//Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

//Dashboard
Route::prefix('/admin')->middleware('auth')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

    Route::resource('banner', BannerController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('doctor', DoctorController::class);
    Route::resource('team', TeamController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('about', AboutController::class);
});
