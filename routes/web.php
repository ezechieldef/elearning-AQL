<?php

use App\Http\Controllers\CourController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LiveDisponibleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// EZ
// Auth::routes();
//Authentication
Route::get('getregister', [RegisterController::class, 'getRegister'])->name('getregister');
Route::post('register', [RegisterController::class, 'register'])->name('register');



Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('cours-public', [CourController::class, 'coursPublic'])->name('cours-public');
Route::get('seance-live', [LiveDisponibleController::class, 'livePublics'])->name('seance-live');
Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');



Route::middleware(["auth", 'role:PROFESSEUR'])->group(function () {
    Route::resource('cours', CourController::class, ['except' => ['show']]);
    Route::get('cours/{cour}/publish', [CourController::class, 'publish'])->name('cours.publish');
    Route::resource('proposition-live', LiveDisponibleController::class, ['except' => ['show']]);
    Route::get('proposition-live/{live}/publish', [LiveDisponibleController::class, 'publish'])->name('proposition-live.publish');
});
Route::get('cours/{cour}', [CourController::class, 'show'])->name('cours.show');
Route::get('proposition-live/{id}', [LiveDisponibleController::class, 'show'])->name('proposition-live.show');


// FRU

// MA

// BR


Route::get('/showFeedbackForm/{cours_id}', [HomeController::class, 'showFeedbackForm'])->name('feedback.form');
Route::post('/submitFeedbackForm', [HomeController::class, 'submitFeedback'])->name('feedback.submit');
Route::get('/telecharger-certificat/{cours_id}', [HomeController::class, 'telechargerCertificat'])->name('certificat.download');




Route::redirect("/", "/home")->name("accueil");
Auth::routes();
