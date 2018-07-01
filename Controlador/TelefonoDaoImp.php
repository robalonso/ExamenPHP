<?php
include_once '../Modelo/TelefonoDto.php';
include_once './ClasePdo.php';

class TelefonoDaoImp {
   
    public static function Agregar($dto){
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO telefono (numero, codigoParticular) VALUES (?,?)");
            $stmt->bindParam(1, $numero);
            $stmt->bindParam(2, $codigoParticular);
            
            $numero = $dto->getNumero();
            $codigoParticular = $dto->getCodigoParticular();
            
            $stmt->execute();
            
            if($stmt->rowCount()>0){
                return true;
            }
            $pdo = null;
        } catch (Exception $ex) {

        }
    }
}
