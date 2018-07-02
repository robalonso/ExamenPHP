<?php

include_once 'ClasePdo.php';
include_once '../Modelo/AnalisisMuestra.php';
class AnalisisMuestraDaoImp {
    
    public static function AgregarMuestra($dto){
        try{
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO analisismuestra (fechaRecepcion, "
                    . "temperaturaMuestra, cantidadMuestra, empresa_codigoEmpresa, particular_codigoParticular, procesado, rutEmpleadoRecibe) VALUES (?,?,?,?,?,?,?)");
            
            $stmt->bindParam(1, $fechaRecepcion);
            $stmt->bindParam(2, $temperatura);
            $stmt->bindParam(3, $cantidad);
            $stmt->bindParam(4, $empresa);
            $stmt->bindParam(5, $particular);
            $stmt->bindParam(6, $procesado);
            $stmt->bindParam(7, $empleado);
            
            $fechaRecepcion = $dto->getFechaRecepcion();
            $temperatura = $dto->getTemperaturaMuestra();
            $cantidad = $dto->getCantidad();
            $empresa = $dto->getEmpresa_codigoEmpresa();
            $particular = $dto->getParticular_codigoParticular();
            $procesado = $dto->getProcesado();
            $empleado = $dto->getRutEmpleadoRecibe();
            
            $pdo->beginTransaction();
            $stmt->execute();
            $pdo->commit();
            
            if($stmt->rowCount()>0){
                return true;
            }
        } catch (Exception $ex) {
            echo "Error ".$ex->getMessage();
        }
    }
}
