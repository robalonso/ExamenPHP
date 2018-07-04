<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../Controlador/AnalisisMuestraDaoImp.php';
include_once '../Modelo/AnalisisMuestra.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Búsqueda de Muestras</h3>
        <h4>Ingrese el código de la muestra a buscar</h4>

        <form action="s_MostrarPorId" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Código de Muestra</td>
                        <td><input type="text" name="txtCodigo" value="" /></td>
                        <td><input type="submit" value="Buscar" name="btnBuscar" /></td>
                    </tr>
                </tbody>
            </table>
        </form>

        <br>

        <?php
        $listaTodos = AnalisisMuestraDaoImp::ListarTodas();
        ?>

        <table border="0">
            <thead>
                <tr>
                    <th>Código de Muestra</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaTodos as $muestra) { ?>
                    <tr>
                        <td> <?php echo $muestra->getIdAnalisis(); ?>  </td>
                        <?php
                        $texto = "";
                        if ($muestra->getProcesado() == 1) {
                            $texto = "Terminado";
                        } else {
                            $texto = "En proceso";
                        }
                        ?>
                        <td> <?php echo $texto; ?>  </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
