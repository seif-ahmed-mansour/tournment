<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect('/admin');
    } else {
        return view('landing');
    }
});

// Login
Route::get('/login', [AuthController::class, "showLoginForm"])->name('login');
Route::post('/login', [AuthController::class, "login"]);
Route::post('/logout', [AuthController::class, "logout"])->name("logout");
// Registration
Route::get('/register', [AuthController::class, "showRegistrationForm"])->name('register');
Route::post('/register', [AuthController::class, "register"]);
Route::get("/admin", function () {
    return view("adminDashboard");
})->middleware('auth', 'admin');
Route::get("/admin", [EventController::class, "index"])->middleware("auth", "admin");
Route::get("/admin/addEvent",[EventController::class,"add"])->name("addEvent");
Route::post('/events', [EventController::class, 'store'])->name('storeEvent');

Route::post('/participate', [EventController::class, 'participate'])->name('participateEvents');

Route::get('/events/{event}', [EventController::class, 'showQuestions'])->name('showQuestions');
Route::post('/events/{event}/submit', [EventController::class, 'submitAnswers'])->name('submitAnswers');
Route::get('/leaderboard', [EventController::class, 'leaderboard'])->name('leaderboard');
Route::get('/events/{event}/leaderboard', [EventController::class, 'eventLeaderboard'])->name('eventLeaderboard');
Route::get("/congrats",function(){
    return view("congrats");
})->name("congrats");