<?php
include '../config/conexion.php';
$base = new conexion();
session_start();
$Ids = $_GET['txId'];
$cedula = $_GET['cedula'];
$nombres = $_GET['txtnombres'];
$apellidos = $_GET['txtapellidos'];
$carrera = $_GET['txtcarrera'];
$correo = $_GET['txtcorreo'];
$correo_institucional = $_GET['txtcorreoinstitucional'];
$telefono = $_GET['txttelefono'];
$asunto = $_GET['txtasunto'];


if ($cedula != null && $apellidos != null && $nombres != null && $carrera != null && $correo != null && $correo_institucional != null && $telefono != null && $asunto != null) {
    $base->sql = "update personas set cedula='$cedula',nombres='$nombres',apellidos='$apellidos', carrera='$carrera' ,correo='$correo', correo_institucional='$correo_institucional',telefono='$telefono',asunto='$asunto' where id_persona='$Ids'";
    $base->res = mysqli_query($base->conector, $base->sql);
    header("Location:../vistas/lista.php");
} else {
    $_SESSION['mensaje'] = "0";
    header("Location:../vistas/insertar.php");
}

?>