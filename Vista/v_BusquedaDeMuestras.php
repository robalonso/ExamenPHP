<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!-- font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!-- JS -->
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!-- FusionChart CND -->
        <script type="text/javascript" src="https://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script type="text/javascript" src="https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>


        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <style>
            .header th {
                height: 2px;
                line-height: 2px;
            }
        </style>
    </head>

    <body>
        <br><br>
        <div class="container-fluid col-12">
            <div class="row justify-content-center align-items-end">     
                <div class="card">
                    <div class="card-header text-center bg-white">
                        <h3 style="font-family: monospace">Búsqueda de Muestras</h3>
                        <span class="text-muted">Escribe el código de la muestra a buscar.</span>
                    </div>
                    <div class="card-body">

                        <div class="row pl-5">
                            <div class="col-8">
                                <input type="text" class="form-control" name="txtCodigoSearch" value="" placeholder="Código de muestra">
                            </div>
                            <div class="col-4">
                                <input type="button" class="btn btn-primary" name="btnBuscar" id="btnBuscar" onclick="buscarMuestra();" value="Buscar">
                            </div>
                        </div>
                        <br>
                        <?php
                        include_once '../Modelo/AnalisisMuestra.php';
                        include_once '../Controlador/AnalisisMuestraDaoImp.php';
                        ?>
                        <?php
                        $listaMuestras = AnalisisMuestraDaoImp::ListarTodas();

                        if ($listaMuestras->count() != 0) {
                            ?>
                            <table class="table col-10">
                                <thead class="thead-dark header">
                                    <tr class="text-center">
                                        <th style="min-width: 190px;">Código de muestra</th>
                                        <th style="min-width: 190px;">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--  Filtro de muestras no procesadas  -->
                                    <?php
                                    foreach ($listaMuestras as $muestra) {
                                        ?>
                                        <tr class="text-center">
                                            <td> <?php echo $muestra->getIdAnalisis(); ?></td>
                                            <td>
                                                <?php $idSend = $muestra->getIdAnalisis(); ?>
                                                <a href="#" data-toggle="modal" data-target="#modalGraphics" onclick="cargarGraficos(<?php echo $muestra->getIdAnalisis(); ?>);">
                                                    <?php if ($muestra->getProcesado()) { ?>
                                                        Terminado
                                                    <?php } else { ?>
                                                        En proceso
                                                    <?php } ?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="row justify-content-center">
                                <div class="alert alert-info h4">No hay muestras registradas.</div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-footer">   
                    </div>            
                </div>
            </div>
        </div>

        <div class="modal fade modalGraphics" tabindex="-1" role="dialog" aria-labelledby="modalGraphics" aria-hidden="true" id="modalGraphics">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <span class="modal-title h4">Resultado análisis de muestra <label id="lblIdModal"></label></span>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div id="charts" class="pl-3"></div>
                        </div>
                        <div class="modal-footer">

                        </div>          
                    </div>
                </div>
            </div>
        </div>


    </body>
    <script>
        function cargarGraficos(id) {
            document.getElementById('lblIdModal').innerText = id;
            $.ajax({
                url: "s_DatosGrafico.php",
                type: 'POST',
                data: {'txtIdMuestra': id},
                dataType: 'JSON',
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + " \n" + xhr.responseText, "\n" + thrownError);
                },
                success: function (response) {

                    console.log(response);
                    FusionCharts.ready(function () {
                        var revenueChart = new FusionCharts({
                            "type": "column2d",
                            "renderAt": "charts",
                            "width": "730",
                            "height": "300",
                            "dataFormat": "json",
                            "dataSource": {
                                "chart": {
                                    "caption": "",
                                    "subCaption": "",
                                    "xAxisName": "Tipo análisis",
                                    "yAxisName": "(PPM)Particulas por Millón",
                                    "theme": "zune",
                                    "baseFontSize": "16"                                    
                                },
                                "data": response
                            }

                        });
                        revenueChart.render();
                    });
                }
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
