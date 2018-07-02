<?php

include_once '../Controlador/AnalisisMuestraDaoImp.php';
include_once '../Modelo/AnalisisMuestra.php';

$dto = new AnalisisMuestra();

// Setteo de campos
$dto->setFechaRecepcion($_POST["dateFecha"]);
$dto->setCantidad($_POST["txtCantidad"]);
$dto->setTemperaturaMuestra($_POST["txtTemperatura"]);

// Campos forzados para prueba de inserción
$dto->setEmpresa_codigoEmpresa(null);
$dto->setParticular_codigoParticular(1);
$dto->setProcesado(0);
$dto->setRutEmpleadoRecibe("65468318");

//confirmación
if(AnalisisMuestraDaoImp::AgregarMuestra($dto)){
    echo "<script>alert('Muestra agregada al sistema')</script>";
}else{
    echo "<script> alert('No se pudo agregar muestra')</script>";
}

include_once 'v_AgregarMuestra.php';



