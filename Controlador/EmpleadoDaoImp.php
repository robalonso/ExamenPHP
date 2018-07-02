<?php

include_once 'ClasePdo.php';
include_once '../Modelo/EmpleadoDto.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpleadoDaoImp
 *
 * @author Daniel GS
 */
class EmpleadoDaoImp {

    public static function Login($rut, $pass) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empleado WHERE rutEmpleado = ? AND passwordEmpleado = ?");

            $pass1 = utf8_decode($pass);

            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $pass1);

            $pdo->beginTransaction();
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            $pdo->commit();

            foreach ($resultado as $value) {
                if ($value["rutEmpleado"] === $rut && $value["passwordEmpleado"] === $pass && $value["activo"] == 1) {
                    return true;
                } else {
                    return false;
                }
            }

            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al validar un usuario Empleado. Trace: " . $ex->getTraceAsString());
        }
    }

    public static function Activo($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empleado WHERE rutEmpleado = ?");

            $stmt->bindParam(1, $rut);

            $pdo->beginTransaction();
            $stmt->execute();
            $resultado = $stmt->fetchAll();


            foreach ($resultado as $value) {
                if ($value["rutEmpleado"] === $rut && $value["activo"]) {
                    $pdo->commit();
                    return true;
                } else {
                    $pdo->commit();
                    return false;
                }
            }

            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al validar si esta activo un usuario Empleado. Trace: " . $ex->getTraceAsString());
        }
    }

    public static function getUsuario($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empleado WHERE rutEmpleado = ?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            $resultado = $stmt->fetchAll();

            foreach ($resultado as $value) {
                $dto = new EmpleadoDto();
                $dto->setRutEmpleado($value["rutEmpleado"]);
                $dto->setNombreEmpleado($value["nombreEmpleado"]);
                $dto->setIdCategoria($value["idCategoria"]);
                $dto->setActivo($value["activo"]);
                //no seteamos contraseña
                return $dto;
            }
            $pdo = null;
        } catch (Exception $ex) {
            throw new Exception("Error al retornar un usuario Empleado: " . $ex->getTraceAsString());
        }
        return null;
    }

}
