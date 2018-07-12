<?php

include_once '../Controlador/EmpleadoDaoImp.php';
include_once '../Controlador/CategoriaDaoImp.php';
include_once '../Modelo/EmpleadoDto.php';

$dto = new EmpleadoDto();

$pass = $_POST["txtPassword"];
$passC = $_POST["txtConfirmarPass"];
$rutEmpleado = $_POST["txtRut"];
$nombreEmpleado = $_POST["txtNombre"];

if (!EmpleadoDaoImp::ValidarKey($rutEmpleado)) {
    $dto->setRutEmpleado($rutEmpleado);

    if ($pass == $passC) {

        $dto->setPasswordEmpleado($pass);
        $dto->setNombreEmpleado($nombreEmpleado);
        $text = $_POST["dropCategoria"];
        $dto->setIdCategoria(CategoriaDaoImp::TextToId($text));


        if (isset($_POST["checkActivo"])) {
            $dto->setActivo(1);
        } else {
            $dto->setActivo(0);
        }

        if (EmpleadoDaoImp::AgregarEmpleado($dto)) {
            echo "<script> alert('Empleado agregado') </script>";
            include_once 'v_MostrarEmpleados.php';
        }
    } else {

        echo "<script> alert('Las contraseñas no coinciden') </script>";
        echo "<script> alert('No se pudo agregar') </script>";
        include_once 'v_MostrarEmpleados.php';
    }
} else {
    echo "<script> alert('El rut ya existe en el sistema')</script>";
    echo "<script> alert('No se pudo agregar') </script>";
    include_once 'v_MostrarEmpleados.php';
}



