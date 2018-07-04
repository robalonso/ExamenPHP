<?php

include_once 'ClasePdo.php';
include_once '../Modelo/AnalisisMuestra.php';

class AnalisisMuestraDaoImp {

    public static function AgregarMuestra($dto) {
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("INSERT INTO analisismuestra (fechaRecepcion, "
                    . "temperaturaMuestra, cantidadMuestra, empresa_codigoEmpresa,"
                    . " particular_codigoParticular, procesado, rutEmpleadoRecibe,"
                    . "a_micotoxinas, a_metales, a_plaguicidas, a_marea, a_bacterias) "
                    . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

            $stmt->bindParam(1, $fechaRecepcion);
            $stmt->bindParam(2, $temperatura);
            $stmt->bindParam(3, $cantidad);
            $stmt->bindParam(4, $empresa);
            $stmt->bindParam(5, $particular);
            $stmt->bindParam(6, $procesado);
            $stmt->bindParam(7, $empleado);
            $stmt->bindParam(8, $micotoxinas);
            $stmt->bindParam(9, $metales);
            $stmt->bindParam(10, $plaguicidas);
            $stmt->bindParam(11, $marea);
            $stmt->bindParam(12, $bacterias);

            $fechaRecepcion = $dto->getFechaRecepcion();
            $temperatura = $dto->getTemperaturaMuestra();
            $cantidad = $dto->getCantidad();
            $empresa = $dto->getEmpresa_codigoEmpresa();
            $particular = $dto->getParticular_codigoParticular();
            $procesado = $dto->getProcesado();
            $empleado = $dto->getRutEmpleadoRecibe();
            $micotoxinas = $dto->getA_micotoxinas();
            $metales = $dto->getA_metales();
            $plaguicidas = $dto->getA_plagicidas();
            $marea = $dto->getA_marea();
            $bacterias = $dto->getA_bacterias();


            $pdo->beginTransaction();
            $stmt->execute();
            $pdo->commit();

            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (Exception $ex) {
            echo "Error  al agreagar" . $ex->getMessage();
        }
    }

    public static function MostrarPorProcesar($noProcesado) {
        $lista = new ArrayObject();
        try {
            $pdo = new clasePDO();
            $stmt = $pdo->prepare("SELECT * FROM analisismuestra WHERE procesado = ?");
            $stmt->bindParam(1, $noProcesado);

            $stmt->execute();
            $rs = $stmt->fetchAll();

            foreach ($rs as $muestra) {
                if ($muestra['procesado'] == $noProcesado) {
                    $nuevaMuestra = new AnalisisMuestra();
                    $nuevaMuestra->setIdAnalisis($muestra['idAnalisisMuestra']);
                    $nuevaMuestra->setCantidad($muestra['cantidadMuestra']);
                    $nuevaMuestra->setEmpresa_codigoEmpresa($muestra['empresa_codigoEmpresa']);
                    $nuevaMuestra->setFechaRecepcion($muestra['fechaRecepcion']);
                    $nuevaMuestra->setIdAnalisis($muestra['idAnalisisMuestra']);
                    $nuevaMuestra->setParticular_codigoParticular($muestra['particular_codigoParticular']);
                    $nuevaMuestra->setProcesado($muestra['procesado']);
                    $nuevaMuestra->setTemperaturaMuestra($muestra['temperaturaMuestra']);
                    $nuevaMuestra->setRutEmpleadoRecibe($muestra['rutEmpleadoRecibe']);
                    $lista->append($nuevaMuestra);

//                        private $idAnalisis;
//    private $fechaRecepcion;
//    private $temperaturaMuestra;
//    private $cantidad;
//    private $empresa_codigoEmpresa;
//    private $particular_codigoParticular;
//    private $procesado;
//    private $rutEmpleadoRecibe;
                }
            }
            return $lista;
        } catch (Exception $ex) {
            echo "Error al listar, tonto conchetumare" . $ex->getMessage();
        }
    }

}
