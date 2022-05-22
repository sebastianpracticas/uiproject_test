<!-- Heredo de la plantilla/welcome -->
@extends('plantilla/welcome_home')

<!-- Inicio de la seccion content -->
@section('content')
<!--
<div class="arrow-right"> </div>
-->
<!--Titulo-->
<div class="row align-center anim-aparecer">
    <div class="col-xs-12">
        <h1 class="hideme">Empieza ahora!</h1>
        <p class="hideme">Diseñamos tu web de manera orgánica para un mejor resultado de tus ventas.</p>
    </div>
</div>

<!--Nosotros-->
<div class="container anim-aparecer">
    <div class="Nosotros row">
        <div class="imagen-nosotros hideme col-xs-12 col-sm-6 col-md-6 col-lg-6 align-self-center">
            <img  class="d-block" src="img/Nosotros.png" alt="imagen de nuestro equipo hablando">
        </div> 
        <div class="Nosotros-texto hideme col-xs-12 col-sm-6 col-md-6 col-lg-6 align-self-center">
            <div>
                <h1 class="h1">¿Quiénes somos?</h1>
            </div>
            <div>
                <p>Somos una agencia que nace con el proposito de ofrecer la mejor calidad. Nos caracterizamos por un trabajo profesional y por nuestra creatividad en cada diseño.</p>
            </div>
        </div>
    </div>
</div>
<!--Servicios-->

<div class="container anim-aparecer">
    <div class="row">
        <div class="servicios col"></div>
        <h1 class="h1 col-12 align-center hideme">¿Qué ofrecemos?</h1>
        <div class="Seo col-12 col-md-4 hideme">
            <div>
                <img src="img/Seo.png" alt="" class="imagen-servicios">
                <h2>Seo</h2> 
                <p>Posicionamiento orgánico de tu web a través de Seo. Servirá para aumentar tus clientes.</p>
            </div>
        </div>
        <div class="diseño web col-12 col-md-4 hideme">
            <div>
                <img src="img/Web.png" alt="" class="imagen-servicios">
                <h2>Diseño Web</h2> 
                <p>Elaboramos un diseño personalizado según sus necesidades, responsive, usable y dinámico.</p>
            </div>
        </div>
        <div class="Redes sociales col-12 col-md-4 hideme">
            <div>
                <img src="img/Redes Sociales.png" alt="" class="imagen-servicios">
                <h2>Redes sociales</h2> 
                <p>Administramos tus redes para mejorar tu imagen de marca y aumentar posibles clientes.</p>
            </div>
        </div>
    </div>
</div>

<!--portafolio-->
<div class="container anim-aparecer">
    <h1 class="h1 col-12 align-center hideme">¿Algunos ejemplos?</h1>
    <div class="slider">
        <div><img src="img/Portafolio.png" title="Title of image1"></div>
        <div><img src="img/Portafolio1.png" title="Title of image2"></div>
        <div><img src="img/Portalfolio3.png" title="Title of image3"></div>
    </div>
</div>

<!--Razones para elegirnos-->

<div class="container">
    <div class="row mar-bottom-70-px" style="margin-bottom: 70px">
        <div class="col-12 hideme">
            <h1 class="h1 align-center">¿Por qué elegirnos?</h1> 
        </div>
        <div class="col-12 col-md-4 align-center hideme">
            <h1>Trato personalizado</h1> 
            <p>Atendemos a tus consultas de manera rápida. Incluimos el mantenimiento dentro de nuestro servicio.</p>  
        </div>
        <div class="col-12 col-md-4 align-center rel-top-70-px hideme" style="position: relative; top: 70px;">
            <h1>Manejo de tecnologías</h1> 
            <p>Hacemos uso de multitud de tecnologias para la creación de tu web, todo pasa por un proceso ordenado y el resultado es un servicio eficaz y profesional.</p>
        </div>
        <div class="col-12 col-md-4 align-center hideme">
            <h1>Especialistas</h1> 
            <p>Somos especialistas en diseño y creacion de app y sitios web. Contamos con un equipo multidisciplicar par el exito de tu proyecto.</p>
        </div>
    </div>
</div>

<script>$('.slider').bxSlider({
    autoControls: true,
    auto: true,
    pager: false,
    slideWidth: 500,
    mode: 'horizontal',
    
    captions: false,
    speed: 1050,
    maxSlides: 3,
    autoHover: true,
    pause :3000,
    
    nextSelector: '.customControl',
            prevSelector: '.customControl',
            nextText: 'prueba',
            prevText: '<img src="img/Flecha.png"></img>',
});</script>

@endsection('content')