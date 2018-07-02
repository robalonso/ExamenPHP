<?php

include_once '../Controlador/EmpresaDaoImp.php';
include_once '../Controlador/ContactoDaoImp.php';
include_once '../Modelo/EmpresaDto.php';
include_once '../Modelo/ContactoDto.php';

$empresa = new EmpresaDto();
$contacto = new ContactoDto();

//poblar objeto empresa
$empresa->setRutEmpresa($_POST["txtRutEmpresa"]);
$empresa->setNombreEmpresa($_POST["txtNombreEmpresa"]);
$empresa->setPasswordEmpresa($_POST["txtPassEmpresa"]);
$empresa->setDireccionEmpresa($_POST["txtDireccionEmpresa"]);
$empresa->setActivo(1);

//agregar empresa y retornar codigo del registro
$daoEmp = new EmpresaDaoImp();
$codigoEmpresa = $daoEmp->Agregar($empresa);

if ($codigoEmpresa != 0) {
    
    $contacto->setRutContacto($_POST["txtRutContacto"]);
    $contacto->setNombreContacto($_POST["txtNombreContacto"]);
    $contacto->setTelefonoContacto($_POST["txtTelefono"]);
    $contacto->setEmailContacto($_POST["txtEmail"]);
    $contacto->setCodigoEmpresa($codigoEmpresa);
    
    $daoCon = new ContactoDaoImp();
    
    if ($daoCon->Agregar($contacto)) {
        
        include_once 'v_RegistroCliente.php';
        echo '<script>alert("exito al agregar!")</script>';
    } else {        
        include_once 'v_RegistroCliente.php';
        echo '<script>alert("error al agregar!")</script>';
    }
}