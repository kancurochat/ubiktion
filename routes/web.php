<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotController;

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
    return view('map');
})->name('home');

Route::get('about', function () {
    return view('about');
})->name('about');

// Manda la vista de creación de puntos
Route::get('add', [SpotController::class, 'getView'
])->middleware(['auth'])->name('add');

// Manda los datos del formulario de creación
Route::post('add', [SpotController::class, 'createSpot'
])->middleware(['auth'])->name('add');

Route::get('contact', function () {
    return view('contact');
})->middleware(['auth'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
