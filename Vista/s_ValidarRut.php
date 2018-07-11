<?php

include_once '../Controlador/EmpresaDaoImp.php';
include_once '../Controlador/ParticularDaoImp.php';

if (isset($_POST["txtRutEmpresa"])) {
    $data = $_POST["txtRutEmpresa"];

    if (EmpresaDaoImp::validarRut($data)) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST["txtRutParticular"])) {
    $data = $_POST["txtRutParticular"];

    if (ParticularDaoImp::validarRut($data)) {
        echo 1;
    } else {
        echo 0;
    }
}