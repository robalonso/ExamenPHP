<?php

include_once '../Modelo/EmpleadoDto.php';
include_once '../Controlador/EmpleadoDaoImp.php';

$dto = new EmpleadoDto();

$rut = "182156121";
$pass = "12345";
$confirmar = "12345";

$dto->setRutEmpleado($rut);
$dto->setPasswordEmpleado($pass);

if ($pass == $confirmar) {
    if (EmpleadoDaoImp::ActualizarPass($dto)) {
        echo "Actualizado";
    }
} else {
    echo "No se actualizó";
}
