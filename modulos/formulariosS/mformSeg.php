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

<body>
    <div class="container form-control p divP" id="factura" >
        <div class="container form-control p" style="background-color:#ADD8E6">
            <div class="input-group">
                <form action="bfactura.php" method="GET" class="input-group" >
                    <input type="text" class="form-control" name="nombre" aria-label="Text input with dropdown button">
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
                    <th scope="col">N° Formulario</th>
                    <th scope="col">Nombre Paciente</th>
                    <th scope="col">Compañia de Seguro</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                error_reporting(0);

                //$pruebasql="update formaseguro set NPaciente=(select NPaciente from paciente where nombre="Casimiro"), Compañia=(select idCompanias from listadocompanias where Nombre="Ostes") where NFormulario=2;";

                $nombre=null;
                $nombre=$_GET['nombre'];
                include_once 'conexion.php';
                $sqldatos= 'SELECT formaseguro.NFormulario,formaseguro.NPaciente,formaseguro.Compañia, paciente.nombre, listadocompanias.Nombre FROM formaseguro,paciente,listadocompanias where formaseguro.NPaciente=paciente.NPaciente and formaseguro.Compañia=listadocompanias.idCompanias;';
 
                $varn=$_GET['numero'];
                $vara=$_GET['test2'];
                $varb=$_GET['test'];
                $pruebasql= "update practicap.formaseguro set NPaciente=".$vara.", Compañia=".$varb." where NFormulario=".$varn.";";
                $prueba1 = $pdo->prepare($pruebasql);
                $prueba1->execute();
                $gsent = $pdo->prepare($sqldatos);
                $gsent->execute();
                $resultado=$gsent->fetchAll();

                foreach ($resultado as $dato){
                $Numero=$dato['NFormulario'];
                $NPaciente=$dato['NPaciente'];
                $NCompS=$dato['Compañia'];
                $nomPC=$dato['nombre'];
                $nomCompS=$dato['Nombre'];

                echo "<tr>";
                    echo '<form action="mformSeg.php" method="GET">';
                    echo '<th scope="row"><input type="text" name="numero" class="form-control" value="'.$Numero.'"></th>';                
                    echo '<th scope="row"><select name="test2" id="test2" class="form-control">';
                    
                    $sqlnom='select * from practicap.paciente;';
                    $gsent = $pdo->prepare($sqlnom);
                    $gsent->execute();
                    $nom=$gsent->fetchAll();
                    
                    echo "<option value='".$NPaciente."'>".$nomPC."</option>";
                    
                    foreach ($nom as $vuelta) {
                        $id=$vuelta["NPaciente"];
                        $nomP=$vuelta["nombre"];
                        echo "<option value='".$id."'>".$nomP."</option>";
                    }                  
                    echo '</select></th>';

                    echo '<th scope="row"><select name="test" id="test" class="form-control">';

                    $sqlnom='select * from practicap.listadocompanias;';
                    $gsent = $pdo->prepare($sqlnom);
                    $gsent->execute();
                    $nom=$gsent->fetchAll();

                    echo "<option value='".$NCompS."'>".$nomCompS."</option>";

                    foreach ($nom as $vuelta) {
                        $id=$vuelta["idCompanias"];
                        $nomP=$vuelta["Nombre"];
                        echo "<option value='".$id."'>".$nomP."</option>";
                    }

                    echo '</select></th>';
                    echo '<th scope="row"><input type="submit" class="btn btn-primary" value="Modificar"</th>';
                    echo '<th scope="row"><input type="submit" class="btn btn-primary" value="Eliminar"</th></form></tr>';
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