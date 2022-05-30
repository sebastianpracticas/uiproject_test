<!-- Heredo de la plantilla/welcome -->
@extends('plantilla/welcome')

<!-- Inicio de la seccion content -->
@section('content')

<!--Titulo-->
<div class="container pt-4 pb-4">

    <div class="row">

        <!-- Empieza ahora! -->
        <div class=" row pt-4 pb-4">

            <div class=" text-center">

                <h1>Empieza ahora!</h1>

                <p>Diseñamos tu web de manera orgánica para un mejor resultado de tus ventas.</p>

            </div>
        </div>
        <!--  -->

        <!--Nosotros-->
        <div class="row pt-4 pt-4 pb-4">

            <div class="text-center pt-4 pb-4">

                <img src="img/Nosotros.png" class="rounded img-fluid  " alt="Diseñamos tu web">

            </div>

            <div class="row justify-content-center">

                <div class="col-md-4 text-center">

                    <h1>¿Quiénes somos?</h1>

                    <p> Somos una agencia que nace con el proposito de ofrecer la mejor calidad. Nos caracterizamos
                        por un trabajo profesional y por nuestra creatividad en cada diseño.</p>
                </div>

            </div>

        </div>
        <!--  -->


        <!--Servicios-->
        <div class="row pt-4 pb-4 text-center">

            <h1 class="pt-4 pb-4">¿Qué ofrecemos?</h1>

            <div class=" col-md-4 pt-4 pb-4">

                <img src="img/Seo.png" alt="" class="imagen-servicios">

                <h2>Seo</h2>

                <p>Posicionamiento orgánico de tu web a través de Seo. Servirá para aumentar tus clientes.</p>


            </div>

            <div class=" col-md-4 pt-4 pb-4">

                <img src="img/Web.png" alt="" class="imagen-servicios">

                <h2>Diseño Web</h2>

                <p>Elaboramos un diseño personalizado según sus necesidades, responsive, usable y dinámico.</p>

            </div>

            <div class="  col-md-4 pt-4 pb-4">

                <img src="img/Redes Sociales.png" alt="" class="imagen-servicios">

                <h2>Redes sociales</h2>

                <p>Administramos tus redes para mejorar tu imagen de marca y aumentar posibles clientes.</p>

            </div>

        </div>

    </div>

    <!--portafolio-->
    <div class="row pt-4 pb-4 text-center">

        <h1 class=" pt-4 pb-4 ">¿Algunos ejemplos?</h1>


        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/demo-2.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/demo-3.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/demo-1.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>



    </div>



    <!--Razones para elegirnos-->

    <div class="row pt-4 pb-4 text-center ">

        <div class="">
            <h1 class="pt-4 pb-4">¿Por qué elegirnos?</h1>
        </div>
        <div class="col-md-4 ">
            <h1 class=" p1">Trato personalizado</h1>
            <p>Atendemos a tus consultas de manera rápida. Incluimos el mantenimiento dentro de nuestro
                servicio.</p>
        </div>
        <div class="col-md-4">
            <h1 class="  p1">Manejo de tecnologías</h1>
            <p>Hacemos uso de multitud de tecnologias para la creación de tu web, todo pasa por un proceso
                ordenado y el resultado es un servicio eficaz y profesional.</p>
        </div>
        <div class="col-md-4 ">
            <h1 class="  p1">Especialistas</h1>
            <p class="  ">Somos especialistas en diseño y creacion de app y sitios web. Contamos con un equipo
                multidisciplicar par el exito de tu proyecto.</p>
        </div>

    </div>
</div>
</div>
@endsection('content')