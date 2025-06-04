<?php
require_once("c://laragon/www/CRUD_APRENDICES/Controllers/PersonaController.php");
$obj = new PersonaController();

$id = intval($_POST['id']);
$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$id_tipo_documento = intval($_POST['id_tipo_documento']);
$n_documento = $_POST['n_documento'];
$id_g_sanguineo = intval($_POST['id_g_sanguineo']); 
$id_f_sanguineo = intval($_POST['id_f_sanguineo']); 
$id_genero = intval($_POST['id_genero']); 
$id_programa = intval($_POST['id_programa']); 

$obj->update(
    $id,
    $primer_nombre,
    $segundo_nombre,
    $primer_apellido,
    $segundo_apellido,
    $fecha_nacimiento,
    $id_tipo_documento,
    $n_documento,
    $id_g_sanguineo,
    $id_f_sanguineo,
    $id_genero,
    $id_programa
);