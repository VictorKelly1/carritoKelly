<?php

namespace App\Http\Controllers;

use App\Models\Vino;
use App\Models\Vvino;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VinoController extends Controller
{
    //
    public function index() //mostrarVinos del vendedor
    {
        $usuario_id = Session::get('id');

        $vinos = DB::table('vinos')
            ->where('idVendedor', $usuario_id)
            ->get();
        //$vinos = DB::table('vvinos')->get();

        return view('productos', ['vinos' => $vinos]);
    }

    public function indexC() //mostrarVinos del vendedor
    {
        $vinos = DB::table('vvinos')->get();
        return view('welcomeC', ['vinos' => $vinos]);
    }

    public function store() //mostrarVinos del vendedor
    {
        $vinos = DB::table('vvinos')->get();
        return view('welcome', ['vinos' => $vinos]);
    }

    public function agregar(Request $request) //mostrarVinos del vendedor request(); //se usa para acceder a los datos del formulario html 
    {
        //

        $usuario_id = Session::get('id'); //esta variable se inicializo en el controlador de usuario autenticar

        $vino = new Vino(); //crear un objeto de clase vino para guradar datos del formulario
        $vino->nombre = $request->input('nombre');
        $vino->tipo = $request->input('tipo');
        $vino->anio = $request->input('anio');
        $vino->precio = $request->input('precio');
        $vino->cantidadDisp = $request->input('stock');
        $vino->idVendedor = $usuario_id;
        $vino->save();

        return to_route('welcome');
    }

    public function show(Vvino $vino) //typeHints
    {
        // se crea una carpeta vinos y una vista dinamica show dentro  y se le pasa un array de arrays como parametro
        return view('vinos.show', ['vino' => $vino]);
    }

    public function editShow(Vvino $vino) //typeHints
    {

        return view('vinos.edit', ['vino' => $vino]);
    }

    public function editarVino(Request $request)
    {
        //logica de edicion
        // Validar los datos del formulario
        $request->validate([
            'id' => 'required',
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'anio' => 'required|integer',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        // le paso el valor del id del producto que se va a editar desde la caja de texto hidden en la vista de edicion
        $id = $request->input('id');
        //busco el producto en la db y lo paso a la variable
        $producto = Vino::findOrFail($id);
        //se actualizan los campos por los del formulario
        $producto->nombre = $request->input('nombre');
        $producto->tipo = $request->input('tipo');
        $producto->anio = $request->input('anio');
        $producto->precio = $request->input('precio');
        $producto->cantidadDisp = $request->input('stock');
        //se guarda
        $producto->save();


        return to_route('welcome');
    }
}
