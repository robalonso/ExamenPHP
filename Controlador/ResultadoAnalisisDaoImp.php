<?php

/**
 * Description of ResultadoAnalisisDaoImp
 *
 * @author Daniel GS
 */
include_once 'ClasePdo.php';
include_once '../Modelo/ResultadoAnalisis.php';

class ResultadoAnalisisDaoImp {

    public static function AgregarResultado($resultado) {

        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO resultadoanalisis (idTipoAnalisis, "
                    . "idAnalisisMuestra, fechaRegistro, PPM,"
                    . " estado, rutEmpleadoAnalista) VALUES (?,?,NOW(),?,?,?)");

            $stmt->bindParam(1, $idTipo);
            $stmt->bindParam(2, $idAnalisisMuestra);
            $stmt->bindParam(3, $PPM);
            $stmt->bindParam(4, $estado);
            $stmt->bindParam(5, $rutEmpleado);

            $idTipo = $resultado->getIdTipoAnalisis();
            $idAnalisisMuestra = $resultado->getIdAnalisisMuestra();
            $PPM = $resultado->getPpm();
            $estado = $resultado->getEstado();
            $rutEmpleado = $resultado->getRutEmpleadoAnalista();

            $pdo->beginTransaction();
            $stmt->execute();
            $pdo->commit();


            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (Exception $ex) {
            echo "Error  al agregar" . $ex->getMessage();
        }
    }

    public static function ResultadosAnalisis($idMuestra) {
        $datos = array();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT `nombre`, `PPM` FROM `tipoanalisis` "
                    . "JOIN `resultadoanalisis` USING(idtipoAnalisis)"
                    . "WHERE idAnalisisMuestra = ?");

            $stmt->bindValue(1, $idMuestra);
            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $value) {
                $nombre = $value["nombre"];
                $ppm = $value["PPM"];
                $datos[] = array("value" => $ppm, "label" => $nombre);
            }
            $pdo = null;
            if ($stmt->rowCount() > 0) {
                return $datos;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            echo "Error  al listar resultados " . $ex->getMessage();
        }
        return null;
    }

}
