$(document).ready(function() {
    
    check_visibility();
    /* Every time the window is scrolled ... */
    $(window).scroll(check_visibility);
    
});

function check_visibility() {
    /* Check the location of each desired element */
    $('.hideme').each( function(i){
            
        var bottom_of_object = $(this).offset().top + $(this).outerHeight();
        var bottom_of_window = $(window).scrollTop() + $(window).height();
        
        /* If the object is completely visible in the window, fade it it */
        if( bottom_of_window > bottom_of_object ){
            $(this).animate({'opacity':'1'},500);
        }
    }); 
}

function clickCuenta() {
    document.getElementById("miCuenta").style.display = "block";
    document.getElementById("misCompras").style.display = "none";
    document.getElementById("misMensajes").style.display = "none";
    document.getElementById("misPlantillas").style.display = "none";
}

function clickCompras() {
    document.getElementById("miCuenta").style.display = "none";
    document.getElementById("misCompras").style.display = "block";
    document.getElementById("misMensajes").style.display = "none";
    document.getElementById("misPlantillas").style.display = "none";
}

function clickMensajes() {
    document.getElementById("miCuenta").style.display = "none";
    document.getElementById("misCompras").style.display = "none";
    document.getElementById("misMensajes").style.display = "block";
    document.getElementById("misPlantillas").style.display = "none";
}

function clickPlantillas() {
    document.getElementById("miCuenta").style.display = "none";
    document.getElementById("misCompras").style.display = "none";
    document.getElementById("misMensajes").style.display = "none";
    document.getElementById("misPlantillas").style.display = "block";
}

function mostrarChat(id) {
    document.getElementById(id).style.display = "block";
    document.getElementById("lista-mensajes").style.display = "none";
}

function atrasChat(idChat) {
    document.getElementById(idChat).style.display = "none";
    document.getElementById("lista-mensajes").style.display = "block";
}

var editandoPlantilla = false;

function mostrarPlantilla(id) {
    if (!editandoPlantilla) {
        editandoPlantilla = true;
        document.getElementById("plantilla-" + id).style.display = "none";
        document.getElementById("editar-plantilla-" + id).style.display = "block";
    }
}