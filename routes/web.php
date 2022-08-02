<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\UserWkController;

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
    return view('home');
});

Route::get('/trainers', function () {
    return view('trainers');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/bookings', function () {
    return view('bookings');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/', function () {
    return view('home');
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';

Route::resource("/student", StudentController::class);

Route::resource("/comment", CommentController::class);

Route::resource("/onlineclasses", ClassController::class);

Route::resource("/users", UserWkController::class);

