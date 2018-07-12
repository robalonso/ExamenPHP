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

    public static function RutToName($rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT nombreEmpleado FROM empleado WHERE rutEmpleado=?");
            $stmt->bindParam(1, $rut);
            $stmt->execute();

            $rs = $stmt->fetchAll();
            foreach ($rs as $empleado) {
                return $empleado['nombreEmpleado'];
            }
        } catch (Exception $ex) {
            echo "Error al convertir " . $ex->getMessage();
        }
    }

    public static function Actualizar($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE empleado "
                    . "SET nombreEmpleado = ?, "
                    . "passwordEmpleado = ?, "
                    . "idCategoria = ?, "
                    . "activo = ? WHERE rutEmpleado = ?");

            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $pass);
            $stmt->bindParam(3, $categoria);
            $stmt->bindParam(4, $activo);
            $stmt->bindParam(5, $rut);

            $nombre = $dto->getNombreEmpleado();
            $pass = $dto->getPasswordEmpleado();
            $categoria = $dto->getIdCategoria();
            $activo = $dto->getActivo();
            $rut = $dto->getRutEmpleado();

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }
            $pdo = null;
        } catch (Exception $ex) {
            echo "Error al actualizar: " . $ex->getMessage();
        }
        return false;
    }

    public static function ListarTodos() {
        $listaEmpleados = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empleado");
            $stmt->execute();

            $rs = $stmt->fetchAll();
            foreach ($rs as $empleado) {
                $dto = new EmpleadoDto();
                $dto->setRutEmpleado($empleado['rutEmpleado']);
                $dto->setNombreEmpleado($empleado['nombreEmpleado']);
                $listaEmpleados->append($dto);
            }
            return $listaEmpleados;
        } catch (Exception $ex) {
            echo "Error al listar: " . $ex->getMessage();
        }
    }

    public static function ActualizarDatos($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE empleado SET nombreEmpleado = ?, idCategoria=? WHERE rutEmpleado =?");

            $stmt->bindParam(1, $nombre);
            $stmt->bindParam(2, $categoria);
            $stmt->bindParam(3, $rut);


            $nombre = $dto->getNombreEmpleado();
            $categoria = $dto->getIdCategoria();
            $rut = $dto->getRutEmpleado();

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo "No se pudo actualizar. StackTrace: " . $ex->getMessage();
        }
    }

    public static function ActualizarPass($pass, $rut) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("UPDATE empleado SET passwordEmpleado = ? WHERE rutEmpleado = ?");
            $stmt->bindValue(1, $pass);
            $stmt->bindValue(2, $rut);


            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }

            return false;
        } catch (Exception $ex) {
            echo "No se pudo actualizar. " . $ex->getMessage();
        }
    }

    public static function AgregarEmpleado($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO empleado (rutEmpleado, nombreEmpleado, passwordEmpleado, idCategoria, activo) VALUES (?,?,?,?,?)");
            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $pass);
            $stmt->bindParam(4, $cat);
            $stmt->bindParam(5, $activo);

            $rut = $dto->getRutEmpleado();
            $nombre = $dto->getNombreEmpleado();
            $pass = $dto->getPasswordEmpleado();
            $cat = $dto->getIdCategoria();
            $activo = $dto->getActivo();

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo "Error al agregar " . $ex->getMessage();
        }
    }

    public static function ValidarKey($key) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM empleado WHERE rutEmpleado = ?");
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

}
