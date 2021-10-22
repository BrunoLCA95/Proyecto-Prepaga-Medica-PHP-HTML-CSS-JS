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

                <!-- Boton Cerrar Sesion -->
                <div class="position-absolute end-0 pruebaNav">
                    <a class="btn btn-info" href="/proyectoPP" role="button">Cerrar Sesion</a>
                </div>

            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="container form-control p divP" id="factura" >
        <div class="container form-control p" style="background-color:#ADD8E6">
            <div class="input-group">
                <form action="mRegMed.php" method="GET" class="input-group" >
                    <input type="text" class="form-control" name="B_Nombre" aria-label="Text input with dropdown button">
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-primary" value="Buscar Formulario de Seguro">
                    </div>
                </form>
            </div>
        </div>

        <div class="container form-control p table-responsive " style="background-color:#ADD8E6">
        <table class="table table-striped ">
                <thead>
                    <tr>
                    <th scope="col">N° Examen</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Tipo de Examen</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                error_reporting(0);
                include_once 'conexion.php';
                //SQL MODIFICAR
                $O_Numero=$_GET['numero'];
                $O_Paciente=$_GET['Paciente'];
                $O_Medico=$_GET['NMedico'];
                $O_TExamen=$_GET['T_examen'];
                $Sql_Modificar= "update practicap.examen set NMedico=".$O_Medico.", NPaciente=".$O_Paciente.", TExamen=".$O_TExamen." where NExamen=".$O_Numero.";";
                $Modificar = $pdo->prepare($Sql_Modificar);
                $Modificar->execute();

                //SQL BUSCAR
                $nombre=null;
                $nombre=$_GET['B_Nombre'];
                $sqldatos;
                if ($nombre == null) {
                    $sqldatos= 'SELECT e.NExamen,e.NMedico,m.nombre as medico,e.NPaciente as NumeroP, pa.nombre as paciente,e.TExamen, ct.tipoExamen as examen FROM examen as e, medico as m, paciente as pa, catalogotarifa as ct where m.NMedico=e.NMedico and pa.NPaciente=e.NPaciente and ct.id=e.TExamen;';
                }else{
                    $sqldatos='SELECT e.NExamen,e.NMedico,m.nombre as medico,e.NPaciente as NumeroP, pa.nombre as paciente,e.TExamen, ct.tipoExamen as examen FROM examen as e, medico as m, paciente as pa, catalogotarifa as ct where m.NMedico=e.NMedico and pa.NPaciente=e.NPaciente and ct.id=e.TExamen and pa.nombre like"'.$nombre.'%";';
                }
                $gsent = $pdo->prepare($sqldatos);
                $gsent->execute();
                $resultado=$gsent->fetchAll();

                foreach ($resultado as $dato){
                $Numero=$dato['NExamen'];
                $Nmedico=$dato['NMedico'];
                $medico=$dato['medico'];
                $Npaciente=$dato['NumeroP'];
                $paciente=$dato['paciente'];
                $N_TExamen=$dato['TExamen'];
                $examen=$dato['examen'];


                //INICIO TABLA
                echo "<tr>";
                    echo '<form action="mRegMed.php" method="GET">';
                    echo '<th scope="row"><input type="text" name="numero" class="form-control" value="'.$Numero.'"></th>';                
                    
                    //Paciente
                    echo '<th scope="row"><select name="Paciente" class="form-control">';
                   
                    $sqlP='select * from practicap.paciente;';
                    $gsent = $pdo->prepare($sqlP);
                    $gsent->execute();
                    $P_Nombre=$gsent->fetchAll();
                    
                    echo "<option value='".$Npaciente."'>".$paciente."</option>";
                    
                    foreach ($P_Nombre as $Datos_P) {
                        $id_paciente=$Datos_P["NPaciente"];
                        $nomP=$Datos_P["nombre"];
                        echo "<option value='".$id_paciente."'>".$nomP."</option>";
                    }                  
                    echo '</select></th>';

                    //Medico
                    echo '<th scope="row"><select name="NMedico" class="form-control">';

                    $sqlM='SELECT * FROM practicap.medico;';
                    $gsent = $pdo->prepare($sqlM);
                    $gsent->execute();
                    $N_medico=$gsent->fetchAll();

                    echo "<option value='".$Nmedico."'>".$medico."</option>";

                    foreach ($N_medico as $Datos_M) {
                        $id_Medico=$Datos_M["NMedico"];
                        $nomM=$Datos_M["nombre"];
                        echo "<option value='".$id_Medico."'>".$nomM."</option>";
                    }

                    echo '</select></th>';

                    //Tipo de Examen
                    echo '<th scope="row"><select name="T_examen" class="form-control">';

                    $sql_TE='SELECT * FROM practicap.catalogotarifa;';
                    $gsent = $pdo->prepare($sql_TE);
                    $gsent->execute();
                    $N_TE=$gsent->fetchAll();

                    echo "<option value='".$N_TExamen."'>".$examen."</option>";

                    foreach ($N_TE as $Datos_TE) {
                        $id_Tipo=$Datos_TE["id"];
                        $Tipo=$Datos_TE["tipoExamen"];
                        echo "<option value='".$id_Tipo."'>".$Tipo."</option>";
                    }

                    echo '</select></th>';

                    //Boton Modificar
                    echo '<th scope="row"><input type="submit" class="btn btn-primary" value="Modificar"</th></form></tr>';
                };
                ?>
                </tbody>  
            </table>
        </div>
    </div>
    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
<script src="../js/nuevo.js"></script>

</body>

</html>