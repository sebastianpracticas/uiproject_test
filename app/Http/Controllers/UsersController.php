<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    #Funcion de iniciar sesion
    #Comprueba que el usuario existe 
    public function session()
    {

        #Recupera los datos del sumbit y lo valida   
        $credencailes = request()->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        #Filled transforma el valor remember a boolean
        $remember = request()->filled('remember');

        #Si los datos del login son correctos 
        if (Auth::attempt($credencailes, $remember)) {

            #Evitar una vulnerabilidad Session Fixation 
            request()->session()->regenerate();
            return  redirect('/dashboard');
        }

        return  redirect('/login')->with('status', 'Credenciales erroneas');
    }

    #Cerrar sesion
    public function logout()
    {
        #Crremos la sesion 
        Auth::logout();
        #Invalidamos la sesion
        request()->session()->invalidate();
        #Regeneramos Token crf
        request()->session()->regenerateToken();
        #Redirigimos
        return redirect('login')->with('status', 'Has cerrado sesión');
    }


    public function register()
    {

        request()->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
            'email' => ['required', 'string'],
        ]);


        #Guardo los valores del request
        $n = request()->name;
        $e = request()->email;
        $p =   Hash::make(request()->password);


        if (Users::where('name', "$n")->value('name') == null) {


            Users::insert([
                'name' => "$n",
                'email' => "$e",
                'password' => "$p"
            ]);

            $userId = json_decode(json_encode(DB::table('users')->where('name', "$n")->get('id')->first()), true)["id"];
            
            DB::table('cuentas')->insert([
                'id_usuarios' => $userId,
                'direccion' => "",
                'cif' => "",
                'razon_social' => ""
            ]);

            return redirect('/login')->with('status', 'Usuario Creado');
        }

        return redirect('/register')->with('status', 'Usuario ya EXISTE');
    }
}
