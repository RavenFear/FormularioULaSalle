<?php
include '../config/conexion.php';
$base = new conexion();
session_start();
$dni = $_POST['txtdni'];
$nombres = $_POST['txtnombres'];
$apellidos = $_POST['txtapellidos'];
if ($dni != null && $apellidos != null && $nombres != null) {
    $base->sql = "insert into personas(dni,nombres,apellidos)
 values('$dni','$nombres','$apellidos')";
    $base->res = mysqli_query($base->conector, $base->sql);
    $_SESSION['mensaje'] = "1";
    header("Location:../vistas/insertar.php");
} else {
    $_SESSION['mensaje'] = "0";
    header("Location:../vistas/insertar.php");
}

?>