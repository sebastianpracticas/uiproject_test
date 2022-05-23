<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function updateAccount(Request $request) {
        $inputNombre = request()->nombre;
        $inputCorreo = request()->correo;
        $inputDireccion = request()->direccion;
        $inputCif = request()->cif;
        $inputRazonSocial = request()->razonSocial;
    }
}
