<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function loadDashboard() {
        //Recuperar todos los datos de la base de datos (cuenta, pedidos y mensajes y enviarlos a la vista).
        $userId = Auth::user()->id;
        $data = array();

        $tableUsers = json_decode(json_encode(DB::table('users')->where('id',$userId)->select('name', 'email', 'role')->get()->first()), true);
        $userRol = $tableUsers["role"];
        
        $data["rol"] = $userRol;
        $data["nombre"] = $tableUsers["name"];
        $data["correo"] = $tableUsers["email"];
/*
        if ($userRol == "user") {    
            $tableCuentas = json_decode(json_encode(DB::table('cuentas')->where('id_usuarios',$userId)->select('id', 'direccion', 'cif', 'razon_social')->get()->first()), true);
            $cuentaId = $tableCuentas["id"];
            $data["direccion"] = $tableCuentas["direccion"];
            $data["cif"] = $tableCuentas["cif"];
            $data["razonSocial"] = $tableCuentas["razon_social"];

            $tableMensajes = json_decode(json_encode(DB::table('mensajes')->where('id_cuenta',$cuentaId)->select('mensaje', 'leido', 'archivado', 'es_respuesta', 'fecha_hora')->get()), true);
            dd($tableMensajes);
        }
*/

        //$tablePedidos = 



        //$tableCompra = 



        //$tablePlantillas = 

        
        $data["rol"] = "admin";
        return view("vistas.dashboard", ["data" => $data]);
    }

    public function updateAccount(Request $request) {
        //Recuperar la cuenta cuyo id coincida con el usuario. Luego actualizar de usuario y de cuenta todo.
        $userId = Auth::user()->id;
        $userRole = json_decode(json_encode(DB::table('users')->where('id',$userId)->get('rol')->first()), true);

        $inputNombre = request()->nombre;
        $inputCorreo = request()->correo;
        
        DB::table('users')->where('id',$userId)->update(['name'=>$inputNombre,'email'=>$inputCorreo]);
        
        if ($userRole == "user") {
            $inputDireccion = request()->direccion;
            $inputCif = request()->cif;
            $inputRazonSocial = request()->razonSocial;
            DB::table('cuentas')->where('id_usuarios',$userId)->update(['direccion'=>$inputDireccion,'cif'=>$inputCif,'razon_social'=>$inputRazonSocial]);
        }

        return loadDashboard();
    }

    public function createMessage(Request $request) {
        //Se usa esta función cuando llega un mensaje nuevo y hay que registrarlo en la base de datos.

    }
}
