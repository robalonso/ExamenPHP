<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
            <table border="0">
                <?php
                $empresa = $_SESSION["Empresa"];
                ?>
                <form action="s_EditarDatosUsuario.php" method="POST">
                    <tbody>
                        <tr>
                            <td style="width: 180px">
                                Rut Empresa
                                <input type="text" name="txtRutEmpresa" value="<?php echo $empresa->getRutEmpresa(); ?>" readonly="readonly" />
                            </td>

                            <td style="width: 180px">
                                Nombre Empresa
                                <input type="text" name="txtNombreEmpresa" value="<?php echo $empresa->getNombreEmpresa(); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 180px">
                                Dirección
                                <input type="text" name="txtDireccionEmpresa" value="<?php echo $empresa->getDireccionEmpresa(); ?>" />
                            </td>
                        </tr>
                    <input type="submit" value="Actualizar" name="btnActualizar"/>
                </form>

                <tr>
                    <td>
                        <button onclick="document.getElementById('modalPass').style.display = 'block'" class="w3-button w3-black">Cambiar Contraseña</button>
                        <!--                            Modal cambio de contraseña-->

                        <div id="modalPass" class="w3-modal">
                            <div class="w3-modal-content w3-card-4">
                                <header class="w3-container w3-teal"> 
                                    <div class="w3-container">
                                        <span onclick="document.getElementById('modalPass').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
                                        <p> <h3>Cambio de Contraseña</h3></p>
                                </header>
                                <p>  Nueva Contraseña: <input type="text" name="txtNuevaPass" value="" />  </p>
                                <p>  Confirmar Pass: <input type="text" name="txtConfirmarPass" value="" />  </p>

                                <input type="submit" value="Confirmar" name="btnConfirmar" />

                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>


    <?php } ?>

    <?php
    if ($_SESSION["tipo"] == 2) {
        ?>
        <form action="s_EditarDatosUsuario.php" method="POST">
            <table border="0">

                <?php
                $empleado = $_SESSION["Empleado"];
                ?>
                <tbody>
                    <tr>
                        <td style="width: 180px">
                            Rut Empleado
                            <input type="text" name="txtRutEmpleado" value="<?php echo $empleado->getRutEmpleado(); ?>"  readonly="readonly" id="rutEmpleado"/>
                        </td>
                        <td style="width: 180px">
                            Nombre Empleado
                            <input type="text" name="txtNombreEmpleado" value="<?php echo $empleado->getNombreEmpleado(); ?>" />
                        </td>
                    </tr>

                </tbody>
            </table>

            <input type="submit" value="Modificar" name="btnModificarDatos" />
        </form>
        <table>
            <tr>
                <td>
                    <button onclick="document.getElementById('modalPass').style.display = 'block'" class="w3-button w3-black">Cambiar Contraseña</button>
                    <!--                            Modal cambio de contraseña-->

                    <div id="modalPass" class="w3-modal">
                        <div class="w3-modal-content w3-card-4">
                            <header class="w3-container w3-teal"> 
                                <div class="w3-container">
                                    <span onclick="document.getElementById('modalPass').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
                                    <p> <h3>Cambio de Contraseña</h3></p>
                                </div>
                            </header>
                            <form name="enviar" action="s_ActualizarPass.php">
                                <p>  Nueva Contraseña: <input type="text" name="txtNuevaPass" value="" id="nuevaPass" />  </p>
                                <p>  Confirmar Pass: <input type="text" name="txtConfirmarPass" value="" id="confirmarPass" />  </p>
                                <input type="submit" value="Confirmar" name="btnConfirmar" onclick="actualizarPass()"/>
                            </form>

                        </div>
                    </div>

                </td>
            </tr>
        </table>
    <?php } ?>

    <?php if ($_SESSION["tipo"] == 3) { ?>
        <?php $particular = $_SESSION["Particular"];
        ?>
        <table border="0">
            <form action="s_EditarDatosUsuario.php" method="POST">

                <tbody>
                    <tr>
                        <td style="width: 180px">
                            Rut Particular
                            <input type="text" name="txtRutParticular" value="<?php echo $particular->getRutParticular(); ?>" readonly="readonly" id="rutParticular" />
                        </td>
                        <td style="width: 180px">
                            Nombre particular
                            <input type="text" name="txtNombreParticular" value="<?php echo $particular->getNombreParticular(); ?>" />
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 180px">
                            Dirección particular
                            <input type="text" name="txtDireccionParticular" value="<?php echo $particular->getDireccionParticular(); ?>" />
                        </td>
                        <td style="width: 180px">
                            Email Particular
                            <input type="text" name="txtEmailParticular" value="<?php echo $particular->getEmailParticular() ?>" />
                        </td>
                    </tr>
                <input type="submit" value="Actualizar" name="btnActualizar" />
            </form>
            <tr>
                <td>
                    <button onclick="document.getElementById('modalPass').style.display = 'block'" class="w3-button w3-black">Cambiar Contraseña</button>
                    <!--                            Modal cambio de contraseña-->

                    <div id="modalPass" class="w3-modal">
                        <div class="w3-modal-content w3-card-4">
                            <header class="w3-container w3-teal"> 
                                <div class="w3-container">
                                    <span onclick="document.getElementById('modalPass').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
                                    <p> <h3>Cambio de Contraseña</h3></p>
                            </header>
                            <p>  Nueva Contraseña: <input type="text" name="txtNuevaPass" value="" id="nueva"/>  </p>
                            <p>  Confirmar Pass: <input type="text" name="txtConfirmarPass" value="" id="confirmar" />  </p>
                            <input type="submit" value="Confirmar" name="btnConfirmar" />

                        </div>
                    </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

<?php } ?>

</body>
<script>
    function actualizarPass() {
        var rut = $('#rutEmpleado').val();
        var nueva = $('#nuevaPass').val();
        var confirmar = $('#confirmarPass').val();

        $.ajax({
            type: 'POST',
            url: "s_ActualizarPass.php",
            data: 'btnConfirmar=1&rut= ' + rut + '&nueva=' + nueva + '&confirmar=' + confirmar,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',

            success: function (salida) {
                if (salida === 1) {
                    $('#rut').val('');
                    $('#nuevaPass').val('');
                    $('#confirmarPass').val('');

                }
            }

        });
    }




</script>

<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- JS -->
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>