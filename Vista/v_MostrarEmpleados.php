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
        <h3>Listado Empleados</h3>
        <?php
        include_once '../Controlador/EmpleadoDaoImp.php';
        $listaEmpleados = EmpleadoDaoImp::ListarTodos();
        ?>

        <table border="0">
            <tbody>
            <thead>
            <th>Rut Empleado</th>
            <th>Nombre Empleado</th>
            <th>Acción</th>
        </thead>
        <tbody>
            <?php foreach ($listaEmpleados as $emp) { ?>

                <tr>
                    <td>
                        <?php echo $emp->getRutEmpleado(); ?>
                    </td>
                    <td>
                        <?php echo $emp->getNombreEmpleado(); ?>
                    </td>
                    <td>
                        <form action="s_SeleccionarModificar.php" method="POST">
                            <input type ="hidden" name="rutModificar" value="<?php echo $emp->getRutEmpleado(); ?>"/>
                            <button type="submit" class="btn btn-primary" value="" name="btnModificar">Modificar</button>
                        </form>
                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
</form>
</body>
</html>
