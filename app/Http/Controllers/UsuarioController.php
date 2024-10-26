<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class UsuarioController extends Controller
{
    //
    public function autenticar(Request $request)
    {
        //datos del formulario
        $correo = $request->input('correo');
        $contraseña = $request->input('contraseña');

        // Buscar el usuario en la tabla 'usuarios' con el correo proporcionado
        $usuario = DB::table('usuarios')
            ->where('correo', $correo)
            ->first();

        // Verificar si el usuario está autenticado (por ejemplo, si hay una variable de sesión 'usuario_id')
        if ($usuario && $usuario->pass === $contraseña) {

            //obtener el valor de la id de usuario
            Session::put('id', $usuario->id);

            //obtener el valor del id vendedor donde es igual al del ususario
            $tipo = DB::table('vendedors')
                ->where('idUsuario', Session::get('id'))
                ->first();

            //si es null lo busca en la tabla compradors
            if (is_null($tipo)) {

                $tipo = DB::table('compradors')
                    ->where('idUsuario', Session::get('id'))
                    ->first();

                Session::put('id', $tipo->id); //id del ususario actual

                return redirect()->route('welcomeComprador', ['usuario' => $usuario]);
            } else {

                Session::put('id', $tipo->id); //id del ususario actual

                return redirect()->route('productos', ['usuario' => $usuario]); //se puede pasasr asi el parametro sin {} en la ruta??

            }
        } else {
            Session::flash('error', 'Correo o contraseña incorrectos.');
            return view('login1');
        }
    }


    public function registrarUsuario(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'correo' => 'required|email|unique:usuarios,correo',
            'pass' => 'min:4', // Cambiado a 'pass'
            'confirmar_pass' => 'same:pass', // Cambiado a 'pass'
            'tipo_usuario' => 'required|string|in:comprador,vendedor',
        ]);

        // Guardar la imagen (descomentado y ajustado si es necesario)
        //$rutaFoto = $request->file('foto')->store('fotos', 'public');

        // Insertar en la tabla 'personas' y obtener el ID
        $idPersona = DB::table('personas')->insertGetId([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'edad' => $request->input('edad'),
            //'foto' => $rutaFoto,
        ]);

        // Insertar el correo y la contraseña (pass) en la tabla 'usuarios'
        $idUsuario = DB::table('usuarios')->insertGetId([
            'correo' => $request->input('correo'),
            'pass' => $request->input('pass'), // Cambiado a 'pass'
        ]);

        // Insertar en la tabla 'compradores' o 'vendedores' según el tipo
        if ($request->input('tipo_usuario') === 'comprador') { // Cambiado a 'tipo_usuario'
            DB::table('compradors')->insert([
                'aniosAntiguedad' => 0,
                'transaccionesRealizo' => 0,
                'idPersona' => $idPersona,
                'idUsuario' => $idUsuario,
            ]);
        } elseif ($request->input('tipo_usuario') === 'vendedor') {
            DB::table('vendedores')->insert([
                'aniosAntiguedad' => 0,
                'transaccionesRealizo' => 0,
                'idPersona' => $idPersona,
                'idUsuario' => $idUsuario,
            ]);
        }

        return view('login1');
    }
}
