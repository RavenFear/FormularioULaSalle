<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <?php
    include '../config/conexion.php';
    $bases = new conexion();
    if (isset($_GET['id'])) {
        $Id = $_GET['id'];
        $bases->sql = "select * from personas
       where id_persona=$Id";
        $bases->res = mysqli_query($bases->conector, $bases->sql);
    }
    ?>
</head>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 col-12">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <span><strong>Editar</strong></span>
                </div>
                <form action="../logica/editar.php" method="GET">
                    <input class="d-none" type="text" name="txId" value="<?= $Id ?>">
                    <div class="card-body">
                        <div class="row">
                            <?php
                            if ($person = mysqli_fetch_row($bases->res)) {
                                ?>
                                <div class="form-group">
                                    <label>CEDULA</label>
                                    <input type="text" name="cedula" class="form-control"
                                           placeholder="Digite su cedula.." value="<?= $person[1] ?>">
                                </div>
                                <div class="form-group">
                                    <label>NOMBRES</label>
                                    <input type="text" name="txtnombres" class="form-control"
                                           placeholder="Ingrese sus nombres completos..." value="<?= $person[2] ?>">
                                </div>
                                <div class="form-group">
                                    <label>APELLIDOS</label>
                                    <input type="text" name="txtapellidos" class="form-control"
                                           placeholder="Ingrese sus apellidos completos.." value="<?= $person[3] ?>">
                                </div>
                                <div class="form-group">
                                    <label>CARRERA</label>
                                    <input type="text" name="txtcarrera" class="form-control"
                                           placeholder="Ingrese su carrera.." value="<?= $person[4] ?>">
                                </div>
                                <div class="form-group">
                                    <label>CORREO</label>
                                    <input type="text" name="txtcorreo" class="form-control"
                                           placeholder="Ingrese su correo.." value="<?= $person[5] ?>">
                                </div>
                                <div class="form-group">
                                    <label>CORREO INSTITUCIONAL</label>
                                    <input type="text" name="txtcorreoinstitucional" class="form-control"
                                           placeholder="Ingrese su correo institucional.." value="<?= $person[6] ?>">
                                </div>
                                <div class="form-group">
                                    <label>TELEFONO</label>
                                    <input type="text" name="txttelefono" class="form-control"
                                           placeholder="Ingrese su telefono.." value="<?= $person[7] ?>">
                                </div>
                                <div class="form-group">
                                    <label>ASUNTO</label>
                                    <input type="text" name="txtasunto" class="form-control"
                                           placeholder="Ingrese su asunto.." value="<?= $person[8] ?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>