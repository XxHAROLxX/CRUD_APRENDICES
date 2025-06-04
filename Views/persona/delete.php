<?php

include 'conexion.php';
$id = $_GET['id'];

$sql = "DELETE FROM aprendices WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);
if ($resultado) {
    echo "<script>alert('Registro eliminado correctamente');</script>";
    echo "<script>window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error al eliminar el registro');</script>";
    echo "<script>window.location.href='index.php';</script>";
}
mysqli_close($conexion);
