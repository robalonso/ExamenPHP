<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="css/editarDatos.css"/>

        <!-- JS -->
        <script type="text/javascript" src="js/editarDatos.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body>
        <?php
        include_once '../Controlador/EmpresaDaoImp.php';
        include_once '../Controlador/ParticularDaoImp.php';
        include_once '../Controlador/EmpleadoDaoImp.php';

        include_once '../Modelo/EmpleadoDto.php';
        include_once '../Modelo/EmpresaDto.php';
        include_once '../Modelo/ParticularDto.php';
        ?>
        <h2>Editar Datos</h2>
        <?php if ($_SESSION["tipo"] == 1) { ?>
            <?php
            $empresa = $_SESSION["Empresa"];
            ?>
            <form action="s_EditarDatosUsuario.php" method="POST">
                <br><br>
                <div class="container col-12">
                    <div class="justify-content-center">   
                        <div class="row">
                            <div class="col-1 pt-1" style="text-align: right;">Rut</div>
                            <div class="col-2">
                                <label type="text" class="form-control" name="txtRutEmpresa" readonly="readonly" id="txtRutEmpresa"><?php echo $empresa->getRutEmpresa(); ?></label>
                            </div>
                            <div class="col-1 pt-1" style="text-align: right;">Nombre</div>
                            <div class="col-2">
                                <input type="text" class="form-control"  name="txtNombreEmpresa" value="<?php echo $empresa->getNombreEmpresa(); ?>" />
                            </div>
                            <div class="col-1 pt-1" style="text-align: right;">Dirección</div>
                            <div class="col-2">
                                <input type="text" class="form-control"  name="txtDireccionEmpresa" value="<?php echo $empresa->getDireccionEmpresa(); ?>" />
                            </div>
                            <div class="col">
                                <input type="submit" class="btn btn-info text-white" value="Modificar" name="btnModificarDatos" />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col pl-3">
                                <span class="btn btn-dark text-white" data-toggle="modal" data-target="#modalPass"><i class="fas fa-key"></i>&nbsp;Cambiar Contraseña</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal cambio de contraseña-->

            <div id="modalPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalPass" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header text-center header-grandient">
                            <span class="modal-title h4 text-white">Cambio de Contraseña<label id="lblIdModal"></label></span>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    Nueva Contraseña:
                                </div>
                                <div class="col-6">
                                    <input type="password" name="txtNuevaPass" class="form-control" value="" id="txtNuevaPass" /> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    Confirmar Pass:
                                </div>
                                <div class="col-6">
                                    <input type="password" name="txtConfirmarPass" class="form-control" value="" id="txtConfirmarPass" />                                        
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" data-dismiss="modal" class="btn header-grandient text-white" value="Confirmar" name="btnConfirmar" onclick="actualizarPass();"/>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php
        if ($_SESSION["tipo"] == 2) {
            ?>
            <form action="s_EditarDatosUsuario.php" method="POST">

                <?php
                $empleado = $_SESSION["Empleado"];
                ?>
                <br><br>
                <div class="container col-10">
                    <div class="justify-content-center">   
                        <div class="row">
                            <div class="col-2 pt-1" style="text-align: right;">Rut Empleado</div>
                            <div class="col-3">
                                <label type="text" class="form-control" name="txtRutEmpleado" readonly="readonly" id="txtRutEmpleado"><?php echo $empleado->getRutEmpleado(); ?></label>
                            </div>
                            <div class="col-2 pt-1" style="text-align: right;">Nombre Empleado</div>
                            <div class="col-3">
                                <input type="text" class="form-control"  name="txtNombreEmpleado" value="<?php echo $empleado->getNombreEmpleado(); ?>" />
                            </div>
                            <div class="col">
                                <input type="submit" class="btn btn-info text-white" value="Modificar" name="btnModificarDatos" />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col" style="float: right">
                                <span class="btn btn-dark text-white" data-toggle="modal" data-target="#modalPass"><i class="fas fa-key"></i>&nbsp;Cambiar Contraseña</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <!-- Modal cambio de contraseña-->

            <div id="modalPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalPass" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header text-center header-grandient">
                            <span class="modal-title h4 text-white">Cambio de Contraseña<label id="lblIdModal"></label></span>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    Nueva Contraseña:
                                </div>
                                <div class="col-6">
                                    <input type="password" name="txtNuevaPass" class="form-control" value="" id="txtNuevaPass" /> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    Confirmar Pass:
                                </div>
                                <div class="col-6">
                                    <input type="password" name="txtConfirmarPass" class="form-control" value="" id="txtConfirmarPass" />                                        
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" data-dismiss="modal" class="btn header-grandient text-white" value="Confirmar" name="btnConfirmar" onclick="actualizarPass();"/>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php if ($_SESSION["tipo"] == 3) { ?>
            <?php $particular = $_SESSION["Particular"];
            ?>
            <form action="s_EditarDatosUsuario.php" method="POST">
                <br><br>
                <div class="container col-10">
                    <div class="justify-content-center">   
                        <div class="row">
                            <div class="col-2 pt-1" style="text-align: right;">Rut</div>
                            <div class="col-3">
                                <label type="text" class="form-control" name="txtRutParticular" readonly="readonly" id="txtRutParticular"><?php echo $particular->getRutParticular(); ?></label>
                            </div>
                            <div class="col-2 pt-1" style="text-align: right;">Nombre</div>
                            <div class="col-3">
                                <input type="text" class="form-control"  name="txtNombreParticular" value="<?php echo $particular->getNombreParticular(); ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 pt-1" style="text-align: right;">Dirección</div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="txtDireccionParticular" value="<?php echo $particular->getDireccionParticular(); ?>" id="txtRutEmpleado"/>
                            </div>
                            <div class="col-2 pt-1" style="text-align: right;">Email</div>
                            <div class="col-3">
                                <input type="text" class="form-control"  name="txtEmailParticular" value="<?php echo $particular->getEmailParticular(); ?>" />
                            </div>
                            <div class="col">
                                <input type="submit" class="btn btn-info text-white" value="Modificar" name="btnModificarDatos" />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col" style="float: right">
                                <span class="btn btn-dark text-white" data-toggle="modal" data-target="#modalPass"><i class="fas fa-key"></i>&nbsp;Cambiar Contraseña</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <!-- Modal cambio de contraseña-->

            <div id="modalPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalPass" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header text-center header-grandient">
                            <span class="modal-title h4 text-white">Cambio de Contraseña<label id="lblIdModal"></label></span>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    Nueva Contraseña:
                                </div>
                                <div class="col-6">
                                    <input type="password" name="txtNuevaPass" class="form-control" value="" id="txtNuevaPass" /> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    Confirmar Pass:
                                </div>
                                <div class="col-6">
                                    <input type="password" name="txtConfirmarPass" class="form-control" value="" id="txtConfirmarPass" />                                        
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" data-dismiss="modal" class="btn header-grandient text-white" value="Confirmar" name="btnConfirmar" onclick="actualizarPass();"/>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    </body>

    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JS -->
    <script type="text/javascript" src="js/editarDatos.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>