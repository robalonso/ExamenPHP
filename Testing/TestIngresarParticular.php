<?php

include_once '../Modelo/ParticularDto.php';
include_once '../Modelo/TelefonoDto.php';
include_once '../Controlador/ParticularDaoImp.php';
include_once '../Controlador/TelefonoDaoImp.php';

$dto = new ParticularDto();
$telefono = new TelefonoDto();

$rut = "111111";
$pass = "123456";
$nombre = "Jose Sanchez";
$direccion = "La Calle 025";
$email = "jsanchez@gmail.com";
$activo = 1;

$numero = "7778854";

$dto->setRutParticular($rut);
$dto->setPasswordParticular($pass);
$dto->setNombreParticular($nombre);
$dto->setDireccionParticular($direccion);
$dto->setEmailParticular($email);
$dto->setActivo($activo);

$telefono->setNumero($numero);
//$telefono->setCodigoParticular(2);
//
//TelefonoDaoImp::Agregar($telefono);


if (ParticularDaoImp::Agregar($dto)) {
    $codigo = $dto->getCodigoParticular();
    $telefono->setCodigoParticular($codigo);
    TelefonoDaoImp::Agregar($telefono);
    echo "Agregado con éxito";
} else {
    echo "No se pudo agregar";
}

