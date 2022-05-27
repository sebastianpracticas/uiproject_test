<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function updateAccount(Request $request) {
        
        $userId = Auth::user()->id;
        $userRol = Auth::user()->role;
        
        $nombre = $request->nombre;
        $correo = $request->correo;

        if ($userRol == "user") {
            $direccion = $request->direccion;
            $cif = $request->cif;
            $razonSocial = $request->razonSocial;

            DB::table('cuentas')->where('id_usuarios',$userId)->update([
                'direccion' => $direccion,
                'cif' => $cif,
                'razon_social' => $razonSocial
            ]);
        }

        DB::table('users')->where('id',$userId)->update([
            'name' => $nombre,
            'email' => $correo
        ]);
        return redirect('dashboard');
    }
}
