<?php

include_once '../Controlador/ClasePdo.php';
include_once '../Modelo/ParticularDto.php';

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

    public static function Login($rut, $pass) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM particular WHERE rutParticular = ? AND passwordParticular = ?");

            $pass1 = utf8_decode($pass);

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $pass1);

            $pdo->beginTransaction();
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $pdo->commit();

            foreach ($resultado as $value) {
                if ($value["rutParticular"] === $rut && $value["passwordParticular"] === $pass) {
                    return true;
                } else {
                    return false;
                }
            }

            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al validar un usuario particular. Trace: " . $ex->getTraceAsString());
        }
    }

    public static function Activo($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM particular WHERE rutParticular = ?");

            $stmt->bindParam(1, $rut);

            $pdo->beginTransaction();
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $pdo->commit();

            foreach ($resultado as $value) {
                if ($value["rutParticular"] === $rut && $value["activo"] == 1) {
                    return true;
                } else {
                    return false;
                }
            }

            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al validar si esta activo un usuario particular. Trace: " . $ex->getTraceAsString());
        }
    }

    public static function getUsuario($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM particular WHERE rutParticular = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new ParticularDto();
                $dto->setCodigoParticular($value["codigoParticular"]);
                $dto->setRutParticular($value["rutParticular"]);
                $dto->setNombreParticular($value["nombreParticular"]);
                $dto->setDireccionParticular($value["ap_materno"]);
                $dto->setEmailParticular($value["ap_paterno"]);
                $dto->setActivo($value["activo"]);
                //no seteamos contraseña
                return $dto;
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al retornar un usuario particular. Trace: " . $ex->getTraceAsString());
        }
        return null;
    }

    public static function buscarPorCodigo($codigo) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM particular WHERE codigoParticular = ?");
            $stmt->bindParam(1, $codigo);
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new ParticularDto();
                $dto->setCodigoParticular($value["codigoParticular"]);
                $dto->setRutParticular($value["rutParticular"]);
                $dto->setNombreParticular($value["nombreParticular"]);
                $dto->setDireccionParticular($value["direccionParticular"]);
                $dto->setEmailParticular($value["emailParticular"]);
                //no seteamos contraseña
                return $dto;
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al retornar un usuario Empresa: " . $ex->getTraceAsString());
        }
        return null;
    }

}
