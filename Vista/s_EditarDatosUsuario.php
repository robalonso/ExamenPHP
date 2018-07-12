<?php

include_once '../Controlador/EmpresaDaoImp.php';
include_once '../Controlador/ParticularDaoImp.php';
include_once '../Controlador/EmpleadoDaoImp.php';

include_once '../Modelo/EmpleadoDto.php';
include_once '../Modelo/EmpresaDto.php';
include_once '../Modelo/ParticularDto.php';
session_start();

if ($_SESSION["tipo"] == 2) {

    $dtoEmpleado = $_SESSION["Empleado"];
    $nombreEmpleado = $_POST["txtNombreEmpleado"];
    $rut = $_POST["txtRutEmpleado"];
    $dtoEmpleado->setNombreEmpleado($nombreEmpleado);
    $pass = $dtoEmpleado->getPasswordEmpleado();


    if (EmpleadoDaoImp::ActualizarDatos($dtoEmpleado)) {
        echo "<script> alert('Datos Actualizados') </script>";
    } else {
        echo "<script> alert('No se actualizaron datos') </script>";
    }
    include_once 'v_EditarDatosUsuario.php';
}

if ($_SESSION["tipo"] == 1) {
    $dtoEmpresa = $_SESSION["Empresa"];
    $rutEmpresa = $_POST["txtRutEmpresa"];
    $nombre = $_POST["txtNombreEmpresa"];
    $direccion = $_POST["txtDireccionEmpresa"];

    $dtoEmpresa->setNombreEmpresa($nombre);
    $dtoEmpresa->setDireccionEmpresa($direccion);

    if (EmpresaDaoImp::ActualizarDatos($dtoEmpresa)) {
        echo "<script> alert('Datos Actualizados') </script>";
    } else {
        echo "<script> alert('No se actualizaron datos') </script>";
    }
    include_once 'v_EditarDatosUsuario.php';
}

if ($_SESSION["tipo"] == 3) {
    $dtoParticular = $_SESSION["Particular"];
    $rutParticular = $_POST["txtRutParticular"];
    $nombreParticular = $_POST["txtNombreParticular"];
    $direccionParticular = $_POST["txtDireccionParticular"];
    $emailParticular = $_POST["txtEmailParticular"];

    $dtoParticular->setNombreParticular($nombreParticular);
    $dtoParticular->setDireccionParticular($direccionParticular);
    $dtoParticular->setEmailParticular($emailParticular);

    if (ParticularDaoImp::ActualizarDatos($dtoParticular)) {
        echo "<script> alert('Datos Actualizados') </script>";
    } else {
        echo "<script> alert('No se actualizaron datos') </script>";
    }
    include_once 'v_EditarDatosUsuario.php';
}