<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <h3>Listado de Muestras por Procesar</h3>
        <div>
            <table border="0">
                <thead>
                    <tr>
                        <th>Código de Usuario</th>
                        <th>Código de Muestra</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include_once '../Modelo/AnalisisMuestra.php';
                    include_once '../Controlador/AnalisisMuestraDaoImp.php';
                    ?>
                    <!--  Filtro de muestras no procesadas  -->
                    <?php
                    $procesado = 0;
                    $listaMuestra = AnalisisMuestraDaoImp::MostrarPorProcesar($procesado);

                    foreach ($listaMuestra as $muestra) {
                        ?>
                        <tr>
                            <?php
                            $texto = "";
                            if ($muestra->getEmpresa_codigoEmpresa() == null) {
                                if ($muestra->getParticular_codigoParticular() != null) {
                                    $texto = $muestra->getParticular_codigoParticular();
                                }
                            }

                            if ($muestra->getParticular_codigoParticular() == null) {
                                if ($muestra->getEmpresa_codigoEmpresa() != null) {
                                    $texto = $muestra->getEmpresa_codigoEmpresa();
                                }
                            }
                            ?>

                            <td> <?php echo $texto; ?> </td>

                            <td> <?php echo $muestra->getIdAnalisis(); ?></td>

                            <td>
                                <form action="s_ProcesarMuestra" method="POST">
                                    <input type="submit" value="Procesar" name="btnProcesar" />
                                </form>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
