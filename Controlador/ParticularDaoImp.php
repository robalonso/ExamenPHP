<?php

include_once '../Controlador/ClasePdo.php';

class ParticularDaoImp {

    public static function Agregar($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO particular (rutParticular, passwordParticular, nombreParticular, direccionParticular, emailParticular, activo) "
                    . "VALUES (?,?,?,?,?,?)");
            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $pass);
            $stmt->bindParam(3, $nombre);
            $stmt->bindParam(4, $direccion);
            $stmt->bindParam(5, $email);
            $stmt->bindParam(6, $activo);

            $rut = $dto->getRutParticular();
            $pass = $dto->getPasswordParticular();
            $nombre = $dto->getNombreParticular();
            $direccion = $dto->getDireccionParticular();
            $email = $dto->getEmailParticular();
            $activo = $dto->getActivo();

            $pdo->beginTransaction();
            $stmt->execute();
            $id = $pdo->lastInsertId(); //asignar id antes del commit
            $pdo->commit();
            
            return $id;
        } catch (Exception $ex) {
            $pdo->rollBack();
            echo "Error al agregar " . $ex->getMessage();
        }
    }

}
