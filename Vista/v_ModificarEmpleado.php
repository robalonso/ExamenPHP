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
        <h3>Modificar Datos Empleado</h3>

        <?php
        include_once '../Modelo/EmpleadoDto.php';
        if (isset($_SESSION["salida"])) {
            $dto = new EmpleadoDto();
            $dto = $_SESSION["salida"];
            ?>


            <form action = "s_ModificarEmpleado.php" method = "POST">
                <table border = "0">
                    <tbody>
                        <tr>
                            <td>
                                Rut Empleado:
                                <input type = "text" name = "txtRut" value = "<?php echo $dto->getRutEmpleado(); ?>" readonly = "readonly" />
                            </td>
                            <td>
                                Nombre Empleado:
                                <input type="text" name="txtNombre" value="<?php echo $dto->getNombreEmpleado(); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password:
                                <input type="password" name="txtPass" value="" />
                            </td>
                            <td>
                                Confirmar Password:
                                <input type="password" name="txtConfirmarPass" value="" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Categoría:
                            </td>
                            <td>
                                Activo:
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
        <?php }
        ?>
    </body>
</html>
