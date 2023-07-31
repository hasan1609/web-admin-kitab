<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BabController;
use App\Http\Controllers\KitabController;

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

//BABA
Route::post('/bab',[BabController::class,'store']);
Route::get('/bab',[BabController::class,'index']);
Route::get('/',[BabController::class,'index']);

// KITAB
Route::get('/kitab/{id}',[KitabController::class,'index']);
Route::get('/kitab/create/{id}',[KitabController::class,'create']);
Route::post('/kitab',[KitabController::class,'store']);
Route::get('/kitab/edit/{id_kitab}',[KitabController::class,'edit']);
Route::post('/kitab/{id}',[KitabController::class,'update']);
Route::post('delete/kitab', [KitabController::class,'destroy']);