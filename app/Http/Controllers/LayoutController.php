<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        
        return redirect('dashboard')->with('status', 'Plantillas');
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

        return redirect('dashboard')->with('status', 'Plantillas');
    }
}
