<?php

$link = 'mysql:host=localhost;dbname=practicap';
$username = "root";
$password = "skypea95";

try{
    $pdo = new PDO($link, $username, $password);
    

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}





?>
