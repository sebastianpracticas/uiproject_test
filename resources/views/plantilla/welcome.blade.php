<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Uiproject</title>


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
                <a class="nav-link" href="#">SERVICIOS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/plantillas">PLANTILLAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONTACTO</a>
            </li>

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
                <a class="nav-link" href="#">CERRAR SESIÓN</a>
            </li>

            <li class="nav-item">
                @livewire('shop.cart-component')
            </li>
            @endguest

        </ul>

    </div>













    <!--  -->






    <!-- Dinamic Content -->
    @yield('content')

    <!-- Foor content -->
    <div class="fixed-bottom" id="footer">
        <p style="color: rgb(231, 231, 231);" class="text-center p-1">Todos los derechos reservados 2022 @Copyright
        </p>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>

<script src="js/app.js"></script>

</html>