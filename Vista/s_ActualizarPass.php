<?php

include_once '../Modelo/EmpleadoDto.php';
include_once '../Controlador/EmpleadoDaoImp.php';

$pass = $_POST["nueva"];
$confirmar = $_POST["confirmar"];
$rut = $_POST["rut"];




if ($pass == $confirmar) {
    if (EmpleadoDaoImp::ActualizarPass($pass, $rut)) {
        echo json_encode(array("d" => '1')); //true
    } else {
        echo json_encode(array("d" => '0')); //false
    }
} else {
    echo json_encode(array("d" => '2')); //no coinciden
}



    