<?php

include_once '../Controlador/EmpresaDaoImp.php';
include_once '../Controlador/ParticularDaoImp.php';


if (isset($_POST["txtCodigo"])) {
    $data = $_POST["txtCodigo"];
    $dtoEmp = null;
    $dtoPar = null;
    
    if (substr($data, 0, 3) == "EMP") {
        $dtoEmp = EmpresaDaoImp::buscarPorCodigo(substr($data, 3));
    }
    if (substr($data, 0, 3) == "PAR") {
        $dtoPar = ParticularDaoImp::buscarPorCodigo(substr($data, 3));
    }

    if ($dtoEmp != NULL) {
        header('Content-Type: application/json');
        echo json_encode(array("rut" => $dtoEmp->getRutEmpresa(), "nombre" => $dtoEmp->getNombreEmpresa()));
    } else
    if ($dtoPar != NULL) {
        header('Content-Type: application/json');
        echo json_encode(array("rut" => $dtoPar->getRutParticular(), "nombre" => $dtoPar->getNombreParticular()));
    } else {
        echo 0;
    }
}