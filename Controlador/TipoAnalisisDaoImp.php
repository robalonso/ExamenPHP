<?php

include_once './ClasePdo.php';

class TipoAnalisisDaoImp {
    public static function ListarTodos(){
        $analisis = new ArrayObject();
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT DISTINCT descripcion FROM tipoanalisis");
            $stmt->execute();
            
            $rs = $stmt->fetchAll();
            foreach ($rs as $value) {
                $analisis->append($value["descripcion"]);
            }
            return $analisis;
        } catch (Exception $ex) {
                echo "Error al listar ".$ex->getMessage();
        }
    }
}
