<?php

class AnalisisMuestra {
    private $idAnalisis;
    private $fechaRecepcion;
    private $temperaturaMuestra;
    private $cantidad;
    private $empresa_codigoEmpresa;
    private $particular_codigoParticular;
    private $procesado;
    private $rutEmpleadoRecibe;
            
    function __construct() {
        $this->idAnalisis = "";
        $this->fechaRecepcion = "";
        $this->temperaturaMuestra = "";
        $this->cantidad = "";
        $this->empresa_codigoEmpresa = 0;
        $this->particular_codigoParticular = 0;
        $this->procesado = 0;
        $this->rutEmpleadoRecibe = "";
    }
    
    function getEmpresa_codigoEmpresa() {
        return $this->empresa_codigoEmpresa;
    }

    function getParticular_codigoParticular() {
        return $this->particular_codigoParticular;
    }

    function getProcesado() {
        return $this->procesado;
    }

    function getRutEmpleadoRecibe() {
        return $this->rutEmpleadoRecibe;
    }

    function setEmpresa_codigoEmpresa($empresa_codigoEmpresa) {
        $this->empresa_codigoEmpresa = $empresa_codigoEmpresa;
    }

    function setParticular_codigoParticular($particular_codigoParticular) {
        $this->particular_codigoParticular = $particular_codigoParticular;
    }

    function setProcesado($procesado) {
        $this->procesado = $procesado;
    }

    function setRutEmpleadoRecibe($rutEmpleadoRecibe) {
        $this->rutEmpleadoRecibe = $rutEmpleadoRecibe;
    }

        
    function getIdAnalisis() {
        return $this->idAnalisis;
    }

    function getFechaRecepcion() {
        return $this->fechaRecepcion;
    }

    function getTemperaturaMuestra() {
        return $this->temperaturaMuestra;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function setIdAnalisis($idAnalisis) {
        $this->idAnalisis = $idAnalisis;
    }

    function setFechaRecepcion($fechaRecepcion) {
        $this->fechaRecepcion = $fechaRecepcion;
    }

    function setTemperaturaMuestra($temperaturaMuestra) {
        $this->temperaturaMuestra = $temperaturaMuestra;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }



}
