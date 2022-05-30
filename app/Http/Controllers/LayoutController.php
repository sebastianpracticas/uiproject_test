<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    public function newLayout(Request $request) {
        $nombre = $request->nombre;
        $precio = $request->precio;
        $descripcion = $request->descripcion;
        $url = $request->url;
        $imagen = $request->imagen;

        DB::table('plantillas')->insert([
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'url' => $url,
            'imagen' => $imagen
        ]);
        
        return redirect('dashboard')->with('status', 'Plantillas');
    }

    public function updateLayout(Request $request) {
        $id = $request->id;
        $nombre = $request->nombre;
        $precio = $request->precio;
        $descripcion = $request->descripcion;
        $url = $request->url;
        $imagen = $request->imagen;

        DB::table('plantillas')->where('id', $id)->update([
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'url' => $url,
            'imagen' => $imagen
        ]);

        return redirect('dashboard')->with('status', 'Plantillas');
    }

    public function deleteLayout(Request $request) {
        $id = $request->id;

        DB::table('plantillas')->where('id', $id)->delete();
    }
}
