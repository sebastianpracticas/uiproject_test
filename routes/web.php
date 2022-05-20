<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\UsersController;

#Ruta principal
Route::get('/', function () {
    return view('vistas/home');
});

 
#Rutas login
Route::get('/login', function () {
    return view('vistas/login');
})->name('login')->middleware('guest');

Route::post('/login', [UsersController::class, 'session']);

#Rutas register
Route::get('/register', function () {
    return view('vistas/register');
});

Route::post('/register', [UsersController::class, 'register']);

#Ruta dashboard
Route::get('/dashboard',function(){

    return view('vistas/dashboard');
})->middleware('auth');


#Ruta cerrar sesión
Route::post('/logout',[UsersController::class, 'logout']);
