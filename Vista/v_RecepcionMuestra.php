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

        <script>
            function validarAnalisis() {
                if ($('#chkMicotoxinas').prop('checked') || $('#chkMetales').prop('checked') ||
                        $('#chkPlaguicidas').prop('checked') || $('#chkMarea').prop('checked')
                        || $('#chkBacterias').prop('checked')) {
                    document.getElementById('btnGuardar').disabled = false;
                } else {
                    document.getElementById('btnGuardar').disabled = true;
                }
            }

            function noAgregado() {
                swal({
                    text: "Error al agregar la muestra!",
                    icon: "error",
                    button: "Cerrar"
                });
            }
            function agregado() {
                swal({
                    text: "Se ha ingresado la muestra",
                    icon: "success",
                    button: "Cerrar"
                });
            }
        </script>
    </head>
    <body>


        <?php
        session_start();
        if ($_SESSION["tipo"] == 2) {
            ?>

            <?php if ($_SESSION["categoria"] == 2) { ?>
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="v_EditarDatosUsuario.php">Editar Datos Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="v_RecepcionMuestra.php">Recepción de Muestras</a>
                        </li>
                        <!--                        <li class="nav-item">
                                                    <a class="nav-link" href="v_RegistroDeMuestras.php">Registro de Muestras</a>
                                                </li>-->
                    </ul>
                </nav>
            <?php } ?>

        <?php } ?>


        <h3>Agregar Muestra</h3>
        <form action="s_RecepcionMuestra.php" method="POST">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-end">
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="txtCodigoCliente" id="txtCodigoCliente" placeholder="Código Cliente" aria-label="Código Cliente" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">
                                    <a onclick="buscarCliente()" class="input-group-append"><i class="fas fa-search"></i></a>
                                </span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="txtRutCliente" id="txtRutCliente" value="" class="form-control" placeholder="Rut Cliente" requiered/>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="txtNombreCliente" id="txtNombreCliente" value="" class="form-control" placeholder="Nombre Cliente" requiered/>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="dateFecha">Fecha de recepción</label>
                            <input type="date" name="dateFecha" class="form-control" value="" requiered/>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="txtTemperatura" class="form-control" placeholder="Temperatura" value="" requiered/>
                        </div>
                        <div class="input-group mb-3 ">
                            <input type="text" name="txtCantidad" class="form-control" placeholder="Cantidad" value="" requiered aria-describedby="span2"/>
                            <span class="input-group-text" id="span2">ML.</span>      
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="form-group">
                        <label class="bg-primary text-white h4 text-center" style="border-radius: 5px; width: 350px">Tipos de análisis a realizar</label><br>
                        <label class=" form-check checkbox-inline">
                            <input type="checkbox" id="chkMicotoxinas" name="chkMicotoxinas" class="form-check-input" value="" onclick="validarAnalisis()">
                            <label class="form-check-label" for="chkMicotoxinas">Micotoxinas</label>
                        </label>
                        <label class="form-check  checkbox-inline">
                            <input type="checkbox" id="chkMetales" name="chkMetales" value="" class="form-check-input" onclick="validarAnalisis()">
                            <label class="form-check-label" for="chkMetales">Metales Pesados</label>
                        </label>
                        <label class="form-check  checkbox-inline">
                            <input type="checkbox" id="chkPlaguicidas" name="chkPlaguicidas" value="" class="form-check-input" onclick="validarAnalisis()">Plaguicidas Prohibidos
                            <label class="form-check-label" for="chkPlaguicidas">Plaguicidas Prohibidos</label>
                        </label>
                        <label class="form-check  checkbox-inline">
                            <input type="checkbox" id="chkMarea" name="chkMarea" value="" class="form-check-input" onclick="validarAnalisis()">Marea Roja
                            <label class="form-check-label" for="chkMarea">Marea Roja</label>
                        </label>
                        <label class="form-check  checkbox-inline">
                            <input type="checkbox" id="chkBacterias" name="chkBacterias" value="" class="form-check-input" onclick="validarAnalisis()">Bacterias nocivas
                            <label class="form-check-label" for="chkBacterias">Bacterias nocivas</label>
                        </label>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row justify-content-center">
                <input type="submit" value="Guardar" id="btnGuardar" class="btn btn-primary" name="btnGuardar" disabled/>
            </div>
        </form>
    </body>

    <!-- JS -->
    <script type="text/javascript" src="js/recepcionMuestra.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>
