<?php
    require_once("c://laragon/www/CRUD_APRENDICES/Views/head/head.php");

?>

<?php
    require_once("c://laragon/www/CRUD_APRENDICES/Models/tablas.php");
    $tabla = new Tablas;

    $tipo_documento = $tabla->mostrarTablas('tipos_documento');
    $grupo_sanguineo = $tabla->mostrarTablas('grupos_sanguineos');
    $factor_sanguineo = $tabla->mostrarTablas('factores_sanguineos');
    $genero = $tabla->mostrarTablas('generos');
    $programa = $tabla->mostrarTablas('programas_formacion');


?>

<style>
    body {
        background-color: #e0f2f7; /* Un azul claro sutil para el fondo de la página */
    }
    .form-container-card {
        background-color: #f0faff; /* Un azul más claro para el fondo del formulario (como una tarjeta) */
        border: 1px solid #cceeff; /* Borde sutil */
        border-radius: 8px;
        padding: 25px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-top: 20px; /* Margen superior para separarlo de la navegación */
        margin-bottom: 20px; /* Margen inferior */
    }
    /* Puedes ajustar los colores de los botones si deseas que también sean azules */
    .btn-primary {
        background-color: #007bff; /* Azul oscuro de Bootstrap por defecto */
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    .btn-danger {
        background-color: #dc3545; /* Rojo de Bootstrap por defecto */
        border-color: #dc3545;
    }
</style>

    <form action="store.php" method="POST" autocomplete="off">
        <div class="row">
            <div class="form-group mb-4 col-md-3">
                <label for="primer_nombre" class="form-label">Primer Nombre:</label>
                <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
            </div>
            <div class="form-group mb-4 col-md-3">
                <label for="segundo_nombre" class="form-label">Segundo Nombre:</label>
                <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
            </div>
            <div class="form-group mb-4 col-md-3">
                <label for="primer_apellido" class="form-label">Primer Apellido:</label>
                <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
            </div>
            <div class="form-group mb-4 col-md-3">
                <label for="segundo_apellido" class="form-label">Segundo Apellido:</label>
                <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
            </div>
        </div> 
        <div class="row"> 
            <div class="form-group mb-4 col-md-4">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="form-group mb-4 col-md-4">
                <label class="form-label">Tipo de Documento</label>
                <select name="id_tipo_documento" class="form-select" required>
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($tipo_documento as $tipo): ?>
                        <option value="<?= $tipo['id'] ?>"><?= $tipo['tipo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-4 col-md-4">
                <label for="n_documento" class="form-label">Número de Documento:</label>
                <input type="text" class="form-control" id="n_documento" name="n_documento" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group mb-4 col-md-4">
                <label class="form-label">Gupo Sanguíneo</label>
                <select name="id_g_sanguineo" class="form-select" required>
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($grupo_sanguineo as $grupo): ?>
                        <option value="<?= $grupo['id'] ?>"><?= $grupo['grupo'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <div class="form-group mb-4 col-md-4">
                <label class="form-label">Factor Sanguíneo</label>
                <select name="id_f_sanguineo" class="form-select" required>
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($factor_sanguineo as $factor): ?>
                        <option value="<?= $factor['id'] ?>"><?= $factor['factor'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-5 col-md-4">
                <label class="form-label">Género</label>
                <select name="id_genero" class="form-select" required>
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($genero as $gen): ?>
                        <option value="<?= $gen['id'] ?>"><?= $gen['nombre_genero'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
            <div class="form-group mb-5 col-md-4">
                <label class="form-label">Programas</label>
                <select name="id_programa" class="form-select" required>
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($programa as $prog): ?>
                        <option value="<?= $prog['id'] ?>"><?= $prog['programa'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a class="btn btn-danger" href="index.php">Cancelar</a>
        </form>
        
        <?php
    require_once("c://laragon/www/CRUD_APRENDICES/Views/head/footer.php");
    ?>