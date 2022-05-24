<!-- Heredo de la plantilla/welcome -->
@extends('plantilla/welcome_home')

<!-- Inicio de la seccion content -->
@section('content')
    <div class="row">
        <div class="dashboard-menu col-xs-12 col-sm-12 col-md-4 col-lg-3">
            <div class="row">
                <div class="dashboard-menu-button col-xs-12 col-sm-12 col-md-12 col-lg-12" onClick="clickCuenta()">
                    <span>Mi Cuenta</span>
                </div>
                <div class="dashboard-menu-button col-xs-12 col-sm-12 col-md-12 col-lg-12" onClick="clickCompras()">
                    <span>Mis Compras</span>
                </div>
                <div class="dashboard-menu-button col-xs-12 col-sm-12 col-md-12 col-lg-12" onClick="clickMensajes()">
                    <span>Mis Mensajes</span>
                </div>
            </div>
        </div>
        <div id="miCuenta" style="display: block;" class="dashboard-content col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <form method="post" action="localhost:8000/actualizarCuenta">
                <label for="inputNombre">Nombre</label>
                <input id="inputNombre" name="nombre" type="text" value="{{ $data["nombre"] }}">
                <label for="inputCorreo">Correo</label>
                <input id="inputCorreo" name="correo" type="text" value="{{ $data["correo"] }}">
                
                @if($data["rol"] == "user")
                <label for="inputDireccion">Dirección</label>
                <input id="inputDireccion" name="direccion" type="text" value="{{ $data["direccion"] }}">
                <label for="inputCif">CIF</label>
                <input if="inputCif" name="cif" type="text" value="{{ $data["cif"] }}">
                <label for="inputRazonSocial">Razón social</label>
                <input id="inputRazonSocial" name="razonSocial" type="text" value="{{ $data["razonSocial"] }}">
                @endif

                <button type="submit">Enviar</button>
            </form>
        </div>
        <div id="misCompras" style="display: none;" class="dashboard-content col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <span>Mis compras</span>
            <!-- Solo lo ve el usuario normal -->
        </div>
        <!-- CREAR OTRA QUE SOLO VERÁ EL ADMIN CON PLANTILLAS -->
        <div id="misMensajes" style="display: none;" class="dashboard-content col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <span>Mis mensajes</span>
            <!-- El admin debe tener un menú para elegir chat -->
        </div>
    </div>
@endsection('content')