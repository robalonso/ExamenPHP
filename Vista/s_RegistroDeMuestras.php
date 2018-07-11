<?php

session_start();

include_once '../Controlador/AnalisisMuestraDaoImp.php';
include_once '../Modelo/ResultadoAnalisis.php';
include_once '../Controlador/ResultadoAnalisisDaoImp.php';
include_once '../Modelo/EmpleadoDto.php';

//obtener el rut del empleado logeado.
//$empleado = $_SESSION["Empleado"];

$resultado = new ResultadoAnalisis();

$idMuestra = $_POST["txtCodigoMuestra"];
$resultado->setIdAnalisisMuestra($idMuestra);
$resultado->setEstado(true); // 1 = procesado
//$resultado->setRutEmpleadoAnalista($empleado->getRutEmpleado());
$resultado->setRutEmpleadoAnalista("182156121");

//por cada tipo de examen existente se crea un resultadoAnalisis
if (isset($_POST["txtPPM_Micotoxinas"])) {
    $resultado->setIdTipoAnalisis(1);
    $resultado->setPpm($_POST["txtPPM_Micotoxinas"]);

    $daoRes = new resultadoAnalisisDaoImp();
    $daoRes->AgregarResultado($resultado);
}
if (isset($_POST["txtPPM_Metales"])) {
    $resultado->setIdTipoAnalisis(2);
    $resultado->setPpm($_POST["txtPPM_Metales"]);
    $daoRes = new resultadoAnalisisDaoImp();
    $daoRes->AgregarResultado($resultado);
}
if (isset($_POST["txtPPM_Plaguicidas"])) {
    $resultado->setIdTipoAnalisis(3);
    $resultado->setPpm($_POST["txtPPM_Plaguicidas"]);
    $daoRes = new resultadoAnalisisDaoImp();
    $daoRes->AgregarResultado($resultado);
}
if (isset($_POST["txtPPM_Marea"])) {
    $resultado->setIdTipoAnalisis(4);
    $resultado->setPpm($_POST["txtPPM_Marea"]);
    $daoRes = new resultadoAnalisisDaoImp();
    $daoRes->AgregarResultado($resultado);
}
if (isset($_POST["txtPPM_Bacterias"])) {
    $resultado->setIdTipoAnalisis(5);
    $resultado->setPpm($_POST["txtPPM_Bacterias"]);
    $daoRes = new resultadoAnalisisDaoImp();
    $daoRes->AgregarResultado($resultado);
}

$daoAnalisis = new AnalisisMuestraDaoImp();
if ($daoAnalisis->CambiarEstado($idMuestra)) {
    session_commit();
    include_once 'v_MuestrasPorProcesar.php';
    echo "<script>procesado()</script>";
}

