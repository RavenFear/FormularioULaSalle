<?php
include '../config/conexion.php';
$base = new conexion();
session_start();
$cedula = $_POST['cedula'];
$nombres = $_POST['txtnombres'];
$apellidos = $_POST['txtapellidos'];
$carrera = $_POST['txtcarrera'];
$correo = $_POST['txtcorreo'];
$correo_institucional = $_POST['txtcorreoinstitucional'];
$telefono = $_POST['txttelefono'];
$asunto = $_POST['txtasunto'];


if ($cedula != null && $apellidos != null && $nombres != null && $carrera != null && $correo != null && $correo_institucional != null && $telefono != null && $asunto != null) {
    $base->sql = "insert into personas(cedula,nombres,apellidos,carrera,correo,correo_institucional,telefono,asunto)
 values('$cedula','$nombres','$apellidos','$carrera','$correo','$correo_institucional','$telefono','$asunto')";
    $base->res = mysqli_query($base->conector, $base->sql);
    $_SESSION['mensaje'] = "1";
    header("Location:../vistas/insertar.php");
} else {
    $_SESSION['mensaje'] = "0";
    header("Location:../vistas/insertar.php");
}

?>