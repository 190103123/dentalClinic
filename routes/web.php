<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\EmailController;
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
    return view('welcome');
});

Route::get('/dent', function () {
    return view('dentall');
});

Route::get('/th', function () {
    return view('mails');
});


Route::get('/dent', [EmailController::class, 'index'])->name('email');
Route::post('/dent/send', [EmailController::class, 'send'])->name('email-send');
Route::get('dent/{lang?}', function($lang){
    App::setlocale($lang);
    return view('dentall');
})->name('dent');

Route::get('/{lang?}', [LocalizationController::class, 'index']);

