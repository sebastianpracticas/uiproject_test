<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function newLayout(Request $request) {
        $precio = $request->precio;
        $descripcion = $request->descripcion;
        $url = $request->url;

        DB::table('plantillas')->insert([
            'precio' => $precio,
            'descripcion' => $descripcion,
            'url' => $url
        ]);
        return true;
    }

    public function updateLayout(Request $request) {
        $id = $request->id;
        $precio = $request->precio;
        $descripcion = $request->descripcion;
        $url = $request->url;

        DB::table('plantillas')->where('id', $id)->update([
            'precio' => $precio,
            'descripcion' => $descripcion,
            'url' => $url
        ]);
        return true;
    }
}
