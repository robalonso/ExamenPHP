<?php

include_once '../Controlador/EmpleadoDaoImp.php';
include_once '../Controlador/CategoriaDaoImp.php';
include_once '../Modelo/EmpleadoDto.php';

$dto = new EmpleadoDto();

$rut = $_POST["txtRut"];
$nombre = $_POST["txtNombre"];
$pass = $_POST["txtPass"];
$confirmar = $_POST["txtConfirmarPass"];
$categoria = $_POST["dropCategoria"];

$dto->setNombreEmpleado($nombre);
$dto->setRutEmpleado($rut);

if ($pass == $confirmar) {
    $dto->setPasswordEmpleado($pass);
} else {
    echo "<script>alert('Las contraseñas no coinciden')</script>";
}

$dto->setIdCategoria(CategoriaDaoImp::TextToId($categoria));

if (EmpleadoDaoImp::Actualizar($dto)) {
    echo "<script>alert('Los datos del empleado han sido actualizados')</script>";
} else {
    echo "<script>alert('El empleado no se pudo actualizar, revise los datos ingresados')</script>";
}

include_once 'v_MostrarEmpleados.php';

