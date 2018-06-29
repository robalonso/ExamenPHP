<?php


class TelefonoDto {
    private $idTelefono;
    private $numero;
    private $codigoParticular;
    
    function __construct() {
        $this->idTelefono = "";
        $this->numero = "";
        $this->codigoParticular = "";
    }
    
    function getIdTelefono() {
        return $this->idTelefono;
    }

    function getNumero() {
        return $this->numero;
    }

    function getCodigoParticular() {
        return $this->codigoParticular;
    }

    function setIdTelefono($idTelefono) {
        $this->idTelefono = $idTelefono;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setCodigoParticular($codigoParticular) {
        $this->codigoParticular = $codigoParticular;
    }



    
}
