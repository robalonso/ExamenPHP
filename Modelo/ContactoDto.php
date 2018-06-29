<?php

class ContactoDto {
    private $rutContacto;
    private $nombreContacto;
    private $emailContacto;
    private $codigoEmpresa;
    
    function __construct() {
        $this->rutContacto = "";
        $this->nombreContacto = "";
        $this->emailContacto = "";
        $this->codigoEmpresa = 0;
    }
    
    function getRutContacto() {
        return $this->rutContacto;
    }

    function getNombreContacto() {
        return $this->nombreContacto;
    }

    function getEmailContacto() {
        return $this->emailContacto;
    }

    function setRutContacto($rutContacto) {
        $this->rutContacto = $rutContacto;
    }

    function setNombreContacto($nombreContacto) {
        $this->nombreContacto = $nombreContacto;
    }

    function setEmailContacto($emailContacto) {
        $this->emailContacto = $emailContacto;
    }
    
    function getCodigoEmpresa() {
        return $this->codigoEmpresa;
    }





}
