<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [ContactController::class, 'index']);
Route::get('/confirm',[ContactController::class, 'showConfirm']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register',[AuthController::class, 'register']);
Route::get('login',[AuthController::class, 'showLogin']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/admin',[AuthController::class, 'admin']);
Route::get('/modal',[AuthController::class, 'modal']);
Route::get('/find', [AuthController::class, 'find']);
Route::post('/find', [AuthController::class, 'search']);

