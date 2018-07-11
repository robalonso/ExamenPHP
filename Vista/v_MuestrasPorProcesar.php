<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!-- font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!-- JS -->
        <script type="text/javascript" src="js/recepcionMuestra.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>

    <body>
        <br><br>
        <div class="container-fluid col-12">
            <div class="row justify-content-center align-items-end">     
                <div class="card">
                    <div class="card-header text-center">
                        <h3 style="font-family: monospace">Listado de Muestras por Procesar</h3>
                    </div>
                    <div class="card-body">

                        <?php
                        include_once '../Modelo/AnalisisMuestra.php';
                        include_once '../Controlador/AnalisisMuestraDaoImp.php';
                        ?>
                        <?php
                        $procesado = 0;
                        $listaMuestra = AnalisisMuestraDaoImp::MostrarPorProcesar($procesado);

                        if ($listaMuestra->count() != 0) {
                            ?>
                            <table class="table col-10">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th style="min-width: 190px">Código de Usuario</th>
                                        <th style="min-width: 190px">Código de Muestra</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--  Filtro de muestras no procesadas  -->
                                    <?php
                                    foreach ($listaMuestra as $muestra) {
                                        ?>
                                        <tr class="text-center">
                                            <?php
                                            $texto = "";
                                            if ($muestra->getEmpresa_codigoEmpresa() == null) {
                                                if ($muestra->getParticular_codigoParticular() != null) {
                                                    $texto = "PAR" . $muestra->getParticular_codigoParticular();
                                                }
                                            }

                                            if ($muestra->getParticular_codigoParticular() == null) {
                                                if ($muestra->getEmpresa_codigoEmpresa() != null) {
                                                    $texto = "EMP" . $muestra->getEmpresa_codigoEmpresa();
                                                }
                                            }
                                            ?>

                                            <td> <?php echo $texto; ?> </td>

                                            <td> <?php echo $muestra->getIdAnalisis(); ?></td>

                                            <td>
                                                <form action="s_ProcesarMuestra" method="POST">
                                                    <?php $idSend = $muestra->getIdAnalisis(); ?>
                                                    <span class="btn btn-primary"><a name="btnProcesar" class="text-white" href="v_RegistroDeMuestras?id=<?php echo $idSend; ?>">Procesar</a></span>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="row justify-content-center">
                                <div class="alert alert-info h4">No hay muestras pendientes para procesar.</div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-footer">   
                    </div>            
                </div>
            </div>
        </div>

    </body>
    <script>
        function procesado() {
            swal({
                text: "Se ha Procesado Correctamente la muestra",
                icon: "success",
                button: null
            }
            );
        }
    </script>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</html>
