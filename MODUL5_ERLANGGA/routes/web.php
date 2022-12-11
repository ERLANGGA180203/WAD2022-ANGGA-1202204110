<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ShowroomsController;
use Illuminate\Support\Facades\Route;
use app\Models\showrooms;
use app\Models\user;

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
    return view('ERLANGGA_HOME');
});
Route::get('/login', function () {
    return view('ERLANGGA_LOGIN');
});
Route::get('/register', function () {
    return view('ERLANGGA_REGISTER');
});

// User
Route::resource('/user', UserController::class);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

// Showroom
Route::resource('/showroom', ShowroomsController::class);
