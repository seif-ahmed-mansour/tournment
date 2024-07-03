<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect('/admin');
    } else {
        return view('landing');
    }
});

// Authentication Routes
Route::group(['middleware' => 'web'], function () {
    Route::get('/login', [AuthController::class, "showLoginForm"])->name('login');
    Route::post('/login', [AuthController::class, "login"]);
    Route::post('/logout', [AuthController::class, "logout"])->name("logout");
    Route::get('/register', [AuthController::class, "showRegistrationForm"])->name('register');
    Route::post('/register', [AuthController::class, "register"]);
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [EventController::class, "index"]);
    Route::get('/admin/addEvent', [EventController::class, "add"])->name("addEvent");
    Route::post('/admin/choose-leader', [EventController::class, 'chooseLeader'])->name('chooseLeader');
    Route::post('/events', [EventController::class, 'store'])->name('storeEvent');
    Route::get('/events/{id}/edit', [EventController::class, 'event_edit'])->name('editEvent');
    Route::delete('/events/{id}', [EventController::class, 'event_destroy'])->name('deleteEvent');
    Route::put('/events/{id}', [EventController::class, 'event_store'])->name('updateEvent');

});

// Event Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/participate', [EventController::class, 'participate'])->name('participateEvents');
    Route::get('/events/seats-completed', [EventController::class, 'eventSeatsCompleted'])->name('eventSeatsCompleted');
    Route::get('/events/{event}', [EventController::class, 'showQuestions'])->name('showQuestions');
    Route::post('/events/{event}/submit', [EventController::class, 'submitAnswers'])->name('submitAnswers');
    Route::get('/events/{event}/leaderboard', [EventController::class, 'eventLeaderboard'])->name('eventLeaderboard');
});

// Leaderboard and Congrats Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/leaderboard', [EventController::class, 'leaderboard'])->name('leaderboard');
    Route::get('/congrats', function () {
        return view("congrats");
    })->name("congrats");
});
