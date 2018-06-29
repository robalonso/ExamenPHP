<?php


class CategoriaDto {
    private $idCategoria;
    private $descripcion;
    
    function __construct() {
        $this->idCategoria = 0;
        $this->descripcion = "";
    }
    
    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }



}
