<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UiProyect</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- Livewire Styles-->
    @livewireStyles
</head>

<body>

    <!--Menu-->
    <div class="containerprincipal">
        <nav class="menuprincipal row">
            <div class="logo col-4 align-items-stretch">
                <a href="" class="Logo align-items-center">Ui Proyect</a>
            </div>
            <div class="menu d-flex col-auto  align-items-stretch">
                <a href="#" class="d-flex align-items-center">
                    <div class="w-100">
                        <span> INICIO </span>
                    </div>
                </a>
                <a href="#" class="d-flex align-items-center">
                    <div class="w-100">
                        <span> SERVICIOS </span>
                    </div>
                </a>
                <a href="#" class="d-flex align-items-center">
                    <div class="w-100">
                        <span> PLANES </span>
                    </div>
                </a>
                <a href="#" class="d-flex align-items-center">
                    <div class="w-100">
                        <span> CONTACTO </span>
                    </div>
                </a>
                <!-- Si no esta logeado => Aparecen botones de login y register -->
                @guest
                <a href="/register" class="d-flex align-items-center">
                    <div class="w-100">
                        <span> REGISTRARSE </span>
                    </div>
                </a>
                <a href="/login" class="d-flex align-items-center">
                    <div class="w-100">
                        <span> INICIAR SESION </span>
                    </div>
                </a>
                @else
                <!-- Si esta logeado => Aparece botón de salir-->
                <a href="#" class="d-flex align-items-center">
                    <div class="w-100">

                        <span>


                            <form method="POST" action="/logout">
                                @csrf
                                <a href="#" onclick="this.closest('form').submit()">CERRAR SESIÓN</a>
                            </form>


                        </span>

                    </div>
                    <a href="#" class="d-flex align-items-center">
                        <div class="w-100">

                            <span>

                                <!-- Usuario registrado -->
                                Hola {{Auth::user()->name }}


                            </span>

                        </div>


                    </a>

                    <a href="#" class="d-flex align-items-center">
                        <div class="w-100">

                            <span>
                                <!-- Livewire Carrito incluir componente-->
                                @livewire('shop.cart-component')
                            </span>

                        </div>


                    </a>

                    @endguest
            </div>
        </nav>


        <!-- Contenido -->
        @yield('content')

    </div>

    <!-- Footer -->
    <footer>
        <nav class="enlaces-varios">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <a href="#" class="h2-footer"> Enlaces</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <a href="#">Aviso legal </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <a href="#">Cookies</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <a href="#">Política de privacidad</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <a href="#">Terminos y condiciones</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <a href="#" class="h2-footer"> Nosotros</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <a href="#">Servicios</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <a href="#">Contacto</a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <a href="#">Sobre nosotros</a>
                </div>
            </div>
            <p style="color: rgb(231, 231, 231);">Todos los derechos reservados 2022s @Copyright</p>
        </nav>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script src="js/app.js"></script>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>

</html>