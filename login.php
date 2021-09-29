<?php

include_once 'conexion.php';

$user=$_POST["usuario"];
$pass=$_POST["contra"];

$sql_querry= 'select nombre, pass from usuarios where nombre="'.$user.'" and pass="'.$pass.'";';
$gsent = $pdo->prepare($sql_querry);
$gsent->execute();
$salida=$gsent->fetchAll();

foreach ($salida as $dato){
    if (($user === $dato['nombre']) & ($pass === $dato['pass'])) {
        header("Location: modulos/inicio.php");
        exit;
    } else {

        header("Location: ProyectoPP/");
        exit;
    }

}


?>