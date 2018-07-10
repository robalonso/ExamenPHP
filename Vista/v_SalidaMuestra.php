<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Detalles de Análisis</h3>
        <?php
        include_once '../Modelo/AnalisisMuestra.php';
        include_once '../Controlador/EmpleadoDaoImp.php';

        if (isset($_SESSION["mostrar"])) {
            $dto = new AnalisisMuestra();
            $dto = $_SESSION["mostrar"];
        }
        ?>
        <table border="0">

            <tbody>
                <tr>
                    <td>
                        Código Cliente: <input type="text" name="txtCodigo" value=" <?php echo $dto->getParticular_codigoParticular(); ?>" readonly="readonly" /> 
                    </td>
                    <td>
                        Fecha Recepción:
                        <input type="text" name="dateFecha" value="<?php echo $dto->getFechaRecepcion(); ?>" readonly="readonly" />
                    </td>
                </tr>
                <tr>
                    <?php
                    $textoEstado = "";
                    if ($dto->getProcesado() == 0) {
                        $textoEstado = "No procesado";
                    } else {
                        $textoEstado = "Procesado";
                    }
                    ?>
                    <td>
                        Estado Muestra: <input type="text" name="txtEstado" value="<?php echo $textoEstado; ?>" readonly="readonly"/>
                    </td>

                    <td>
                        Empleado Encargado:
                        <?php 
                        $empleado= EmpleadoDaoImp::RutToName($dto->getRutEmpleadoRecibe()); ?>
                        <input type="text" name="txtNombre" value="<?php echo $empleado; ?>" readonly="readonly" />
                    </td>
                </tr>
            </tbody>
        </table>

    </body>
</html>
