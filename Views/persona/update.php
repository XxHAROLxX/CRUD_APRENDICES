<?php

var_dump($_POST);

include 'conexion.php';
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$sql = "UPDATE aprendices SET nombre='$nombre', fecha_nacimiento='$fecha_nacimiento' WHERE id=$id";
$resultado = mysqli_query($conexion, $sql);
if ($resultado) {
    echo "<script>alert('Registro actualizado correctamente');</script>";
    echo "<script>window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error al actualizar el registro');</script>";
    echo "<script>window.location.href='index.php';</script>";
}
mysqli_close($conexion);