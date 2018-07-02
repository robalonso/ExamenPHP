<?php

include_once '../Modelo/ParticularDto.php';
include_once '../Modelo/TelefonoDto.php';
include_once '../Controlador/ParticularDaoImp.php';
include_once '../Controlador/TelefonoDaoImp.php';

$dto = new ParticularDto();
$telefono = new TelefonoDto();

//poblar objeto particular
$dto->setRutParticular($_POST["txtRut"]);
$dto->setPasswordParticular($_POST["txtPass"]);
$dto->setNombreParticular($_POST["txtNombre"]);
$dto->setDireccionParticular($_POST["txtDireccion"]);
$dto->setEmailParticular($_POST["txtEmail"]);
$dto->setActivo(1);

//agregar particular y retornar codigo de registro agregado
$daoPart = new ParticularDaoImp();
$codigo = $daoPart->Agregar($dto);
echo $codigo;

if ($codigo != 0) {
    //poblar datos de telefono
    $telefono->setNumero($_POST["txtTelefono"]);
    $telefono->setCodigoParticular($codigo);

    //agregar telefono
    $daoTel = new TelefonoDaoImp();
    if ($daoTel->Agregar($telefono)) {
        include_once 'v_RegistroClientePersona.php';
        echo '<script>alert("exito al agregar!")</script>';
    } else {        
        include_once 'v_RegistroClientePersona.php';
        echo '<script>alert("error al agregar!")</script>';
    }
}




