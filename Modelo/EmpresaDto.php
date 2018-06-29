<?php


class EmpresaDto {
    private $rutEmpresa;
    private $nombreEmpresa;
    private $passwordEmpresa;
    private $direccionEmpresa;
    
    function __construct() {
        $this->rutEmpresa = "";
        $this->nombreEmpresa = "";
        $this->passwordEmpresa = "";
        $this->direccionEmpresa = "";
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


}
