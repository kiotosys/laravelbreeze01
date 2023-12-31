<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

//PORTADA
Route::get('/',  [PagesController::class, 'fnIndex']) -> name('xInicio');

//CREATE
Route::post('/', [PagesController::class, 'fnRegistrar']) -> name('Estudiante.xRegistrar');
Route::post('/', [PagesController::class, 'fnRegistrarSeg']) -> name('Estudiante.xRegistrarSeguimiento');

//READ
Route::get('/lista',        [PagesController::class, 'fnLista']) -> name('xLista');
Route::get('/detalle/{id}', [PagesController::class, 'fnEstDetalle']) -> name('Estudiante.xDetalle');

Route::get('/seguimiento',     [PagesController::class, 'fnSeguimiento']) -> name('xListaSeguimiento');
Route::get('/detalleseg/{id}', [PagesController::class, 'fnEstDetalleSeg']) -> name('Estudiante.xDetalleSeg');


//UPDATE
Route::get('/actualizar/{id}', [PagesController::class, 'fnEstActualizar']) -> name('Estudiante.xActualizar');
Route::put('/actualizar/{id}', [PagesController::class, 'fnUpdate']) -> name('Estudiante.xUpdate');

Route::get('/actualizarseg/{id}', [PagesController::class, 'fnEstActualizarSeg']) -> name('Estudiante.xActualizarSeg');
Route::put('/actualizarseg/{id}', [PagesController::class, 'fnUpdateSeg']) -> name('Estudiante.xUpdateSeg');


//DELETE
Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar']) -> name('Estudiante.xEliminar');

Route::delete('/eliminarseg/{id}', [PagesController::class, 'fnEliminarSeg']) -> name('Estudiante.xEliminarSeg');


//Ejemplo de validar en RUTA
Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria']) ->where('numero', '[0-9]+') -> name('xGaleria');




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
*/

/*
Route::get('/saludo', function () {
    return "Este es un saludo desde Laravel";
});
*/

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