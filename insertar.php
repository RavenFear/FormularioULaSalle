<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <?php
    session_start();
    ?>
    <title>Registro</title>
</head>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 col-12">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <span><strong>Registro</strong></span>
                </div>
                <form action="../logica/registrar.php" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label>CEDULA</label>
                                <input type="text" name="cedula" class="form-control" placeholder="Digite su cedula..">
                            </div>
                            <div class="form-group">
                                <label>NOMBRES</label>
                                <input type="text" name="txtnombres" class="form-control"
                                       placeholder="Ingrese sus nombres completos...">
                            </div>
                            <div class="form-group">
                                <label>APELLIDOS</label>
                                <input type="text" name="txtapellidos" class="form-control"
                                       placeholder="Ingrese sus apellidos completos..">
                            </div>
                            <div class="form-group">
                                <label>CARRERA</label>
                                <input type="text" name="txtcarrera" class="form-control"
                                       placeholder="Ingrese su carrera..">
                            </div>
                            <div class="form-group">
                                <label>CORREO</label>
                                <input type="text" name="txtcorreo" class="form-control"
                                       placeholder="Ingrese su correo..">
                            </div>
                            <div class="form-group">
                                <label>CORREO INSTITUCIONAL</label>
                                <input type="text" name="txtcorreoinstitucional" class="form-control"
                                       placeholder="Ingrese su correo institucional..">
                            </div>
                            <div class="form-group">
                                <label>TELEFONO</label>
                                <input type="text" name="txttelefono" class="form-control"
                                       placeholder="Ingrese su telefono..">
                            </div>
                            <div class="form-group">
                                <label>ASUNTO</label>
                                <input type="text" name="txtasunto" class="form-control"
                                       placeholder="Ingrese su asunto..">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-4 col-4">
                                <input type="submit" name="btnRegistrar" class="btn btn-outline-success"
                                       value="Registrar">
                            </div>
                            <div class="col-xl-5 col-lg-7 col-md-6 col-sm-5 col-6 ">
                                <a href="lista.php">Ver personas registradas</a>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <?php
                            if (isset($_SESSION['mensaje'])) {
                                $mensajes = $_SESSION['mensaje'];
                                if ($mensajes == 0) {
                                    ?>
                                    <h2 class="alert alert-danger"><?php echo "Ingrese todos los campos"; ?></h2>
                                <?php } else {
                                    ?>
                                    <h2 class="alert alert-success"><?php echo "Registro exitoso"; ?></h2>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
-->
</body>
</html>