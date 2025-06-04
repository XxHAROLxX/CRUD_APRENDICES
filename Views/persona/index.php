<?php
    require_once("c://laragon/www/CRUD_APRENDICES/Views/head/head.php");
    require_once("c://laragon/www/CRUD_APRENDICES/Controllers/PersonaController.php");
    $obj = new PersonaController();
    $rows = $obj->index();
?>
<div class="mb-3">
    <h2 class="text-center">Lista de Aprendices</h2>
    <br>
    <a href="/CRUD_APRENDICES/Views/persona/create.php" class="btn btn-primary">Agregar nuevo aprendiz</a>
</div>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDO</th>
            <th scope="col">EDAD</th> 
            <th scope="col">NÚMERO DE DOCUMENTO</th>
            <th scope="col">PROGRAMA</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php if($rows): ?>
            <?php foreach($rows as $row): ?>
                <tr>
                    <th><?= $row['id'] ?></th>
                    <th><?= $row['primer_nombre'] . ' ' . $row['segundo_nombre'] ?></th>
                    <th><?= $row['primer_apellido'] . ' ' . $row['segundo_apellido'] ?></th>
                    <th>
                        <?php
                            $fechaNacimiento = $row['fecha_nacimiento'];
                            $fechaNacimientoObj = new DateTime($fechaNacimiento);
                            $fechaActual = new DateTime();
                            $edad = $fechaNacimientoObj->diff($fechaActual)->y;
                            echo $edad;
                        ?>
                    </th> 
                    <th><?= $row['n_documento'] ?></th>
                    <th><?= $row['programa'] ?></th>
                    <th>
                        <a href="show.php?id=<?= $row[0] ?>" class="btn btn-primary">Ver</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No hay registros</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php
    require_once("c://laragon/www/CRUD_APRENDICES/Views/head/footer.php");
?>