<!-- Heredo de la plantilla/welcome -->
@extends('plantilla/welcome_home')

<!-- Inicio de la seccion content -->
@section('content')

<div class="dashboard-principal row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 dashboard_menu">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-button">
                Mi Cuenta
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-button">
                Mensajes
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard-button">
                Pedidos
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 dashboard_content">
        <p>TEST</p>
    </div>
</div>

@endsection('content')