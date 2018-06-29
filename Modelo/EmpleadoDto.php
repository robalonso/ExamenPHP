<?php


class EmpleadoDto {
    private $rutEmpleado;
    private $nombreEmpleado;
    private $passwordEmpleado;
    private $idCategoria;
    
    function __construct() {
        $this->rutEmpleado = "";
        $this->nombreEmpleado = "";
        $this->passwordEmpleado = "";
        $this->idCategoria = 0;
    }
    
    function getRutEmpleado() {
        return $this->rutEmpleado;
    }

    function getNombreEmpleado() {
        return $this->nombreEmpleado;
    }

    function getPasswordEmpleado() {
        return $this->passwordEmpleado;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function setRutEmpleado($rutEmpleado) {
        $this->rutEmpleado = $rutEmpleado;
    }

    function setNombreEmpleado($nombreEmpleado) {
        $this->nombreEmpleado = $nombreEmpleado;
    }

    function setPasswordEmpleado($passwordEmpleado) {
        $this->passwordEmpleado = $passwordEmpleado;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }



}
