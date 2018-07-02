<?php
include_once 'ClasePdo.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactoDaoImp
 *
 * @author Daniel GS
 */
class ContactoDaoImp {

    public static function Agregar($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO contacto (rutContacto, nombreContacto,"
                    . " emailContacto, telefonoContacto, empresa_codigoEmpresa) VALUES (?,?,?,?,?)");
            $stmt->bindParam(1, $rut);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $telefono);
            $stmt->bindParam(5, $codigoEmp);

            $rut = $dto->getRutContacto();
            $nombre = $dto->getNombreContacto();
            $email = $dto->getEmailContacto();
            $telefono = $dto->getTelefonoContacto();
            $codigoEmp = $dto->getCodigoEmpresa();

            $pdo->beginTransaction();
            $stmt->execute();
            $pdo->commit();

            $pdo = null;
            return true;
        } catch (Exception $ex) {
            $pdo->rollBack();
            echo "No se pudo agregar " . $ex->getMessage();
        }
        return false;
    }

}
