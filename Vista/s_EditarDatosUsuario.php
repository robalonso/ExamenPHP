<?php

include_once '../Modelo/EmpleadoDto.php';
include_once '../Controlador/EmpleadoDaoImp.php';

session_start();

$_SESSION["Empleado"] = $dtoEmpleado;

if ($_SESSION["Empleado"]) {

    $rut = $_POST["txtRutEmpleado"];
    $nombreEmpleado = $_POST["txtNombreEmpleado"];

    if (EmpleadoDaoImp::ActualizarDatos($rut)) {
        echo "<script> alert('Datos Actualizados') </script>";
    } else {
        echo "<script> alert('No se actualizaron datos') </script>";
    }
}

include_once 'v_EditarDatosUsuario.php';

