<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlasementController;
use App\Http\Controllers\SkorController;

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

//klasement
Route::get('/klasement', [KlasementController::class, 'index']);
Route::get('/klasement/get_create', [KlasementController::class, 'create']);
Route::post('/klasement/create', [KlasementController::class, 'store']);
Route::get('/klasement/edit/{id}', [KlasementController::class, 'edit']);
Route::put('/klasement/update/{id}', [KlasementController::class, 'update']);
Route::delete('/klasement/{id}', [KlasementController::class, 'destroy']);


//skors
Route::get('/skor', [SkorController::class, 'index']);
Route::get('/skor/get_create', [SkorController::class, 'create']);
Route::post('/skor/create', [SkorController::class, 'store']);
Route::get('/skor/edit/{id}', [SkorController::class, 'edit']);
Route::put('/skor/update/{id}', [SkorController::class, 'update']);
Route::delete('/skor/{id}', [SkorController::class, 'destroy']);