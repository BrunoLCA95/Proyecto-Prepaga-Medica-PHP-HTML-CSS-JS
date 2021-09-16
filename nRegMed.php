<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programacion 2° Noche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet" type="text/css">

</head>

<nav class="navbar navbar-expand-lg navbar-dark barra">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/logo64.png" alt="" width="40" height="40"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <!--<a class="nav-link active" aria-current="page" onclick="mostrarBnB()" href="#">Inicio</a>-->
                    <a class="nav-link active" aria-current="page" onclick="mostrarBnB()" href="index.php">Inicio</a>
                </li>


                <!-- FACTURACION -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Facturar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" onclick="ocultarFactura()" href="factura.php">Nueva Factura</a></li>
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
                        <li><a class="dropdown-item" onclick="ocultarFSN()" href="nformSeg.php">Nuevo</a></li>
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


                <!-- FORMULARIO SEGURO -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pacientes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Nuevo</a></li>
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

<body document.onload = mostrarB>


<!--Formularios Registro de Examen -->
        <?php
        error_reporting(0);
        include_once 'conexion.php';

        $sql_NPaciente= 'insert into examen (NMedico, NPaciente, TExamen) values ('.$NumMedicoP.','.$Num.','.$NumTipoP.');';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();





        $idMedi;
        $NombMedi;
        $idTipo;
        $NombTipo;


        $sql_NPaciente= 'select NMedico,nombre from medico;';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();

        $sql_NPaciente1= 'select id,tipoExamen from practicap.catalogotarifa;';
        $gsent1 = $pdo->prepare($sql_NPaciente1);
        $gsent1->execute();
        $resultado1=$gsent1->fetchAll();
 
        $Num=$_GET["FSpas"];
        $NumMedicoP=$_GET["medico"];
        $NumTipoP=$_GET["tipoExamen"];




        ?>
        
    <div class="container form-control p divP" id="ocultarRegN" >
            <div class="container form-control p" style="background-color:#ADD8E6">
                <label for="">Nuevo Registro Medico</label>
            </div>
            <div class="container form-control p" style="background-color:#ADD8E6">
                <form action="nRegMed.php" method="GET">
                    <div class="row g-2 align-items-center">
                        <div class="col form-control">
                            <label for="">N° de Paciente: </label>
                            <input type="text" class="form-control" name="FSpas">
                        </div >
                        
                        <div class="col form-control">
                            <label for="">Medico:</label>
                            <select class="form-control" name="medico" id="">       

                                <?php

                                foreach ($resultado as $dato):
                                    $idMedi=$dato['NMedico'];
                                    $NombMedi=$dato['nombre'];
                                    echo "<option value='".$idMedi."'>$NombMedi</option>";

                                endforeach;

                                ?>

                            </select>
                        </div>

                        <div class="col form-control">
                            <label for="">Tipo de Examen:</label>

                            <select class="form-control" name="tipoExamen" id="">       

                                <?php

                                foreach ($resultado1 as $dato):
                                    $idTipo=$dato['id'];
                                    $NombTipo=$dato['tipoExamen'];
                                    echo "<option value='$idTipo'>$NombTipo</option>";

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

    






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>

    <script src="js/nuevo.js"></script>


</body>

</html>