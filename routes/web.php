<?php

use App\Http\Controllers\CourController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionMeetController;
use App\Models\SessionMeet;
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
    return view('welcome');
});

Auth::routes();

Route::get('home', [HomeController::class, 'accueil'])->name('home');
Route::get('cours-public', [CourController::class, 'coursPublic'])->name('cours-public');
Route::get('seance-live', [SessionMeetController::class, 'seancePublics'])->name('seance-live');
Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

Route::redirect("/", "/home")->name("accueil");
