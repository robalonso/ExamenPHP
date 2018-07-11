<?php

include_once '../Modelo/EmpleadoDto.php';
include_once '../Controlador/EmpleadoDaoImp.php';
session_start();

$dtoEmpleado = $_SESSION["Empleado"];
$pass = $_POST["nuevaPass"];
$confirmar = $_POST["confirmarPass"];
$rut = $_POST["rutEmpleado"];



$dtoEmpleado->setPasswordEmpleado($pass);

if ($pass == $confirmar) {
    if (EmpleadoDaoImp::ActualizarPass($dtoEmpleado)) {
        echo "<script>alert('La contraseña ha sido actualizada')</script>";

        include_once 'v_EditarDatosUsuario.php';
    } else {

        echo "<script>alert('La contraseña no ha sido actualizada')</script>";
        include_once 'v_EditarDatosUsuario.php';
    }
} else {
    echo "<script> alert('Las contraseñas no coinciden') </script>";
}



include_once 'v_EditarDatosUsuario.php';
