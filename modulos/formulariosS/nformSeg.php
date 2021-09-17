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
                    <a class="nav-link active" aria-current="page" href="/ProyectoPP/index.php">Inicio</a>
                </li>


                <!-- FACTURACION -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Facturar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/factura/factura.php">Nueva Factura</a></li>
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/factura/bfactura.php">Buscar Factura</a></li>                   
                    </ul>
                </li>


                <!-- FORMULARIO SEGURO -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Formularios de Seguro
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/formulariosS/nformSeg.php">Nuevo</a></li>
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/formulariosS/mformSeg.php">Modificar</a></li>
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/formulariosS/eformSeg.php">Eliminar</a></li>
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/formulariosS/bformSeg.php">Buscar</a></li>
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
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/registrosM/nRegMed.php">Nuevo</a></li>
                        <li><a class="dropdown-item" href="#">Modificar</a></li>
                        <li><a class="dropdown-item" href="#">Eliminar</a></li>
                        <li><a class="dropdown-item" href="#">Buscar</a></li>
                    </ul>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    </ul>
                </li>


                <!-- Paciente -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pacientes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/pacientes/nPaciente.php">Nuevo</a></li>
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





<!--Formularios Seguro -->
        <?php
        error_reporting(0);
        include_once 'conexion.php';
        $idComp;
        $NombComp;


        $NumP=$_GET["FSpas"];
        $NumComp=$_GET['comp'];

        $sql_NPaciente= 'insert into formaseguro (NPaciente,Compañia) values ('.$NumP.','.$NumComp.');';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();



        $sql_NPaciente= 'select idCompanias, Nombre from listadocompanias;';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)


        ?>
    <!--Nuevo Formulario de Seguro -->
    <div class="container form-control p divP" id="fsn" >
        <div class="container form-control p" style="background-color:#ADD8E6">
            <label for="">Nuevo Formulario de Seguro</label>
        </div>
        <div class="container form-control p" style="background-color:#ADD8E6">
            <form action="nformSeg.php" method="GET">
                <div class="row g-2 align-items-center">
                    <div class="col form-control">
                        <label for="">N° de Paciente: </label>
                        <input type="text" class="form-control" name="FSpas">
                    </div>

                    <div class="col form-control">
                        <label for="">Nombre Compañia de Seguro:</label>

                        <select class="form-control" name="comp">       

                            <?php

                            foreach ($resultado as $dato):
                                $idComp=$dato['idCompanias'];
                                $NombComp=$dato['Nombre'];
                                echo "<option value='".$idComp."'>".$NombComp."</option>";

                            endforeach;

                            ?>

                        </select>

                    </div>
                </div>
                <div class="row g-3 align-items-center botonG">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>

            </form>

        </div>
        
    </div>





    <!--Modificar Formulario de Seguro -->
<!--Fin formularios de seguro -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

    <script src="js/nuevo.js"></script>


</body>

</html>