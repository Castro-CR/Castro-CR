<?php

$server = 'localhost';
$username ='root' ;
$password = '';
$database= 'proyectotony' ;

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e){
    die('connection Failed: ' .$e->getMessage());
}

?>