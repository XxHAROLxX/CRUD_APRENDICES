<?php

$server = "localhost";
$database = "CRUD_APRENDIZ";
$usuario = "root";
$contrasenia = "";

$conexion = mysqli_connect($server, $usuario, $contrasenia, $database);

try {
    if (!$conexion) {
        throw new Exception("Error de conexión: " . mysqli_connect_error());
    } else {
        // echo "Conexión exitosa a la base de datos.";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
