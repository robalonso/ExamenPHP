<?php


class TipoAnalisisDto {
    private $idTipoAnalisis;
    private $nombre;
    
    function __construct() {
        $this->idTipoAnalisis = 0;
        $this->nombre = "";
    }
    
    function getIdTipoAnalisis() {
        return $this->idTipoAnalisis;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdTipoAnalisis($idTipoAnalisis) {
        $this->idTipoAnalisis = $idTipoAnalisis;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }



}
