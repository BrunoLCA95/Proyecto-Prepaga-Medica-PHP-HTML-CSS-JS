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
                    <a class="nav-link active" aria-current="page" href="/ProyectoPP/modulos/inicio.php">Inicio</a>
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
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/registrosM/mRegMed.php">Modificar</a></li>
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/registrosM/eRegMed.php">Eliminar</a></li>
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/registrosM/bRegMed.php">Buscar</a></li>
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
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/pacientes/mPaciente.php">Modificar</a></li>
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/pacientes/bPaciente.php">Buscar</a></li>
                    </ul>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    </ul>
                </li>

                <!-- Graficas -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Reportes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/grafica/nGrafica.php">Examenes Medicos</a></li>
                        <li><a class="dropdown-item" href="/ProyectoPP/modulos/grafica/oGrafica.php">Compañias de Seguro</a></li>
                    </ul>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    </ul>
                </li>

                <!-- Boton Cerrar Sesion -->
                <div class="position-absolute end-0 pruebaNav">
                    <a class="btn btn-info" href="/ProyectoPP" role="button">Cerrar Sesion</a>
                </div>

            </ul>
        </div>
    </div>
</nav>

<body>


<!--Formularios Registro de Examen -->
        <?php
        error_reporting(0);
        include_once ($_SERVER['DOCUMENT_ROOT'].'/ProyectoPP/modulos/conexion.php') ;
        
        $Num=$_GET["FSpas"];
        $NumMedicoP=$_GET["medico"];
        $NumTipoP=$_GET["tipoExamen"];


        $sqlComErroresM='Select cargo from medico where NMedico="'.$NumMedicoP.'";';
        $gsent = $pdo->prepare($sqlComErroresM);
        $gsent->execute();
        $resMErrores=$gsent->fetchAll();
        foreach ($resMErrores as $dato) {
            $CatMedico=$dato['cargo'];
        }

        $sqlComErroresM='Select categoria from catalogotarifa where id="'.$NumTipoP.'";';
        $gsent = $pdo->prepare($sqlComErroresM);
        $gsent->execute();
        $resMErrores=$gsent->fetchAll();
        foreach ($resMErrores as $dato) {
            $CatEx=$dato['categoria'];
        }

        if ($Num != null) {
            if ($CatMedico != $CatEx) {
                $sql_NPaciente= 'insert into examen (NMedico, NPaciente, TExamen) values ('.$NumMedicoP.','.$Num.','.$NumTipoP.');';
                $gsent = $pdo->prepare($sql_NPaciente);
                $gsent->execute();
            }else{
                echo "<script>alert('Este Medico no puede realizar este Examen');</script>";
            }
        }






        

        $idMedi;
        $NombMedi;
        $idTipo;
        $NombTipo;
        $UltimoReg;

        $sql_numF= 'select NExamen from examen order by NExamen desc limit 1;';
        $gsent = $pdo->prepare($sql_numF);
        $gsent->execute();
        $resultado2=$gsent->fetchAll();
        foreach ($resultado2 as $dato1)
        $UltimoReg =$dato1['NExamen'] +1;

        $sql_NPaciente= 'select NMedico,nombre,cargo from medico;';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();

        $sql_NPaciente1= 'select id,tipoExamen from practicap.catalogotarifa;';
        $gsent1 = $pdo->prepare($sql_NPaciente1);
        $gsent1->execute();
        $resultado1=$gsent1->fetchAll();
 





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
                                    $CatM=$dato['cargo'];
                                    echo "<option value='".$idMedi."'>$NombMedi,$CatM</option>";

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
                    <div class="row g-2 align-items-center">
                        <div class="col form-control">
                            <fieldset disabled>
                                <label for="">N° de Examen : </label>
                                <input type="text" id="paciente" class="form-control" value="<?php echo $UltimoReg;?>">
                            </fieldset>
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