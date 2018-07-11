<?php

include_once '../Modelo/EmpleadoDto.php';
include_once '../Controlador/EmpleadoDaoImp.php';

session_start();

$dtoEmpleado = $_SESSION["Empleado"];
$nombreEmpleado = $_POST["txtNombreEmpleado"];
$rut = $_POST["txtRutEmpleado"];
$dtoEmpleado->setNombreEmpleado($nombreEmpleado);
$pass = $dtoEmpleado->getPasswordEmpleado();
//$dtoEmpleado->setPasswordEmpleado($pass);

if (EmpleadoDaoImp::ActualizarDatos($dtoEmpleado)) {
    echo "<script> alert('Datos Actualizados') </script>";
} else {
    echo "<script> alert('No se actualizaron datos') </script>";
}
include_once 'v_EditarDatosUsuario.php';






