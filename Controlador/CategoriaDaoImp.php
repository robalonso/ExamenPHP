<?php

include_once 'ClasePdo.php';

class CategoriaDaoImp {

    static function ListarTodas() {
        $categorias = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT descripcion FROM categoria");
            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $categoria) {
                $categorias->append($categoria['descripcion']);
            }
            return $categorias;
        } catch (Exception $ex) {
            echo "Error al listar " . $ex->getMessage();
        }
    }

    static function TextToId($text) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT idCategoria FROM categoria WHERE descripcion=?");
            $texto = utf8_decode($text);
            $stmt->bindParam(1, $texto);
            $stmt->execute();

            $res = $stmt->fetchAll();

            foreach ($res as $nombre) {
                return $nombre['idCategoria'];
            }
        } catch (Exception $ex) {
            echo "Error al convertir " . $ex->getMessage();
        }
        return 0;
    }

}
