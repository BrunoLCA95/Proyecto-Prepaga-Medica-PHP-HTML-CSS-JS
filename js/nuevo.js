var bnb = document.getElementById("bnb");
var bnb1 = document.getElementById("bnb1");
var bnb2 = document.getElementById("bnb2");


var factura = document.getElementById("factura");
var ocultarFS1 = document.getElementById("fsn");
var ocultarRM1 = document.getElementById("ocultarRegN");



function mostrarBnB() {
    bnb.style.display = "block";
    bnb1.style.display = "block";
    bnb2.style.display = "block";
    ocultarFS1.style.display = "none";
    ocultarRM1.style.display = "none";
    factura.style.display = "none";
}

function ocultarFactura() {
    
    if (factura.style.display === "none") {
        factura.style.display = "block";
        ocultarFS1.style.display = "none";
        ocultarRM1.style.display = "none";



    } else {
        factura.style.display = "none";
    }
    bnb.style.display = "none";
    bnb1.style.display = "none";
    bnb2.style.display = "none";
}

function ocultarFSN() {
    
    if (ocultarFS1.style.display === "none") {
        ocultarFS1.style.display = "block";
        factura.style.display = "none";
        ocultarRM1.style.display = "none";


    } else {
        ocultarFS1.style.display = "none";
    }
    bnb.style.display = "none";
    bnb1.style.display = "none";
    bnb2.style.display = "none";
}

function ocultarRegN() {
    
    if (ocultarRM1.style.display === "none") {
        ocultarRM1.style.display = "block";
        factura.style.display = "none";
        ocultarFS1.style.display = "none";


    } else {
        ocultarRM1.style.display = "none";
    }
    bnb.style.display = "none";
    bnb1.style.display = "none";
    bnb2.style.display = "none";
}