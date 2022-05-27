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

        if ($userRol == "user") {  
            //Usuario normal requiero direccion, cif, razon social, mensajes propios y pedidos (con compra y plantillas asociadas).
            $tableCuentas = json_decode(json_encode(DB::table('cuentas')->where('id_usuarios',$userId)->select('id', 'direccion', 'cif', 'razon_social')->get()->first()), true);
            $cuentaId = $tableCuentas["id"];
            $data["direccion"] = $tableCuentas["direccion"];
            $data["cif"] = $tableCuentas["cif"];
            $data["razonSocial"] = $tableCuentas["razon_social"];

            $tableMensajes = json_decode(json_encode(DB::table('mensajes')->where('id_cuenta',$cuentaId)->select('mensaje', 'leido', 'archivado', 'es_respuesta', 'fecha_hora')->get()), true);
            $data["mensajes"] = $tableMensajes;

            $pedidos = array();
            $tablePedidos = json_decode(json_encode(DB::table('pedidos')->where('id_cuenta',$cuentaId)->select('id', 'comentario')->get()), true);
            foreach($tablePedidos as $tablePedido) {
                $pedidoId = $tablePedido["id"];
                $tablePedido["comentario"];
                $tableCompra = json_decode(json_encode(DB::table('compras')->where('id_pedido',$pedidoId)->select('estado', 'cantidad_total')->get()->first()), true);
                if ($tableCompra!=null) {
                    $tablePedido["estado"] = $tableCompra["estado"];
                    $tablePedido["cantidad_total"] = $tableCompra["cantidad_total"];
                }
                $plantillasArray = array();
                $tableRelPlantillas = json_decode(json_encode(DB::table('rel_plantillas_pedidos')->where('id_pedido',$pedidoId)->get('id_plantilla')), true);
                foreach($tableRelPlantillas as $tableRelPlantilla) {
                    $plantillaId = $tableRelPlantilla["id_plantilla"];
                    $tablePlantilla = json_decode(json_encode(DB::table('plantillas')->where('id',$plantillaId)->select('precio', 'descripcion', 'url')->get()->first()), true);
                    array_push($plantillasArray, $tablePlantilla);
                }
                $tablePedido["plantillas"] = $plantillasArray;
                array_push($pedidos, $tablePedido);
            }
            $data["pedidos"] = $pedidos;
        } else {
            //admins requieren todos los mensajes de cualquier usuario que tenga algún mensaje no leido y array de todas las plantillas existentes.
            $arrayMensajesIds = json_decode(json_encode(DB::table('mensajes')->where('leido',0)->get('id_cuenta')), true);
            $arrayIds = array();
            foreach($arrayMensajesIds as $arrayId) {
                array_push($arrayIds, $arrayId["id_cuenta"]);
            }
            $arrayIds = array_unique($arrayIds);
            $arrayMensajes = array();
            foreach ($arrayIds as $mensajeId) {
                $consulta = json_decode(json_encode(DB::table('mensajes')->where('id_cuenta',$mensajeId)->select('id_cuenta', 'mensaje', 'leido', 'archivado', 'es_respuesta', 'fecha_hora')->get('')), true);
                $cuentaId = $consulta[0]["id_cuenta"];
                $id_usuario = json_decode(json_encode(DB::table('cuentas')->where('id',$cuentaId)->get("id_usuarios")->first()), true);
                $nombre = json_decode(json_encode(DB::table('users')->where('id',$id_usuario)->get("name")->first()), true);
                $arrayMensajes[$nombre["name"]] = $consulta;
            }
            $data["mensajes"] = $arrayMensajes;

            //AÑADIR ARRAY DE TODOS LOS PEDIDOS Y COMPRAS CON LA PLANTILLA ASOCIADA, NOMBRE Y CORREO.
            $arrayPedidos = array();
            $tablePedidos = json_decode(json_encode(DB::table('pedidos')->select('id', 'id_cuenta', 'comentario')->get()), true);
            foreach($tablePedidos as $tablePedido) {
                $pedidoId = $tablePedido["id"];
                $cuentaId = $tablePedido["id_cuenta"];
                $estadoCompra = json_decode(json_encode(DB::table('compras')->where('id_pedido',$pedidoId)->select('estado', 'cantidad_total')->get()->first()), true);
                if ($estadoCompra!=null) {
                    $tablePedido["estado_compra"] = $estadoCompra["estado"];
                    $tablePedido["cantidad_total_compra"] = $estadoCompra["cantidad_total"];
                }
                $arrayPlantillas = array();
                $tableRelPlantillas = json_decode(json_encode(DB::table('rel_plantillas_pedidos')->where('id_pedido',$pedidoId)->get('id_plantilla')), true);
                foreach($tableRelPlantillas as $tableRelPlantilla) {
                    $plantillaId = $tableRelPlantilla["id_plantilla"];
                    $tablePlantilla = json_decode(json_encode(DB::table('plantillas')->where('id', $plantillaId)->select('precio', 'descripcion', 'url')->get()->first()), true);
                    array_push($arrayPlantillas, $tablePlantilla);
                }
                $tablePedido["plantillas"] = $arrayPlantillas;
                $tableCuentasId = json_decode(json_encode(DB::table('cuentas')->where('id',$cuentaId)->get("id_usuarios")->first()), true);
                $usersId = $tableCuentasId["id_usuarios"];
                $tableUsuarios = json_decode(json_encode(DB::table('users')->where('id',$usersId)->select('name', 'email')->get()->first()), true);
                $tablePedido["nombre"] = $tableUsuarios["name"];
                $tablePedido["correo"] = $tableUsuarios["email"];
                array_push($arrayPedidos, $tablePedido);
            }
            $data["pedidos"] = $arrayPedidos;

            //AÑADIR ARRAY DE TODAS LAS PLANTILLAS EXISTENTES
            $data["plantillas"] = json_decode(json_encode(DB::table('plantillas')->select('id', 'precio', 'descripcion', 'url')->get()), true);
        }

        return view("vistas.dashboard", ["data" => $data]);
    }
}
