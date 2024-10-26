<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VinoController;
use Illuminate\Support\Facades\Route;



//usuarios

//validacion si no hay ususario 
Route::get('/', function () {
    return view('login1');
})->name('inicio');

//autenticar
Route::post('/', [UsuarioController::class, 'autenticar'])->name('usuario.autenticar');
//regresa vista registrarse
Route::view('registrar', 'registrar')->name('usuario.registrarVista');
//registra usuario funcion 
Route::post('registrar', [UsuarioController::class, 'registrarUsuario'])->name('usuario.registrar');


//vinos

//ruta inicial que muetra todos los productos
Route::get('welcome', [VinoController::class, 'store'])->name('welcome');
//ruta productos del vendedor
Route::get('productos', [VinoController::class, 'index'])->name('productos');
//manda la pagina inicial comprador
Route::get('welcomeC', [VinoController::class, 'indexC'])->name('welcomeComprador');
//ruta agregar productos
Route::post('productos', [VinoController::class, 'agregar'])->name('vino.agregar');
//ruta pedidos
Route::view('pedidos', 'pedidos')->name('pedidos');
//ruta que muestra cada producto individual
Route::get('/welcome/{vino}', [VinoController::class, 'show'])->name('mostrar');
// productos.editar
Route::post('productosEditar', [VinoController::class, 'editarVino'])->name('productos.editar');
//ruta que muestra vista de edicion de producto individual
Route::get('/productos/{vino}', [VinoController::class, 'editShow'])->name('editar');
//
Route::view('pagos', 'pago')->name('pagosVista');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//historial de transacciones -a
//pedidos -a                             la tabla tiene la columa estado aparte de las de la tabla transacciones
//carrito c
//fotos y evitar la navegacion por url
//botones de filtraciones de productos
