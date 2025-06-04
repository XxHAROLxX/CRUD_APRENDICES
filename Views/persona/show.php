<?php
require_once("c://laragon/www/CRUD_APRENDICES/Views/head/head.php");
require_once("c://laragon/www/CRUD_APRENDICES/Controllers/PersonaController.php");
$obj = new PersonaController();
$date = $obj->show($_GET['id']);
?>

<h2 class="text-center">Detalles del Aprendiz</h2>
<div class="pb-3">
    <a href="index.php" class="btn btn-primary">Regresar</a>
    <a href="edit.php?id=<?= $date['id_persona'] ?>" class="btn btn-success">Actualizar</a>

    <button class="btn btn-danger" onclick="confirmDelete(<?= $date['id_persona'] ?>)">Eliminar</button>

</div>

<table class="table container-fluid">
    <thead class="table-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Segundo Nombre</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Fecha de Nacimiento</th>
            <th scope="col">Tipo de Documento</th>
            <th scope="col">Número de documento</th>
            <th scope="col">Grupo Sanguíneo</th>
            <th scope="col">Factor Sanguíneo</th>
            <th scope="col">Género</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col"><?= $date["id_persona"] ?></td>
            <td scope="col"><?= $date["primer_nombre"] ?></td>
            <td scope="col"><?= $date["segundo_nombre"] ?></td>
            <td scope="col"><?= $date["primer_apellido"] ?></td>
            <td scope="col"><?= $date["segundo_apellido"] ?></td>
            <td scope="col"><?= $date["fecha_nacimiento"] ?></td>
            <td scope="col"><?= $date["tipo_documento"] ?></td>
            <td scope="col"><?= $date["n_documento"] ?></td>
            <td scope="col"><?= $date["grupo_sanguineo"] ?></td>
            <td scope="col"><?= $date["factor_sanguineo"] ?></td>
            <td scope="col"><?= $date["nombre_genero"] ?></td>
        </tr>
    </tbody>
</table>

<br><br>

<table class="table container-fluid">
    <thead class="table-dark">
        <tr>
            <th scope="col">Número de ficha</th>
            <th scope="col">Programa de formación</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col"><?= $date["id_programa_formacion"] ?></td>
            <td scope="col"><?= $date["programa"] ?></td>
        </tr>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "¿Desea eliminar esta persona?",
            text: "Una vez eliminado no se podrá recuperar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar!",
            cancelButtonText: "No, cancelar!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "delete.php?id=" + id;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelado",
                    text: "No se ha borrado el registro:)",
                    icon: "error"
                });
            }
        });
    }
</script>

<?php
require_once("c://laragon/www/CRUD_APRENDICES/Views/head/footer.php");
?>