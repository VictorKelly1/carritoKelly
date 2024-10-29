<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VinoController;
use App\Models\Vvino;
use Illuminate\Support\Facades\Session;
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
Route::get('/pedidos', [VinoController::class, 'pedidosV'])->name('pedidosV');
//ruta que muestra cada producto individual
Route::get('/welcome/{vino}', [VinoController::class, 'show'])->name('mostrar');
//ruta que muestra cada producto individual del comprador
Route::get('/welcomeC/{vino}', [VinoController::class, 'showC'])->name('mostrarC');
// productos.editar
Route::post('productosEditar', [VinoController::class, 'editarVino'])->name('productos.editar');
//ruta que muestra vista de edicion de producto individual
Route::get('/productos/{vino}', [VinoController::class, 'editShow'])->name('editar');
//vista de pagos o carrito
Route::view('pagos', 'pago')->name('pagosVista');
//ruta que muestra vista de pago de producto individual
Route::get('/pagos/{vino}', [VinoController::class, 'pago'])->name('pagoVino');
//ruta que confirma que la transaccion esta en proceso
Route::post('/confirmacion', [VinoController::class, 'transaccion'])->name('confirmacion');
//ruta que aprueba una transaccion
Route::post('/aprobado/{transaccion}', [VinoController::class, 'aprobarTransaccion'])->name('aprobar.transaccion');
//historial vendedor
Route::get('/historial', [VinoController::class, 'historial'])->name('historial');
//historial comprador
Route::get('/historialC', [VinoController::class, 'historialC'])->name('historialC');
//historial comprador
Route::get('/pedidosC', [VinoController::class, 'pedidosC'])->name('pedidosC');















//metodo que agrega productos al carrrito
Route::get('/carrito/{vino}', function (Vvino $vino) {
    //
    $detalleVino = [
        'id' => $vino,
        'nombre' => 'Vino ' . $vino->nombre,
    ];

    $carrito[] = $detalleVino;

    Session::put(['carrito' => $detalleVino]);

    dd(Session::get('carrito'));
    //  
})->name('agregarCarrito');










Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


//carrito
//fotos, css y evitar la navegacion por url
//botones de filtraciones de productos
