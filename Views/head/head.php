<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        // Lógica para determinar el título de la página dinámicamente
        $title = "Index"; // Título por defecto

        // Verificar si el ID está presente en la URL
        if (!empty($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']); // Sanitizar el ID para seguridad

            // Si la URL contiene 'show', mostrar detalles del registro
            if (strpos($_SERVER['REQUEST_URI'], 'show') !== false) {
                $title = "Detalles del registro " . $id;
            } else {
                // Si la URL tiene ID pero no 'show', asumir que es una actualización
                $title = "Actualizar registro " . $id;
            }
        } else {
            // Si no hay ID en la URL, verificar si es la página de creación
            if (strpos($_SERVER['REQUEST_URI'], 'create') !== false) {
                $title = "Agregando nueva persona";
            }
            // Si no es 'create' ni tiene 'id', se mantiene el título por defecto "Index"
        }
        echo $title;
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-dark p-2 mb-3">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/CRUD_APRENDICES/index.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Aprendices
                            </a>
                            <ul class="dropdown-menu custom-dropdown-menu">
                                <li><a class="dropdown-item" href="/CRUD_APRENDICES/Views/persona/index.php">Ver Aprendices</a></li>
                                <li><a class="dropdown-item" href="/CRUD_APaprendices/Views/persona/create.php">Agregar Aprendiz</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container-fluid"></div>