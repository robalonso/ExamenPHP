<?php

include_once '../Modelo/ParticularDto.php';
include_once '../Modelo/TelefonoDto.php';
include_once '../Controlador/ParticularDaoImp.php';
include_once '../Controlador/TelefonoDaoImp.php';

$dto = new ParticularDto();
$telefono = new TelefonoDto();

$dto->setRutParticular($_POST["txtRut"]);
$dto->setPasswordParticular($_POST["txtPass"]);
$dto->setNombreParticular($_POST["txtNombre"]);
$dto->setDireccionParticular($_POST["txtDireccion"]);
$dto->setEmailParticular($_POST["txtEmail"]);
$dto->setActivo(1);

$telefono->setNumero($_POST["txtTelefono"]);


if(ParticularDaoImp::Agregar($dto)){
    $telefono->setCodigoParticular($dto->getCodigoParticular());
    echo "<script> alert('Agregados')</script>";
}else{
     echo "<script> alert('No se agregó')</script>";
}