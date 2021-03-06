<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Resources\Spot;

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

Route::get('spots', [SpotController::class, 'spots'])->middleware(['auth'])->name('spots');

Route::get('spots/show/{id}', [SpotController::class, 'showSpot'])->name('spots.show');

Route::get('spots/edit/{id}', [SpotController::class, 'getEditSpot'])->name('spots.edit');

Route::put('spots/edit/{id}', [SpotController::class, 'updateSpot'])->name('spots.update');

Route::delete('spots/delete/{id}', [SpotController::class, 'deleteSpot'])->name('spots.destroy');

/* Route::get('roles', function () {
    return view('admin.roles.index');
})->middleware(['auth'])->name('roles'); */

Route::get('messages', function () {
    return view('admin.messages.index');
})->middleware(['auth'])->name('messages');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
