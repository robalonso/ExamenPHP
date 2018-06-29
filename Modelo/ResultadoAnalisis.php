<?php


class ResultadoAnalisis {
    private $idTipoAnalisis;
    private $idAnalisisMuestra;
    private $fechaRegistro;
    private $ppm;
    private $estado;
    
    function __construct() {
        $this->idTipoAnalisis = "";
        $this->idAnalisisMuestra = "";
        $this->fechaRegistro = "";
        $this->ppm = 0;
        $this->estado = false;
        
    }
    
    function getIdTipoAnalisis() {
        return $this->idTipoAnalisis;
    }

    function getIdAnalisisMuestra() {
        return $this->idAnalisisMuestra;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getPpm() {
        return $this->ppm;
    }

    function getEstado() {
        return $this->estado;
    }

    function setIdTipoAnalisis($idTipoAnalisis) {
        $this->idTipoAnalisis = $idTipoAnalisis;
    }

    function setIdAnalisisMuestra($idAnalisisMuestra) {
        $this->idAnalisisMuestra = $idAnalisisMuestra;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setPpm($ppm) {
        $this->ppm = $ppm;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }



    
}
