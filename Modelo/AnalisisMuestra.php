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
    private $a_micotoxinas;
    private $a_metales;
    private $a_plagicidas;
    private $a_marea;
    private $a_bacterias;

    function __construct() {
        $this->idAnalisis = "";
        $this->fechaRecepcion = "";
        $this->temperaturaMuestra = "";
        $this->cantidad = "";
        $this->empresa_codigoEmpresa = null;
        $this->particular_codigoParticular = null;
        $this->procesado = 0;
        $this->rutEmpleadoRecibe = "";
        $this->a_micotoxinas = false;
        $this->a_metales = false;
        $this->a_plagicidas = false;
        $this->a_marea = false;
        $this->a_plagicidas = false;
        $this->a_bacterias = false;
    }

    //asd
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

    function getA_micotoxinas() {
        return $this->a_micotoxinas;
    }

    function getA_metales() {
        return $this->a_metales;
    }

    function getA_plagicidas() {
        return $this->a_plagicidas;
    }

    function getA_marea() {
        return $this->a_marea;
    }

    function getA_bacterias() {
        return $this->a_bacterias;
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

    function setA_micotoxinas($a_micotoxinas) {
        $this->a_micotoxinas = $a_micotoxinas;
    }

    function setA_metales($a_metales) {
        $this->a_metales = $a_metales;
    }

    function setA_plagicidas($a_plagicidas) {
        $this->a_plagicidas = $a_plagicidas;
    }

    function setA_marea($a_marea) {
        $this->a_marea = $a_marea;
    }

    function setA_bacterias($a_bacterias) {
        $this->a_bacterias = $a_bacterias;
    }
}
