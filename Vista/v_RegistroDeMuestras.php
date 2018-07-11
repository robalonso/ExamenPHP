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
            function noAgregado() {
                swal({
                    text: "Error al registrar un analisis!",
                    icon: "error",
                    button: null
                });
            }
            function agregado() {
                swal({
                    text: "Se ha registrado el analisis con exito",
                    icon: "success",
                    button: null
                });
            }
        </script>

    </head>
    <body>
        <?php
        if (isset($_GET["id"])) {
            include_once '../Controlador/AnalisisMuestraDaoImp.php';
            $daoAnalisis = new AnalisisMuestraDaoImp();
            $idAnalisis = $_GET["id"];
            $muestra = $daoAnalisis->GetMuestra($idAnalisis);

            if ($muestra->getEmpresa_codigoEmpresa() != null) {
                $idCliente = "EMP" . $muestra->getEmpresa_codigoEmpresa();
            } else {
                $idCliente = "PAR" . $muestra->getParticular_codigoParticular();
            }
            ?>

            <form action="s_RegistroDeMuestras.php" method="POST">
                <br><br>
                <div class="container">
                    <div class="row justify-content-center align-items-end">
                        <div class="col-4">
                            <div class="alert alert-success">
                                Código del Cliente: 
                                <span type="text" class="text-dark h5"><?php echo $idCliente; ?></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="alert alert-success">
                                Código de la muestra:
                                <input type="text" name="txtCodigoMuestra" hidden="true" value="<?php echo $muestra->getIdAnalisis(); ?>"> 
                                <label type="text" class="text-dark h5"><?php echo $muestra->getIdAnalisis(); ?></label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center align-items-end bg-dark text-white">
                        <div class="col-6">
                            <label class="h5">Tipo de Análisis</label>
                        </div>
                        <div class="col-6">
                            <label class="h5">PPM de la muestra</label>
                        </div>
                    </div>
                    <!--micotoxinas-->
                    <?php if ($muestra->getA_micotoxinas()) { ?>
                        <br>
                        <div class="row justify-content-center align-items-end">
                            <div class="col-6">
                                <label class="h5">Micotoxinas</label>
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control col-4" min="1" name="txtPPM_Micotoxinas">
                            </div>
                        </div>
                    <?php } ?>
                        <!--Metales-->
                    <?php if ($muestra->getA_metales()) { ?>
                        <br>
                        <div class="row justify-content-center align-items-end">
                            <div class="col-6">
                                <label class="h5">Metales pesados</label>
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control col-4" min="1" name="txtPPM_Metales">
                            </div>
                        </div>
                    <?php } ?>
                        <!--Marea-->
                    <?php if ($muestra->getA_marea()) { ?>
                        <br>
                        <div class="row justify-content-center align-items-end">
                            <div class="col-6">
                                <label class="h5">Marea roja</label>
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control col-4" min="1" name="txtPPM_Marea">
                            </div>
                        </div>
                    <?php } ?>
                        <!--Bacterias Nocivas-->
                    <?php if ($muestra->getA_bacterias()) { ?>
                        <br>
                        <div class="row justify-content-center align-items-end">
                            <div class="col-6">
                                <label class="h5">Bacterias nocivas</label>
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control col-4" min="1" name="txtPPM_Bacterias">
                            </div>
                        </div>
                    <?php } ?>
                        <!--Plaguicidas prohibidos-->
                    <?php if ($muestra->getA_plagicidas()) { ?>
                        <br>
                        <div class="row justify-content-center align-items-end">
                            <div class="col-6">
                                <label class="h5">Plaguicidas prohibidos</label>
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control col-4" min="1" name="txtPPM_Plaguicidas">
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <hr>
                <div class="row justify-content-center">
                    <input type="submit" value="Guardar analisis" class="btn btn-primary" name="btnGuardar"/>
                </div>
            </form>

            <?php
        } else {
            echo 'no se ha seteado la instancia con el id del analisis.';
        }
        ?>




    </body>

    <!-- JS -->
    <script type="text/javascript" src="js/recepcionMuestra.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</html>
