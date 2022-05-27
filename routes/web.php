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
use App\Http\Livewire\Shop\IndexComponent;
use App\Http\Livewire\Shop\Cart\IndexComponent as CartComponent;
use App\Http\Livewire\Shop\CheckoutComponent;

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
})->middleware('guest');

Route::post('/register', [UsersController::class, 'register']);

#Ruta dashboard
Route::get('/dashboard', function () {

    return view('vistas/dashboard');
})->middleware('auth');

#Ruta cerrar sesión
Route::post('/logout', [UsersController::class, 'logout']);

#Rutas Livewire

#Ruta Plantillas
Route::get('/plantillas', IndexComponent::class)->middleware('auth');

#Ruta Carrito
Route::get('/cart',CartComponent::class)->middleware('auth');

#Ruta Checkout
Route::get('/checkout',CheckoutComponent::class)->middleware('auth');

#Demos
Route::get('/demo', function () {
    return view('demos/index');
});

Route::get('/demo2', function () {
    return view('demos/index2');
});

Route::get('/demo3', function () {
    return view('demos/index3');
});

Route::get('/demo4', function () {
    return view('demos/index4');
});

Route::get('/demo5', function () {
    return view('demos/index5');
});
######################################################################

Route::post("/actualizarCuenta", [DatabaseController::class, 'updateAccount']);