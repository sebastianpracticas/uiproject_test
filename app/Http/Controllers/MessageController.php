<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function newMessage(Request $request) {
        $userId = Auth::user()->id;
        $userRol = Auth::user()->role;

        $mensaje = $request->mensaje;

        if ($userRol == "user") {
            $respuesta = 0;
        } else {
            $userName = $request->responseUserName;
            $userId = json_decode(json_encode(DB::table('users')->where('name',$userName)->get("id")->first()), true)["id"];
            $respuesta = 1;
        }

        $cuentaId = json_decode(json_encode(DB::table('cuentas')->where('id_usuarios',$userId)->get("id")->first()), true)["id"];

        DB::table('mensajes')->insert([
            'id_cuenta' => $cuentaId,
            'mensaje' => $mensaje,
            'leido' => 1,
            'archivado' => 0,
            'es_respuesta' => $respuesta,
            'fecha_hora' => Carbon::now('Europe/Madrid')
        ]);

        DB::table('mensajes')->where('id_cuenta', $cuentaId)->update([
            'leido' => 1,
        ]);
        
        return redirect('dashboard')->with('status', 'Mensajes');
    }
}
