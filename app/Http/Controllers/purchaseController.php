<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class purchaseController extends Controller
{
    public function updatePurchase(Request $request) {
        $pedidoId = $request->orderId;
        $estado = $request->state;

        DB::table('compras')->where('id_pedido', $pedidoId)->update([
            'estado' => $estado,
        ]);

        return redirect('dashboard')->with('status', 'Compras');
    }
}
