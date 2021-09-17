<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programacion 2° Noche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="/ProyectoPP/css/estilos.css" rel="stylesheet" type="text/css">

</head>

<nav class="navbar navbar-expand-lg navbar-dark barra">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/ProyectoPP/img/logo64.png" alt="" width="40" height="40"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                   
                    <a class="nav-link active" aria-current="page" onclick="mostrarBnB()" href="#">Inicio</a>
                </li>


                <!-- FACTURACION -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Facturar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" onclick="ocultarFactura()" href="#">Nueva Factura</a></li>
                    </ul>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Buscar Factura</a></li>
                    </ul>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    </ul>
                </li>


                <!-- FORMULARIO SEGURO -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Formularios de Seguro
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" onclick="ocultarFSN()" href="#">Nuevo</a></li>
                        <li><a class="dropdown-item" onclick="mostrarF()"  href="#">Modificar</a></li>
                        <li><a class="dropdown-item" href="#">Eliminar</a></li>
                        <li><a class="dropdown-item" href="#">Buscar</a></li>
                    </ul>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    </ul>
                </li>


                <!-- Registro de Examen -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Registro de Examen
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" onclick="ocultarRegN()" href="#" >Nuevo</a></li>
                        <li><a class="dropdown-item" href="#">Modificar</a></li>
                        <li><a class="dropdown-item" href="#">Eliminar</a></li>
                        <li><a class="dropdown-item" href="#">Buscar</a></li>
                    </ul>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    </ul>
                </li>


                <!-- FORMULARIO Paciente -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pacientes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" onclick="ocultarNPA()" href="#">Nuevo</a></li>
                        <li><a class="dropdown-item" href="#">Modificar</a></li>
                        <li><a class="dropdown-item" href="#">Buscar</a></li>
                    </ul>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div>PRUEBA DE GRAFICA DIAGRAMA PARROT</div>


<?php
error_reporting(0);
require_once ("conexion.php");
require_once ("conf.php");

$sql_NPaciente= 'select count(TExamen)as cuenta,tipoExamen from examen,catalogotarifa where TExamen=id group by TExamen order by cuenta ASC;';
$gsent = $pdo->prepare($sql_NPaciente);
$gsent->execute();
$resultado=$gsent->fetchAll();
foreach ($resultado as $dato){
$NumP[]=$dato['cuenta'];
$por_total=$por_total+$dato['cuenta'];
$por_total=$por_total/100;
var_dump($NumP);
}
foreach ($NumP as $dato){
$arreglo[]=($dato['cuenta']/$por_total);
$arreglo2[]=$dato['tipoExamen'];
}




// Creamos la gráfica
$pc = new C_PhpChartX(array($arreglo),'basic_chart');
$pc->set_axes(array(
    'xaxis'=> array('label'=>'cantidades)'),
    'yaxis'=> array('label'=>'Datos Recolectados'),

));

// Efecto de gráfica en movimiento
$pc->set_animate(true);
// Añadimos un título a la gráfica
$pc->set_title(array('text'=>'Grafico Prueba'));
// Dibuja la gráfica
$pc->draw();
?>

















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

<script src="js/nuevo.js"></script>


</body>

</html>