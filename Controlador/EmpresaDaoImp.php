<?php

include_once 'ClasePdo.php';
include_once '../Modelo/EmpresaDto.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpresaDaoImp
 *
 * @author Daniel GS
 */
class EmpresaDaoImp {

    public static function Agregar($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO empresa (rutEmpresa, nombreEmpresa,"
                    . " passwordEmpresa, direccionEmpresa, activo) VALUES (?,?,?,?,?)");
            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $pass);
            $stmt->bindParam(4, $direccion);
            $stmt->bindParam(5, $activo);

            $rut = $dto->getRutEmpresa();
            $nombre = $dto->getNombreEmpresa();
            $pass = $dto->getPasswordEmpresa();
            $direccion = $dto->getDireccionEmpresa();
            $activo = $dto->getActivo();

            $pdo->beginTransaction();
            $stmt->execute();
            $id = $pdo->lastInsertId();
            $pdo->commit();

            $pdo = null;
            return $id;
        } catch (Exception $ex) {
            $pdo->rollBack();
            echo "No se pudo agregar " . $ex->getMessage();
        }
        return 0;
    }

    public static function Login($rut, $pass) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empresa WHERE rutEmpresa = ? AND passwordEmpresa = ?");

            $pass1 = utf8_decode($pass);

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $pass1);

            $pdo->beginTransaction();
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $pdo->commit();

            foreach ($resultado as $value) {
                if ($value["rutEmpresa"] === $rut && $value["passwordEmpresa"] === $pass && $value["activo"] == 1) {
                    return true;
                } else {
                    return false;
                }
            }

            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al validar un usuario empresa. Trace: " . $ex->getTraceAsString());
        }
    }

    public static function Activo($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empresa WHERE rutEmpresa = ?");

            $stmt->bindParam(1, $rut);

            $pdo->beginTransaction();
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $pdo->commit();

            foreach ($resultado as $value) {
                if ($value["rutEmpresa"] === $rut && $value["activo"] == 1) {
                    return true;
                } else {
                    return false;
                }
            }

            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al validar si esta activo un usuario Empresa. Trace: " . $ex->getTraceAsString());
        }
    }

    public static function getUsuario($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empresa WHERE rutEmpresa = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new EmpresaDto();
                $dto->setCodigoEmpresa($value["codigoEmpresa"]);
                $dto->setRutEmpresa($value["rutEmpresa"]);
                $dto->setNombreEmpresa($value["nombreEmpresa"]);
                $dto->setDireccionEmpresa($value["direccionEmpresa"]);
                $dto->setActivo($value["activo"]);
                //no seteamos contraseña
                return $dto;
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al retornar un usuario Empresa: " . $ex->getTraceAsString());
        }
        return null;
    }

    public static function buscarPorCodigo($codigo) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empresa WHERE codigoEmpresa = ?");
            $stmt->bindParam(1, $codigo);
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new EmpresaDto();
                $dto->setCodigoEmpresa($value["codigoEmpresa"]);
                $dto->setRutEmpresa($value["rutEmpresa"]);
                $dto->setNombreEmpresa($value["nombreEmpresa"]);
                $dto->setDireccionEmpresa($value["direccionEmpresa"]);
                $dto->setActivo($value["activo"]);
                //no seteamos contraseña
                return $dto;
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al retornar un usuario Empresa: " . $ex->getTraceAsString());
        }
        return null;
    }

    public static function validarRut($key) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empresa WHERE rutEmpresa = ?");
            $stmt->bindParam(1, $key);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $pdo = null;
                return true;
            }
        } catch (Exception $ex) {
            throw new Exception("Error al validar un rut de empresa. Trace: " . $ex->getTraceAsString());
        }
        $pdo = null;
        return false;
    }
    
            public static function ActualizarDatos($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE empresa SET nombreEmpresa = ?, direccionEmpresa = ? WHERE rutEmpresa =?");

            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $direccion);
            $stmt->bindParam(3, $rut);

            $nombre = $dto->getNombreEmpresa();
            $direccion = $dto->getDireccionEmpresa();
            $rut = $dto->getRutEmpresa();
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo "No se pudo actualizar. StackTrace: " . $ex->getMessage();
        }
    }

}
