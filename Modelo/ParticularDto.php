<?php


class ParticularDto {
    private $codigoParticular;
    private $rutParticular;
    private $passwordParticular;
    private $nombreParticular;
    private $direccionParticular;
    private $emailParticular;
    
    function __construct() {
        $this->codigoParticular = 0;
        $this->rutParticular = "";
        $this->passwordParticular = "";
        $this->nombreParticular = "";
        $this->direccionParticular = "";
        $this->emailParticular = "";
    }
    
    function getCodigoParticular() {
        return $this->codigoParticular;
    }

    function getRutParticular() {
        return $this->rutParticular;
    }

    function getPasswordParticular() {
        return $this->passwordParticular;
    }

    function getNombreParticular() {
        return $this->nombreParticular;
    }

    function getDireccionParticular() {
        return $this->direccionParticular;
    }

    function getEmailParticular() {
        return $this->emailParticular;
    }

    function setCodigoParticular($codigoParticular) {
        $this->codigoParticular = $codigoParticular;
    }

    function setRutParticular($rutParticular) {
        $this->rutParticular = $rutParticular;
    }

    function setPasswordParticular($passwordParticular) {
        $this->passwordParticular = $passwordParticular;
    }

    function setNombreParticular($nombreParticular) {
        $this->nombreParticular = $nombreParticular;
    }

    function setDireccionParticular($direccionParticular) {
        $this->direccionParticular = $direccionParticular;
    }

    function setEmailParticular($emailParticular) {
        $this->emailParticular = $emailParticular;
    }



}
