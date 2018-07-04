<?php

include_once '../Controlador/AnalisisMuestraDaoImp.php';
include_once '../Modelo/AnalisisMuestra.php';
include_once '../Controlador/EmpresaDaoImp.php';
include_once '../Controlador/ParticularDaoImp.php';

$dto = new AnalisisMuestra();

// Setteo de campos
$dto->setFechaRecepcion($_POST["dateFecha"]);
$dto->setCantidad($_POST["txtCantidad"]);
$dto->setTemperaturaMuestra($_POST["txtTemperatura"]);

if (isset($_POST["chkMicotoxinas"])) {
    $dto->setA_micotoxinas(true);
}
if (isset($_POST["chkMetales"])) {
    $dto->setA_metales(true);
}
if (isset($_POST["chkPlaguicidas"])) {
    $dto->setA_plagicidas(true);
}
if (isset($_POST["chkMarea"])) {
    $dto->setA_marea(true);
}
if (isset($_POST["chkBacterias"])) {
    $dto->setA_bacterias(true);
}
$codigo = $_POST["txtCodigoCliente"];


if (substr($codigo, 0, 3) == "EMP") {
    if (EmpresaDaoImp::buscarPorCodigo(substr($codigo, 3)) != null) {
        $dto->setEmpresa_codigoEmpresa(substr($codigo, 3));
    }
}
if (substr($codigo, 0, 3) == "PAR") {
    if (ParticularDaoImp::buscarPorCodigo(substr($codigo, 3)) != null) {
        $dto->setParticular_codigoParticular(substr($codigo, 3));
    }
}

// Campos forzados para prueba de inserción
$dto->setProcesado(0);
$dto->setRutEmpleadoRecibe("65468318");

//confirmación
if (AnalisisMuestraDaoImp::AgregarMuestra($dto)) {
    include_once 'v_RecepcionMuestra.php';
    echo "<script>agregado()</script>";
} else {
    include_once 'v_RecepcionMuestra.php';
    echo "<script>noAgregado()</script>";
}




