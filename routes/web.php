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
use App\Http\Controllers\PedidosController;

#######################

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PurchaseController;




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
Route::get('/dashboard', [DashboardController::class, 'loadDashboard'])->middleware('auth');

#Ruta cerrar sesión
Route::post('/logout', [UsersController::class, 'logout']);

#Rutas Livewire

#Ruta Plantillas
Route::get('/plantillas', IndexComponent::class)->middleware('auth');

#Ruta Carrito
Route::get('/cart',CartComponent::class)->middleware('auth')->name('cart');

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

Route::get('/plantilla', function () {
    return view('plantilla/welcome');
});

Route::post('/pagar',[PedidosController::class,'index']);



######################################################################

Route::post("/actualizarCuenta", [AccountController::class, 'updateAccount']);

Route::post("/nuevoMensaje", [MessageController::class, 'newMessage']);

Route::post("/nuevaPlantilla", [LayoutController::class, 'newLayout']);

Route::post("/actualizarPlantilla", [LayoutController::class, 'updateLayout']);

Route::post("/eliminarPlantilla", [LayoutController::class, 'deleteLayout']);

Route::post("/actualizarCompra", [PurchaseController::class, 'updatePurchase']);