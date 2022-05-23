<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function updateAccount(Request $request) {
        
        Auth::user()->name;
        
        $inputNombre = request()->nombre;
        $inputCorreo = request()->correo;
        $inputDireccion = request()->direccion;
        $inputCif = request()->cif;
        $inputRazonSocial = request()->razonSocial;
    }
}
