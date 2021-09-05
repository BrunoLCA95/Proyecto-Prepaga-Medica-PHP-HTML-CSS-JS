var bnb = document.getElementById("bnb");
var bnb1 = document.getElementById("bnb1");
var bnb2 = document.getElementById("bnb2");


var factura = document.getElementById("factura");
var ocultarFS1 = document.getElementById("fsn");

function mostrarBnB() {
    bnb.style.display = "block";
    bnb1.style.display = "block";
    bnb2.style.display = "block";
    factura.style.display = "none";
    ocultarFS1.style.display = "none";
}

function ocultarFactura() {
    
    if (factura.style.display === "none") {
        factura.style.display = "block";
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
    } else {
        ocultarFS1.style.display = "none";
    }
    bnb.style.display = "none";
    bnb1.style.display = "none";
    bnb2.style.display = "none";
}

function ocultarRegN() {
    var z = document.getElementById("ocultarRegN");
    if (z.style.display === "none") {
        z.style.display = "block";
    } else {
        z.style.display = "none";
    }
    bnb.style.display = "none";
    bnb1.style.display = "none";
    bnb2.style.display = "none";
}