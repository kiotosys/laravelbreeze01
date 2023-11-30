<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;


Route::get('/',                  [PagesController::class, 'fnIndex']) -> name('xInicio');
Route::get('/lista',             [PagesController::class, 'fnLista']) -> name('xLista');
Route::get('/detalle/{id}',      [PagesController::class, 'fnEstDetalle']) -> name('Estudiante.xDetalle');

Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria']) ->where('numero', '[0-9]+') -> name('xGaleria');




//Route::view('/galeria', 'pagGaleria', ['valor'=>15]) -> name('xGaleria'); 

/*
Route::get('/lista', function () {
    return view('pagLista');
}) -> name('xLista');
*/

/*
Route::get('/galeria/{num}', function ($num) {
    return "Este es un saludo desde Laravel ".$num;
}) -> where ('num', '[0-9]+');
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/*
Route::get('/', function () {
    return view('welcome');
}) -> name('xInicio');


Route::get('/saludo', function () {
    return "Este es un saludo desde Laravel";
});

*/