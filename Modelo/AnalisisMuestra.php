<?php

class AnalisisMuestra {
    private $idAnalisis;
    private $fechaRecepcion;
    private $temperaturaMuestra;
    private $cantidad;
    
    function __construct() {
        $this->idAnalisis = "";
        $this->fechaRecepcion = "";
        $this->temperaturaMuestra = "";
        $this->cantidad = "";
        
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
