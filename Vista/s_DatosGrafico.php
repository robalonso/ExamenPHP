<?php

include_once '../Controlador/ResultadoAnalisisDaoImp.php';

$daoResultados = new ResultadoAnalisisDaoImp();

if (isset($_POST["txtIdMuestra"])) {
    $idMuestra = $_POST["txtIdMuestra"];
    $resultados = $daoResultados->ResultadosAnalisis($idMuestra);
    
    echo json_encode($resultados);   
}
