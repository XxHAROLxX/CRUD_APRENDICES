<?php
    require_once("c://laragon/www/CRUD_APRENDICES/Views/head/head.php");
    require_once("c://laragon/www/CRUD_APRENDICES/Controllers/PersonaController.php");
    $obj = new PersonaController();
    $user = $obj->show($_GET['id']);
?>

<?php
    require_once("c://laragon/www/CRUD_APRENDICES/Models/tablas.php");
    $tabla = new Tablas;

    $tipos_documento = $tabla->mostrarTablas('tipos_documento');
    $grupo_sanguineo = $tabla->mostrarTablas('grupos_sanguineos');
    $factor_sanguineo = $tabla->mostrarTablas('factores_sanguineos');
    $genero = $tabla->mostrarTablas('generos');
    $programa = $tabla->mostrarTablas('programas_formacion');
?>

<form action="update.php" method="post" autocomplete="off">
    <h2>Actualizar Aprendiz</h2>

    <div class="mb-3 row">
        <label for="id" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
            <input type="text" name="id" readonly class="form-control-plaintext" id="id" value="<?= $user[0] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="primer_nombre" class="col-sm-2 col-form-label">Primer Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="primer_nombre" class="form-control" id="primer_nombre" value="<?= $user[1] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="segundo_nombre" class="col-sm-2 col-form-label">Segundo Nombre</label>
        <div class="col-sm-10">
            <input type="text" name="segundo_nombre" class="form-control" id="segundo_nombre" value="<?= $user[2] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="primer_apellido" class="col-sm-2 col-form-label">Primer Apellido</label>
        <div class="col-sm-10">
            <input type="text" name="primer_apellido" class="form-control" id="primer_apellido" value="<?= $user[3] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="segundo_apellido" class="col-sm-2 col-form-label">Segundo Apellido</label>
        <div class="col-sm-10">
            <input type="text" name="segundo_apellido" class="form-control" id="segundo_apellido" value="<?= $user[4] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="fecha_nacimiento" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
        <div class="col-sm-10">
            <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="<?= $user[5] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_tipo_documento" class="col-sm-2 col-form-label">Tipo de Documento</label>
        <div class="col-sm-10">
            <select name="id_tipo_documento" class="form-select" id="id_tipo_documento">
                <option value="">Seleccione una opción</option>
                <?php foreach ($tipos_documento as $tipo): ?>
                    <option value="<?= $tipo['id'] ?>" <?= ($tipo['id'] == $user[6]) ? 'selected' : '' ?>>
                        <?= $tipo['tipo'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="n_documento" class="col-sm-2 col-form-label">Número de Documento</label>
        <div class="col-sm-10">
            <input type="text" name="n_documento" class="form-control" id="n_documento" value="<?= $user[7] ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_g_sanguineo" class="col-sm-2 col-form-label">Grupo Sanguíneo</label>
        <div class="col-sm-10">
            <select name="id_g_sanguineo" class="form-select" id="id_g_sanguineo">
                <option value="">Seleccione una opción</option>
                <?php foreach ($grupo_sanguineo as $grupo): ?>
                    <option value="<?= $grupo['id'] ?>" <?= ($grupo['id'] == $user[8]) ? 'selected' : '' ?>>
                        <?= $grupo['grupo'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_f_sanguineo" class="col-sm-2 col-form-label">Factor Sanguíneo</label>
        <div class="col-sm-10">
            <select name="id_f_sanguineo" class="form-select" id="id_f_sanguineo">
                <option value="">Seleccione una opción</option>
                <?php foreach ($factor_sanguineo as $factor): ?>
                    <option value="<?= $factor['id'] ?>" <?= ($factor['id'] == $user[9]) ? 'selected' : '' ?>>
                        <?= $factor['factor'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_genero" class="col-sm-2 col-form-label">Género</label>
        <div class="col-sm-10">
            <select name="id_genero" class="form-select" id="id_genero">
                <option value="">Seleccione una opción</option>
                <?php foreach ($genero as $gen): ?>
                    <option value="<?= $gen['id'] ?>" <?= ($gen['id'] == $user[10]) ? 'selected' : '' ?>>
                        <?= $gen['nombre_genero'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="id_programa" class="col-sm-2 col-form-label">Programa de Formación</label>
        <div class="col-sm-10">
            <select name="id_programa" class="form-select" id="id_programa">
                <option value="">Seleccione una opción</option>
                <?php foreach ($programa as $pro): ?>
                    <option value="<?= $pro['id'] ?>" <?= ($pro['id'] == $user[11]) ? 'selected' : '' ?>>
                        <?= $pro['programa'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a class="btn btn-danger" href="show.php?id=<?= $user[0] ?>">Cancelar</a>
    </div>
</form>

<?php
    require_once("c://laragon/www/CRUD_APRENDICES/Views/head/footer.php");
?>