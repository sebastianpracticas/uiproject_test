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
        <div id="miCuenta" style="{{ (session('status') == null || session('status') == "Cuenta")?"display: block;":"display: none;" }}" class="dashboard-content col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <form class="m-top-1" method="post" action="actualizarCuenta">
                @csrf
                <div class="form-group">
                    <label for="inputNombre">Nombre</label>
                    <input id="inputNombre" class="form-control" name="nombre" type="text" value="{{ $data["nombre"] }}">
                </div>
                <div class="form-group">
                    <label for="inputCorreo">Correo</label>
                    <input id="inputCorreo" class="form-control" name="correo" type="text" value="{{ $data["correo"] }}">
                </div>

                @if($data["rol"] == "user")
                <div class="form-group">
                    <label for="inputDireccion">Dirección</label>
                    <input id="inputDireccion" class="form-control" name="direccion" type="text" value="{{ $data["direccion"] }}">
                </div>
                <div class="form-group">
                    <label for="inputCif">CIF</label>
                    <input if="inputCif" class="form-control" name="cif" type="text" value="{{ $data["cif"] }}">
                </div>
                <div class="form-group">
                    <label for="inputRazonSocial">Razón social</label>
                    <input id="inputRazonSocial" class="form-control" name="razonSocial" type="text" value="{{ $data["razonSocial"] }}">
                </div>
                @endif

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        <div id="misCompras" style="{{ (session('status') != null && session('status') == "Compras")?"display: block;":"display: none;" }}" class="dashboard-content col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <div class="row">
                <?php $counter=0; ?>
                @foreach($data["pedidos"] as $pedido)
                <div class="pedido col-xs-12 col-sm-12 col-md-6 col-lg-4 pedido-<?php echo ($counter%2) ?>">
                    <h3>{{ $pedido["comentario"] }}</h3>
                    <span>Plantillas pedidas:</span>
                    <ul>
                        @foreach($pedido["plantillas"] as $plantilla)
                        <li>{{ $plantilla["descripcion"] }}</li>
                        @endforeach
                    </ul>
                    @if(isset($pedido["cantidad_total"]))
                    <p>Cantidad pagada: <span class="texto-precio">{{ $pedido["cantidad_total"] }}€</span></p>
                    @endif
                    @if(isset($pedido["estado"]))
                    <p>Estado: <span class="texto-estado">{{ $pedido["estado"] }}</span></p>
                    @endif
                </div>
                <?php $counter++; ?>
                @endforeach
            </div>
            <!-- Solo lo ve el usuario normal -->
        </div>
        <!-- CREAR OTRA QUE SOLO VERÁ EL ADMIN CON PLANTILLAS -->
        <div id="misMensajes" style="{{ (session('status') != null && session('status') == "Mensajes")?"display: block;":"display: none;" }} background-color: #CACACA;" class="dashboard-content col-xs-12 col-sm-12 col-md-8 col-lg-9">
            @if($data["rol"]=="user")
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-chat">
                    <center><h3>Contacto con soporte</h3></center>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 body-chat">
                    <div class="row">
                        @foreach($data["mensajes"] as $mensaje)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="mensaje-{{ ($mensaje["es_respuesta"])?"blanco":"verde" }}"><span>{{ $mensaje["mensaje"] }}</span></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-mensaje">
                    <form method="post" action="nuevoMensaje">
                        @csrf
                        <div class="row casilla-nuevo-mensaje">
                            <div class="col-xs-8 col-sm-9 col-md-10 col-lg-11">
                                <input class="form-control" placeholder="Mensaje" name="mensaje">
                            </div>
                            <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
                                <button class="btn btn-success" type="submit">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo-chat">
                    <center><h3>Centro de mensajes pendientes</h3></center>
                </div>
                @foreach($data["mensajes"] as $usuario => $listaMensajes)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" onclick="mostrarChat('chat-{{ $usuario }}')">
                    <center><span>{{ $usuario }}</span></center>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 body-chat" id="chat-{{ $usuario }}" style="display:none;">
                    <div class="row">
                        @foreach($listaMensajes as $mensaje)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="mensaje-{{ ($mensaje["es_respuesta"])?"blanco":"verde" }}"><span>{{ $mensaje["mensaje"] }}</span></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            
            <!-- El admin debe tener un menú para elegir chat -->
        </div>
    </div>
@endsection('content')