<?php
include '../config/conexion.php';
$base = new conexion();
if (isset($_GET['id'])) {
    $Ids = $_GET['id'];
    $base->sql = "delete from personas where id_persona=$Ids";
    $base->res = mysqli_query($base->conector, $base->sql);
    header("Location:../vistas/lista.php");
} else {
    header("Location:../vistas/lista.php");
}


