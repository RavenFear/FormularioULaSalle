<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Formulario de contacto U La Salle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-color: #4da4e8;
        }
        .header-title {
            color: #f112f1;
        }
        .card {
            background-color: #a8eee7;
        }
        .table-bordered {
            border: 3px solid purple;
        }
        .table-bordered th, .table-bordered td {
            border: 3px solid purple;
        }
        .table thead {
            background-color: #54f13d;
        }
        tbody tr {
            background-color: #e6e5ef;
        }
    </style>
    <script>
        function confirmarEliminacion() {
            return confirm("¿Está seguro de eliminar?");
        }
        
        function mostrarMensaje() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('eliminado')) {
                alert("Se eliminó el registro correctamente.");
            }
        }
    </script>
</head>
<body onload="mostrarMensaje()">
<?php
session_start();
include '../config/conexion.php';
$bs = new conexion();

// Mensaje de éxito
if (isset($_SESSION['registro_exito'])) {
    echo "<script>alert('Se ha registrado correctamente.');</script>";
}

// Obtener filtros de búsqueda
$filter_cedula = isset($_GET['filter_cedula']) ? $_GET['filter_cedula'] : '';
$filter_persona = isset($_GET['filter_persona']) ? $_GET['filter_persona'] : '';

// Construir la consulta SQL con filtros
$sql = "SELECT * FROM personas WHERE 1=1";

if (!empty($filter_cedula)) {
    $sql .= " AND cedula LIKE '%$filter_cedula%'";
}
if (!empty($filter_persona)) {
    $sql .= " AND CONCAT(nombre, ' ', apellido) LIKE '%$filter_persona%'";
}

$bs->sql = $sql;
$bs->res = mysqli_query($bs->conector, $bs->sql);
$contador = 0;
?>
<style>
    th, td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .table th:nth-child(1) { width: 5%; }
    .table th:nth-child(2) { width: 15%; }
    .table th:nth-child(3) { width: 15%; }
    .table th:nth-child(4) { width: 10%; }
    .table th:nth-child(5) { width: 10%; }
    .table th:nth-child(6) { width: 15%; }
    .table th:nth-child(7) { width: 15%; }
    .table th:nth-child(8) { width: 10%; }
    .table th:nth-child(9) { width: 10%; }
    .table th:nth-child(10) { width: 15%; }
</style>
<div class="text-center">
    <div class="text-center" style="margin-top: 1.5cm;">
        <h3 class="header-title" style="color: #952563;">Lista Formulario de Contacto U La Salle</h3> 
    </div>

    <form method="GET" class="mb-3" style="margin-top: 0.8cm;"></form>
</div>
<div class="container">
    <div class="mt-2">
        <div class="card">
            <div class="card-body">
                <form method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="filter_cedula" class="form-control"
                                   placeholder="Filtrar por documento"
                                   value="<?= htmlspecialchars($filter_cedula) ?>">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                            <a href="<?= basename(__FILE__) ?>" class="btn btn-secondary">Limpiar Filtros</a>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center">
                        <tr>
                            <th style="width: 5%"><strong>N°</strong></th>
                            <th style="width: 15%"><strong>NOMBRE</strong></th>
                            <th style="width: 15%"><strong>APELLIDO</strong></th>
                            <th style="width: 10%"><strong>CÉDULA</strong></th>
                            <th style="width: 10%"><strong>CARRERA</strong></th>
                            <th style="width: 15%"><strong>CORREO</strong></th>
                            <th style="width: 15%"><strong>CORREO INSTITUCIONAL</strong></th>
                            <th style="width: 10%"><strong>TELEFONO</strong></th>
                            <th style="width: 10%"><strong>ASUNTO</strong></th>
                            <th style="width: 15%"><strong>ACCIÓN</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (mysqli_num_rows($bs->res) > 0) {
                            while ($persona = mysqli_fetch_row($bs->res)) {
                                $contador++;
                                ?>
                                <tr>
                                    <td><?= $contador ?></td>
                                    <td><?= htmlspecialchars($persona[1]) ?></td>
                                    <td><?= htmlspecialchars($persona[2]) ?></td>
                                    <td><?= htmlspecialchars($persona[3]) ?></td>
                                    <td><?= htmlspecialchars($persona[4]) ?></td>
                                    <td><?= htmlspecialchars($persona[5]) ?></td>
                                    <td><?= htmlspecialchars($persona[6]) ?></td>
                                    <td><?= htmlspecialchars($persona[7]) ?></td>
                                    <td><?= htmlspecialchars($persona[8]) ?></td>
                                    <td>
                                        <a href="editar.php?id=<?= $persona[0] ?>"
                                           class="btn btn-outline-warning btn-sm"><strong>Editar</strong></a>
                                        <a href="../logica/delete.php?id=<?= $persona[0] ?>"
                                           class="btn btn-outline-danger btn-sm mx-xl-2 mx-lg-2 mx-md-2 mx-0 mt-xl-0 mt-lg-0 mt-md-0 mt-2" onclick="return confirmarEliminacion();"><strong>Eliminar</strong></a>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo '<tr><th colspan="9" class="alert alert-danger text-center">No hay datos para mostrar</th></tr>';
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <a href="../logica/destruir.php" class="btn btn-primary"><strong>Nuevo</strong></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
