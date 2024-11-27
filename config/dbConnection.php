<?php

function getDBConnection(){
$host = "localhost";
$db_name = "proyecto";
$username = "eloy";
$password = "root";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexion exitosa";
    return $conn;
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    return null;
}

}



?>