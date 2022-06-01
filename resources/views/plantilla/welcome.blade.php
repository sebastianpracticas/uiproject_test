<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Uiproject</title>

    <!--Animate  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- Livewire Styles-->
    @livewireStyles

</head>

<body>

    <nav class="navbar navbar-light bg-light menuPrincipal">
        <h1 class="navbar-brand pt-4" id="tituloPagina">Ui Proyect</h1>
    </nav>

    <div class="sticky-top">
        <ul class="nav justify-content-center  menuPrincipal pb-4 " id="listadoPaginas">



            <li class="nav-item">
                <a class="nav-link active" href="/">INICIO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#ofrecemos">SERVICIOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/plantillas">PLANTILLAS</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">CONTACTO</a>
            </li> -->

            @guest
            <li class="nav-item">
                <a class="nav-link" href="/register">REGISTRARSE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">INICIAR SESION</a>
            </li>
            @else

            <li class="nav-item">
                <a class="nav-link" href="dashboard"> HOLA {{Auth::user()->name }}</a>
            </li>

            <li class="nav-item">
                <form method="POST" action="/logout" id="formCerrar">
                    @csrf
                    <a id="cerrar" href="#" onclick="this.closest('form').submit()">CERRAR SESIÓN</a>
                </form>
            </li>

            <!-- Ocultar Carrito -->
            @if(Route::currentRouteName()!='cart')
            <li class="nav-item">
                @livewire('shop.cart-component')
            </li>

            @endif
            @endguest

        </ul>

    </div>


    <!-- Dinamic Content -->
    @yield('content')

    <!-- Foor content -->
    <div class="fixed-bottom" id="footer">
        <p style="color: rgb(231, 231, 231);" class="text-center p-1">Todos los derechos reservados 2022 @Copyright
        </p>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts

    <div class="p-4"></div>
</body>

<script src="js/app.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</html>