<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;


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

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register',[AuthController::class, 'register']);
Route::get('login',[AuthController::class, 'showLogin']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/index',[ContactController::class, 'index']);
Route::get('/modal',[ContactController::class, 'modal']);
Route::get('/find', [ContactController::class, 'find']);
Route::post('/find', [ContactController::class, 'search']);