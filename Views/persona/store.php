<?php

include 'conexion.php';

$nombre = $_POST['nombre'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$sql = "INSERT INTO aprendices (nombre, fecha_nacimiento) VALUES ('$nombre', '$fecha_nacimiento')";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo "<script>alert('Registro creado correctamente');</script>";
    echo "<script>window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error al crear el registro');</script>";
    echo "<script>window.location.href='index.php';</script>";
}
mysqli_close($conexion);
