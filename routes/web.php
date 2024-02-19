<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/showFeedbackForm/{cours_id}', [App\Http\Controllers\HomeController::class, 'showFeedbackForm'])->name('feedback.form');
Route::post('/submitFeedbackForm', [App\Http\Controllers\HomeController::class, 'submitFeedback'])->name('feedback.submit');

Route::get('/telecharger-certificat/{cours_id}', [App\Http\Controllers\HomeController::class, 'telechargerCertificat'])->name('certificat.download');