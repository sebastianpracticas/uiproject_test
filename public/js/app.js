function clickCuenta() {
    document.getElementById("miCuenta").style.display = "block";
    document.getElementById("misCompras").style.display = "none";
    document.getElementById("misMensajes").style.display = "none";
}

function clickCompras() {
    document.getElementById("miCuenta").style.display = "none";
    document.getElementById("misCompras").style.display = "block";
    document.getElementById("misMensajes").style.display = "none";
}

function clickMensajes() {
    document.getElementById("miCuenta").style.display = "none";
    document.getElementById("misCompras").style.display = "none";
    document.getElementById("misMensajes").style.display = "block";
}