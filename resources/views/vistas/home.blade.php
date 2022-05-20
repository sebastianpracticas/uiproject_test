<!-- Heredo de la plantilla/welcome -->
@extends('plantilla/welcome_home')

<!-- Inicio de la seccion content -->
@section('content')
<div class="arrow-right"> </div>
<!--Slider-->
<div class="row">
    <div class="col">
        <div class="col">
            <img src="" alt="">
        </div>
        <div class="col">
            <h1>
                Empieza ahora!
            </h1>
            <p>
                Diseñamos tu web de manera orgánica para 
                un mejor resultado de tus ventas.
            </p>
        </div>
    </div>
</div>

<!--div-->

<!--Slider 2-->
<div class="slider row">
    <div class="col">

        <div class="carousel slide " id="mi-carousel" data-bs-ride="carousel">
             <div class="carousel-inner ">
                <div class="carousel-item active ">
                    <img class="d-block w-100 img-fluid" src="img/"width="1500" height="120"  alt="imagen persona computadora escribiendo código">
                </div>

                <div class="carousel-item ">
                   <img class="d-block w-100 img-fluid" src="img/"width="1200" height="120"  alt="imagen codigo programacion">
               </div>

               <div class="carousel-item ">
                   <img class="d-block w-100 img-fluid" src="img/" width="1200" height="120" alt="chios usando laptop">
               </div>
            </div>

            <button class="carousel-control-prev"
            type="button"
            data-bs-slide="prev"
            data-bs-target="#mi-carousel">

            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
            </button>
            <!--icono-->

            <button class="carousel-control-next"
            type="button"
            data-bs-slide="next"
            data-bs-target="#mi-carousel">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
</div>
<!--Nosotros-->
<div class="container">
    <div class="Nosotros row ">
        <div class="imagen-nosotros col-xs-12 col-sm-6 align-self-center">
            <img  class="d-block" src="img/Nosotros.png" alt="imagen de personas hablando"  width="648" height="400"></div> 
        <div class="Nosotros-texto  col-xs-12 col-sm-6 align-self-center">
            <div class="col-12"><h1>Nosotros</h1></div>
            <div class="col-12">
                <p>Somos una agencia que nace con el proposito de ofrecer la mejor calidad 
                .Nos caracterizamos por un trabajo profesional y por nuestra creatividad 
                en cada diseño.</p>
            </div>        
        </div>
    </div>
</div>
<!--Servicios-->

<div class="container">
<div class="row">
    <div class="servicios col"></div>
    <h1 class="h1 col-12">Servicios</h1>
    <div class="Seo col-12 col-md-4">
        <div>
            <img src="img/Seo.png" alt="" class="imagen-servicios">
            <h2>Seo</h2> 
            <p>Poscicionamiento 
                  orgánico de tu web , a traves de Seo 
                  .Servirá aumentar tus buscquedas</p>
        </div>
    </div>
    <div class="diseño web col-12 col-md-4">
        <div>
            <img src="img/Web.png" alt="" class="imagen-servicios">
            <h2>Diseño Web</h2> 
            <p>Elaboramos un diseño personalizado segun
                 sus necesidades,responsivo,usable y armonioso.</p>
        </div>
    </div>
    <div class="Redes sociales col-12 col-md-4">
        <div>
            <img src="img/Redes Sociales.png" alt="" class="imagen-servicios">
            <h2>Redes sociales</h2> 
            <p>Administramos tus redes para mejorar tu imagen de marca y aumentar posibles clientes</p>
        </div>
    </div>
</div>
</div>

<!--portafolio-->

<div class="slider">
    <div><img src="img/Portafolio.png" title="Title of image1"></div>
    <div><img src="img/Portafolio1.png" title="Title of image2"></div>
    <div><img src="img/Portalfolio3.png" title="Title of image3"></div>
</div>

<!--Razones para elegirnos-->

<div class="container">
    <div class="Razones para elegirnos row">
        <div class="col-12">
            <h1>Razones para elegirnos</h1> 
        </div>
        <div class="col-12 col-md-4">
            <img src="" alt=""> </img> 
            <h1>
                Trato personalizado
            </h1> 
            <p>Atendemos a tus consultas de manera rápida
                        .El servicio incluye modificaciones de tu proyecto para </p>  
        </div>
        <div class="col-12 col-md-4">
            <img src="" alt=""> </img> 
            <h1>
                Manejo de tecnologías
            </h1> 
            <p>Usamos  varias tecnologias para la creación de tu web ,y todo pasa por 
                    un proceso ordenado ,que nos permite entregarme un mejor servicio. </p>
        </div>
        <div class="col-12 col-md-4">
            <img src="" alt=""> </img> 
            <h1>
                Especialistas
            </h1> 
            <p>Somos especialistas en diseño y creacion de app y sitios web .Contamos 
                con un equipo multidisciplicar par el exito de tu proyecto.</p>
        </div>
    </div>
</div>

<!--formulario-->
<div class="formulario">
    <h1 class="h1">Contacto</h1>
    <form action="">
        <div> 
            <label for="nombre">Datos personales</label> 
            <input type="text" name="nombre" id="nombre"
              placeholder="Nombres" 
              class="form-control">
            <input type="text" name="apellidos" id="apellidos"
              placeholder="Apellidos" 
              class="form-control">   
        </div>
        <div>
            <label for="mail">Email</label> 
            <input type="mail" name="mail" id="mail" placeholder="antonio@ejemplo.com" class="form-control"> 
        </div>
        <div> 
            <label for="">¿Como podemos ayudarte?</label> 
            <textarea name="mensaje" id="mensaje" placeholder="Mensaje" class="form-control"></textarea>       
        </div>
        <div class="d-flex justify-content-center">
            <button class="boton col-12 col-md-6" type="submit">Enviar</button>
        </div>
    </form>
</div>

<!--opiniones-->
<div class="row"> 
    <div class="col">
        <div class=""> 
            <img src="img/Imagen Opiniones.png " alt="">
            <h3>Alexa Meyer</h3>
            <p>Increible experiencia son unos profesionales del sector.He aumentado las ventas </p>
        </div>
        <div class=""> 
            <img src="" alt="">
            <h3></h3>
            <p></p>
        </div>
        <div class=""> 
            <img src="" alt="">
            <h3></h3>
            <p></p>
        </div>
    </div>
</div>

@endsection('content')