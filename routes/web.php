<?php

use App\Http\Controllers\MessageController;
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

Route::middleware(['verified'])->group(function () {

    // Manda la vista de creación de puntos
    Route::get('add', [
        SpotController::class, 'getView'
    ])->middleware(['auth'])->name('add');

    // Manda los datos del formulario de creación
    Route::post('add', [
        SpotController::class, 'createSpot'
    ])->middleware(['auth']);

    Route::get('contact', [MessageController::class, 'getView'])->middleware(['auth'])->name('contact');

    Route::post('contact', [MessageController::class, 'createMessage']);

});



Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    // Lista los spots
    Route::get('spots', [SpotController::class, 'spots'])->middleware(['auth'])->name('spots');

    // Enseña los detalles de un spot
    Route::get('spots/show/{id}', [SpotController::class, 'showSpot'])->name('spots.show');

    // Muestra la vista de modificación de un spot
    Route::get('spots/edit/{id}', [SpotController::class, 'getEditSpot'])->name('spots.edit');

    // Actualiza un spot
    Route::put('spots/edit/{id}', [SpotController::class, 'updateSpot'])->name('spots.update');

    // Elimina un spot
    Route::delete('spots/delete/{id}', [SpotController::class, 'deleteSpot'])->name('spots.destroy');

    Route::get('messages', [MessageController::class, 'messages'])->name('messages');
    Route::delete('messages/delete/{id}', [MessageController::class, 'deleteMessage'])->name('messages.destroy');

});

require __DIR__ . '/auth.php';
