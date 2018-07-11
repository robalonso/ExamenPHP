<?php

session_start();

include_once '../Controlador/EmpresaDaoImp.php';
include_once '../Controlador/ParticularDaoImp.php';
include_once '../Controlador/EmpleadoDaoImp.php';

include_once '../Modelo/EmpleadoDto.php';
include_once '../Modelo/EmpresaDto.php';
include_once '../Modelo/ParticularDto.php';

$daoEmpresa = new EmpresaDaoImp();
$daoEmpleado = new EmpleadoDaoImp();
$daoParticular = new ParticularDaoImp();

$rut = $_POST["txtRut"];
$pass = $_POST["txtPass"];


if ($daoEmpresa->Login($rut, $pass)) {//validar usuario | contraseña
    if ($daoEmpresa->Activo($rut)) { //validar que se encuentre activo el usuario
        $dtoEmpresa = $daoEmpresa->getUsuario($rut);
        $_SESSION["tipo"] = 1; //tipo 1 = empresa
        $_SESSION["Empresa"] = $dtoEmpresa;
        session_commit();
        include_once 'v_Inicio.php';
    } else {
        include_once 'v_Login.php';
        echo '<script>alert("la empresa no se encuentra activo!")</script>';
    }
} else if ($daoEmpleado->Login($rut, $pass)) {//validar usuario | contraseña
    if ($daoEmpleado->Activo($rut)) {//validar que se encuentre activo el usuario
        $dtoEmpleado = $daoEmpleado->getUsuario($rut);

        $_SESSION["tipo"] = 2; //tipo 2 = empleado
        $_SESSION["Empleado"] = $dtoEmpleado;
        session_commit();
        include_once 'v_Inicio.php';
    } else {
        include_once 'v_Login.php';
        echo '<script>alert("el empleado no se encuentra activo!")</script>';
    }
} else if ($daoParticular->Login($rut, $pass)) {//validar usuario | contraseña
    if ($daoParticular->Activo($rut)) {//validar que se encuentre activo el usuario
        $dtoParticular = $daoParticular->getUsuario($rut);
        $_SESSION["tipo"] = 3; //tipo 3 = particular
        $_SESSION["Particular"] = $dtoParticular;
        session_commit();
        include_once 'v_Inicio.php';
    } else {
        include_once 'v_Login.php';
        echo '<script>alert("el usuario no se encuentra activo!")</script>';
    }
} else {
    include_once 'v_Login.php';
    echo '<script>alert("usuario o contraseña incorrectos!")</script>';
}

include_once 'v_EditarDatosUsuario.php';

