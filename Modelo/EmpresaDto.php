<?php

class EmpresaDto {

    private $codigoEmpresa;
    private $rutEmpresa;
    private $nombreEmpresa;
    private $passwordEmpresa;
    private $direccionEmpresa;
    private $activo;

    function __construct() {
        $this->codigoEmpresa = 0;
        $this->rutEmpresa = "";
        $this->nombreEmpresa = "";
        $this->passwordEmpresa = "";
        $this->direccionEmpresa = "";
        $this->activo = 1;
    }

    function getCodigoEmpresa() {
        return $this->codigoEmpresa;
    }

    function getRutEmpresa() {
        return $this->rutEmpresa;
    }

    function getNombreEmpresa() {
        return $this->nombreEmpresa;
    }

    function getPasswordEmpresa() {
        return $this->passwordEmpresa;
    }

    function getDireccionEmpresa() {
        return $this->direccionEmpresa;
    }

    function setCodigoEmpresa($codigoEmpresa) {
        $this->codigoEmpresa = $codigoEmpresa;
    }

    function setRutEmpresa($rutEmpresa) {
        $this->rutEmpresa = $rutEmpresa;
    }

    function setNombreEmpresa($nombreEmpresa) {
        $this->nombreEmpresa = $nombreEmpresa;
    }

    function setPasswordEmpresa($passwordEmpresa) {
        $this->passwordEmpresa = $passwordEmpresa;
    }

    function setDireccionEmpresa($direccionEmpresa) {
        $this->direccionEmpresa = $direccionEmpresa;
    }

    function getActivo() {
        return $this->activo;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

}
