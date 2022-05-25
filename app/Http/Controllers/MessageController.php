<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function newMessage(Request $request) {
        $userId = Auth::user()->id;
        $userRol = Auth::user()->role;
        $cuentaId = json_decode(json_encode(DB::table('cuentas')->where('id_usuarios',$userId)->get("id")->first()), true)["id"];

        $mensaje = $request->mensaje;

        if ($userRol == "user") {
            $respuesta = 0;
        } else {
            $userId = $request->userId;
            $respuesta = 1;
        }

        DB::table('mensajes')->insert([
            'id_cuenta' => $userId,
            'mensaje' => $mensaje,
            'leido' => 0,
            'archivado' => 0,
            'es_respuesta' => $respuesta,
            'fecha_hora' => strtotime(time()+7200)
        ]);
    }
}
