<?php

$link = 'mysql:host=localhost;dbname=practicap';
$username = "root";
$password = "password";

try{
    $pdo = new PDO($link, $username, $password);
    

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}





?>
