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
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
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
                        <li><a class="dropdown-item" href="#">Modificar</a></li>
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
                        <li><a class="dropdown-item" href="#">Nuevo</a></li>
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

<body>


<!--FOrmularios Factura -->
    <div class="container form-control p divP" id="factura">
        <div class="container form-control p" style="background-color:#ADD8E6">
            <label for="">Nueva Factura</label>
        </div>


        <!--FORMULARIO-->
        <div class="container form-control p" style="background-color:#ADD8E6">
            <div class="cont1">
                <form action="index.php" method="GET">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">N° de Examen Medico</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" id="exMedico" class="form-control" name="med">
                        </div>
                        <div class="col-auto">
                            <input type="submit" class="btn btn-primary" value="Cargar">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        error_reporting(0);
        include_once 'conexion.php';
        $medico = $_GET['med'];
        $ex_medico=strval($medico);

        $NumP;
        $NomP;
        $DirP;
        $NumC;
        $NomC;
        $DirC;
        $PlanC;
        $NumM;
        $NomM;
        $CreM;
        $NumTE;
        $NomE;
        $CosE;
        $vpC;
        $vpP;


        $sql_NPaciente= 'select NPaciente from examen where NExamen='.$ex_medico.';';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)
        $NumP=$dato['NPaciente'];


        $sql_NPaciente='select nombre,direccion from paciente where NPaciente='.$NumP.';';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)
        $NomP = $dato['nombre'];
        $DirP = $dato['direccion'];


        $sql_NPaciente= 'select Compañia from formaseguro where NPaciente='.$NumP.';';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)
        $NumC=$dato['Compañia'];


        $sql_NPaciente= 'select Nombre,Direccion,Plan from listadocompanias where idCompanias='.$NumC.';';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)
        $NomC=$dato['Nombre'];
        $DirC=$dato['Direccion'];
        $PlanC=$dato['Plan'];


        $sql_NPaciente= 'select NMedico,TExamen from examen where NExamen='.$ex_medico.';';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)
        $NumM=$dato['NMedico'];
        $NumTE=$dato['TExamen'];


        $sql_NPaciente= 'select nombre,credencial from medico where NMedico='.$NumM.';';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)
        $NomM=$dato['nombre'];
        $CreM=$dato['credencial'];


        $sql_NPaciente= 'select tipoExamen,tarifa from catalogotarifa where id='.$NumTE.';';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)
        $NomE=$dato['tipoExamen'];
        $CosE=$dato['tarifa'];


        $vpC=($CosE/100)*$PlanC;
        $vpP=$CosE-$vpC;


        $sql_NPaciente= 'select Numero from factura order by Numero desc limit 1;';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)
        $NumF=$dato['Numero'];
        $NumF=$NumF+1;



        ?>




        <!--Datos Paciente-->
        <div class="container form-control p" style="background-color:#ADD8E6">
            <div class="row g-3 align-items-center">
                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Paciente</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="paciente" class="form-control" value="<?php echo $NomP; ?>"> 
                            </div>
                        </fieldset>
                    </form>
                </div>


                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Direccion</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="direccion" class="form-control" value="<?php echo $DirP; ?>">
                            </div>
                        </fieldset>
                    </form>

                </div>

                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Valor a Pagar</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="vpagar" class="form-control" value="<?php echo '$'.$vpP; ?>">
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>


        <!--Datos Compañia de seguro-->
        <div class="container form-control p" style="background-color:#ADD8E6">
            <div class="row g-3 align-items-center">
                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Comp de Seguro</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="paciente" class="form-control" value="<?php echo $NomC; ?>">
                            </div>
                        </fieldset>
                    </form>
                </div>


                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Plan de Seguro</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="direccion" class="form-control" value="<?php echo $PlanC.'%'; ?>">
                            </div>
                        </fieldset>
                    </form>

                </div>

                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Valor a Pagar</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="vpagar" class="form-control" value="<?php echo '$'.$vpC; ?>">
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>


        <!--Datos Examen Medico-->
        <div class="container form-control p" style="background-color:#ADD8E6">
            <div class="row g-3 align-items-center">
                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Tipo de Examen</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="paciente" class="form-control" value="<?php echo $NomE; ?>">
                            </div>
                        </fieldset>
                    </form>
                </div>


                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Medico</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="direccion" class="form-control" value="<?php echo $NomM; ?>">
                            </div>
                        </fieldset>
                    </form>

                </div>

                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Credencial Medico</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="vpagar" class="form-control" value="<?php echo $CreM; ?>">
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>

        <!--Datos Factura-->
        <div class="container form-control p" style="background-color:#ADD8E6">
            <div class="row g-3 align-items-center">
                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Factura N°</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="paciente" class="form-control" value="<?php echo $NumF; ?>">
                            </div>
                        </fieldset>
                    </form>
                </div>


                <div class="col form-control">
                    <form action="" method="GET">
                        <fieldset disabled>
                            <div class="col-auto">
                                <label for="disabledTextInput" class="form-label">Valor Total</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="direccion" class="form-control" value="<?php echo '$'.$CosE; ?>">
                            </div>
                        </fieldset>
                    </form>

                </div>

            </div>
        </div>

        <!--BOTON GUARDAR Y IMPRIMIR-->
        <div class="container form-control p" style="background-color:#ADD8E6">
            <div class="row g-3 align-items-center">
                <input class="btn btn-primary" type="button" value="Guardar y Imprimir">

            </div>
        </div>

    </div>
<!--Fin Formularios Factura -->

<!--Formularios Seguro -->
        <?php
        $idComp;
        $NombComp;


        $sql_NPaciente= 'select idCompanias, Nombre from listadocompanias;';
        $gsent = $pdo->prepare($sql_NPaciente);
        $gsent->execute();
        $resultado=$gsent->fetchAll();
        foreach ($resultado as $dato)


        ?>

    <div class="container form-control p divP" id="fsn">
        <div class="container form-control p" style="background-color:#ADD8E6">
            <label for="">Nuevo Formulario de Seguro</label>
        </div>
        <div class="container form-control p" style="background-color:#ADD8E6">
            <form action="" method="GET">
                <div class="row g-2 align-items-center">
                    <div class="col form-control">
                        <label for="">N° de Paciente: </label>
                        <input type="text" class="form-control" name="FSpas">
                    </div>

                    <div class="col form-control">
                        <label for="">Nombre Compañia de Seguro:</label>

                        <select class="form-control" name="compañia " id="">       

                            <?php

                            foreach ($resultado as $dato):
                                $idComp=$dato['idCompanias'];
                                $NombComp=$dato['Nombre'];
                                echo "<option value='$idComp'>$NombComp</option>";

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