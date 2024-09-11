<?php
include '../config/conexion.php';
$base = new conexion();
session_start();
$Ids = $_GET['txId'];
$dni = $_GET['txtdni'];
$nombres = $_GET['txtnombres'];
$apellidos = $_GET['txtapellidos'];
if ($dni != null && $apellidos != null && $nombres != null) {
    $base->sql = "update personas set dni='$dni',nombres='$nombres',apellidos='$apellidos' where id_persona='$Ids'";
    $base->res = mysqli_query($base->conector, $base->sql);
    header("Location:../vistas/lista.php");
} else {
    $_SESSION['mensaje'] = "0";
    header("Location:../vistas/insertar.php");
}

?>