<!-- Heredo de la plantilla/welcome -->
@extends('plantilla/welcome')

<!-- Inicio de la seccion content -->
@section('content')
    <div class="row">
        <div class="dashboard-menu col-xs-12 col-sm-12 col-md-4 col-lg-3 p-4">
            <div class="row">
                <div class="dashboard-menu-button col-xs-12 col-sm-12 col-md-12 col-lg-12" onClick="clickCuenta()">
                    <span>Mi Cuenta</span>
                </div>
                <div class="dashboard-menu-button col-xs-12 col-sm-12 col-md-12 col-lg-12" onClick="clickCompras()">
                    <span>{{$data["rol"]=="user"?"Mis Compras":"Compras"}}</span>
                </div>
                <div class="dashboard-menu-button col-xs-12 col-sm-12 col-md-12 col-lg-12" onClick="clickMensajes()">
                    <span>{{$data["rol"]=="user"?"Mis Mensajes":"Mensajes"}}</span>
                    @if($data["rol"] == "admin")
                    <span style="color: red;">({{ count($data["mensajes"]) }})</span>
                    @endif
                </div>
                @if($data["rol"] == "admin")
                <div class="dashboard-menu-button col-xs-12 col-sm-12 col-md-12 col-lg-12" onClick="clickPlantillas()">
                    <span>Plantillas</span>
                </div>
                @endif
            </div>
        </div>
        <div id="miCuenta" style="{{ (session('status') == null || session('status') == "Cuenta")?"display: block;":"display: none;" }}" class="dashboard-content col-xs-12 col-sm-12 col-md-8 col-lg-9 p-4">
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
                    @if(isset($pedido["cantidad_total_compra"]))
                    <p>Cantidad pagada: <span class="texto-precio">{{ $pedido["cantidad_total_compra"] }}€</span></p>
                    @endif
                    @if(isset($pedido["estado_compra"]) && $data["rol"]=="user")
                    <p>Estado: <span class="texto-estado">{{ $pedido["estado_compra"] }}</span></p>
                    @endif
                    @if($data["rol"]=="admin")
                    <form method="post" action="actualizarCompra">
                        @csrf
                        <input type="hidden" name="orderId" value="{{ $pedido["id"] }}">
                        <select class="form-control" name="state" onchange="this.form.submit()">
                            <option value="PENDIENTE"{{ (isset($pedido["estado_compra"])&&$pedido["estado_compra"]=="PENDIENTE")?" selected='selected'":"" }}>PENDIENTE</option>
                            <option value="CONFIRMADO"{{ (isset($pedido["estado_compra"])&&$pedido["estado_compra"]=="CONFIRMADO")?" selected='selected'":"" }}>CONFIRMADO</option>
                            <option value="COMPLETADO"{{ (isset($pedido["estado_compra"])&&$pedido["estado_compra"]=="COMPLETADO")?" selected='selected'":"" }}>COMPLETADO</option>
                            <option value="CANCELADO"{{ (isset($pedido["estado_compra"])&&$pedido["estado_compra"]=="CANCELADO")?" selected='selected'":"" }}>CANCELADO</option>
                        </select>
                        <br>
                    </form>
                    @endif
                </div>
                <?php $counter++; ?>
                @endforeach
            </div>
            <!-- Solo lo ve el usuario normal -->
        </div>
        <!-- CREAR OTRA QUE SOLO VERÁ EL ADMIN CON PLANTILLAS -->
        <div id="misMensajes" style="{{ (session('status') != null && session('status') == "Mensajes")?"display: block;":"display: none;" }}" class="dashboard-content col-xs-12 col-sm-12 col-md-8 col-lg-9">
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="lista-mensajes">
                    @empty($data["mensajes"])
                        <span class="error">No hay mensajes pendientes</span>
                    @endempty
                    @foreach($data["mensajes"] as $usuario => $listaMensajes)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" onclick="mostrarChat('chat-{{ $usuario }}')">
                        <center><span class="form-control">{{ $usuario }}</span></center>
                    </div>
                    @endforeach
                </div>
                @foreach($data["mensajes"] as $usuario => $listaMensajes)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 body-chat" id="chat-{{ $usuario }}" style="display:none;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-control boton-volver-mensaje" onclick="atrasChat('chat-{{ $usuario }}')"><span>Volver</span></div>
                        </div>
                        @foreach($listaMensajes as $mensaje)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="mensaje-{{ ($mensaje["es_respuesta"])?"blanco":"verde" }}"><span>{{ $mensaje["mensaje"] }}</span></div>
                        </div>
                        @endforeach
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-mensaje">
                            <form method="post" action="nuevoMensaje">
                                @csrf
                                <div class="row casilla-nuevo-mensaje">
                                    <div class="col-xs-8 col-sm-9 col-md-10 col-lg-11">
                                        <input type="hidden" name="responseUserName" value="{{ $usuario }}">
                                        <input class="form-control" placeholder="Mensaje" name="mensaje">
                                    </div>
                                    <div class="col-xs-4 col-sm-3 col-md-2 col-lg-1">
                                        <button class="btn btn-success" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        @if($data["rol"] == "admin")
        <div id="misPlantillas" style="{{ (session('status') != null && session('status') == "Plantillas")?"display: block;":"display: none;" }}" class="dashboard-content col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <div class="row">
                <?php $counter=0 ?>
                @foreach($data["plantillas"] as $plantilla)
                <div id="plantilla-{{ $plantilla["id"] }}" class="col-xs-12 col-sm-12 col-md-6 col-lg-4 pedido-<?php echo ($counter%2) ?>">
                    <button class="btn btn-info boton-editar-plantilla" onclick="mostrarPlantilla({{ $plantilla['id'] }})">Editar</button>
                    <h3>{{ $plantilla["nombre"] }}</h3>
                    <p>Nombre: {{ $plantilla["descripcion"] }}</p>
                    <p>Precio: {{ $plantilla["precio"] }}€</p>
                    <p>Url: {{ $plantilla["url"] }}</p>
                    <p>Imagen: {{ $plantilla["imagen"] }}</p>
                </div>
                <div id="editar-plantilla-{{ $plantilla["id"] }}" class="col-xs-12 col-sm-12 col-md-6 col-lg-4 pedido-<?php echo ($counter%2) ?>" style="display: none;">
                    <form method="post" action="actualizarPlantilla">
                        @csrf
                        <button class="btn btn-info boton-editar-plantilla" type="submit">Guardar</button>
                        <input type="hidden" name="id" value="{{ $plantilla["id"] }}">
                        <div>
                            <label for="inputNombre">Nombre:</label>
                            <input id="inputNombre" name="nombre" value="{{ $plantilla["nombre"] }}">
                        </div>
                        <div>
                            <label for="inputDescripcion">Descripcion:</label>
                            <input id="inputDescripcion" name="descripcion" value="{{ $plantilla["descripcion"] }}">
                        </div>
                        <div>
                            <label for="inputPrecio">Precio:</label>
                            <input id="inputPrecio" name="precio" value="{{ $plantilla["precio"] }}">
                        </div>
                        <div>
                            <label for="inputUrl">Url:</label>
                            <input id="inputUrl" name="url" value="{{ $plantilla["url"] }}">
                        </div>
                        <div>
                            <label for="inputImagen">Imagen:</label>
                            <input id="inputImagen" name="imagen" value="{{ $plantilla["imagen"] }}">
                        </div>
                    </form>
                </div>
                <?php $counter++ ?>
                @endforeach
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color: white;">
                    <h4>Nueva Plantilla</h4>
                    <form method="post" action="nuevaPlantilla">
                        @csrf
                        <label for="inputNombreNew">Nombre:</label>
                        <input class="form-control" id="inputNombreNew" name="nombre">
                        <label for="inputPrecioNew">Precio:</label>
                        <input class="form-control" id="inputPrecioNew" name="precio">
                        <label for="inputDescripcionNew">Descripcion:</label>
                        <input class="form-control" id="inputDescripcionNew" name="descripcion">
                        <label for="inputUrlNew">Url:</label>
                        <input class="form-control" id="inputUrlNew" name="url">
                        <label for="inputImagenNew">Imágen:</label>
                        <input class="form-control" id="inputImagenNew" name="imagen">
                        <br>
                        <button class="btn btn-primary" type="submit">Añadir plantilla nueva</button>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection('content')
