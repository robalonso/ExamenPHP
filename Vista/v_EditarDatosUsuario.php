<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
    <!--                        <td style="width: 180px">
                            Password
                            <input type="text" name="txtPasswordEmpresa" value="" />
                        </td>
                        <td style="width: 180px">
                            Confirmar Password
                            <input type="text" name="txtConfirmarPasswordEmpresa" value="" />
                        </td>-->
                    </tr>

                    <tr>
                        <td style="width: 180px">
                            Dirección
                            <input type="text" name="txtDireccionEmpresa" value="<?php echo $empresa->getDireccionEmpresa(); ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>

        <?php } ?>

        <?php
        if ($_SESSION["tipo"] == 2) {
            session_start();
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
                                <input type="text" name="txtRutEmpleado" value="<?php echo $empleado->getRutEmpleado(); ?>"  readonly="readonly"/>
                            </td>
                            <td style="width: 180px">
                                Nombre Empleado
                                <input type="text" name="txtNombreEmpleado" value="<?php echo $empleado->getNombreEmpleado(); ?>" />
                            </td>
                        </tr>
                        <tr>
        <!--                        <td style="width: 180px">
                                Contraseña
                                <input type="text" name="txtPasswordEmpleado" value="" />
                            </td>
                            <td style="width: 180px">
                                Confirmar Contraseña
                                <input type="text" name="txtConfirmarPassword" value="" />
                            </td>-->
                        </tr>
                    </tbody>
                </table>
                
                <input type="submit" value="Modificar" name="btnModificarDatos" />
            </form>
        <?php } ?>

        <?php if ($_SESSION["tipo"] == 3) { ?>
            <?php $particular = $_SESSION["Particular"];
            ?>
            <table border="0">

                <tbody>
                    <tr>
                        <td style="width: 180px">
                            Rut Particular
                            <input type="text" name="txtRutParticular" value="<?php echo $particular->getRutParticular(); ?>" readonly="readonly" />
                        </td>
                        <td style="width: 180px">
                            Nombre particular
                            <input type="text" name="txtNombreParticular" value="<?php echo $particular->getNombreParticular(); ?>" />
                        </td>
                    </tr>
                    <tr>
    <!--                        <td style="width: 180px">
                            Password
                            <input type="text" name="txtPasswordParticular" value="" />
                        </td>
                        <td style="width: 180px">
                            Confirmar Password
                            <input type="text" name="txtConfirmarPassword" value="" />
                        </td>-->
                    </tr>
                    <tr>
                        <td style="width: 180px">
                            Dirección particular
                            <input type="text" name="txtDireccionParticular" value="<?php echo $particular->getDireccionParticular(); ?>" />
                        </td>
                        <td style="width: 180px">
                            Email Particular
                            <input type="text" name="txtEmailParticular" value="<?php echo $particular->getEmailParticular(); ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>

        <?php } ?>

    </body>
</html>
