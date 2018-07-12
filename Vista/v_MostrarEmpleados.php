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
        <!-- font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!-- roundItems-->
        <link rel="stylesheet" type="text/css" href="css/roundItems.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

        <!-- JS -->
        <script type="text/javascript" src="js/recepcionMuestra.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <style>

            .centrar

            {
                position: absolute;
                top:10%;
                left:30%;
                width:500px;
                height:500px;
                padding:5px;
            }

        </style>

    </head>
    <body>

        <!--     NAVBAR    -->

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="v_MostrarEmpleados.php">Listado Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="v_AgregarEmpleado.php">Agregar Empleado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="v_ModificarEmpleado.php">Modificar Empleado</a>
                </li>
            </ul>
        </nav>





        <div class="class-container">
            <div class="centrar">
                <h3>Listado Empleados</h3>
                <?php
                include_once '../Controlador/EmpleadoDaoImp.php';
                $listaEmpleados = EmpleadoDaoImp::ListarTodos();
                ?>
                <table class="table table-striped" >
                    <thead>
                    <th style="width: 180px">Rut Empleado</th>
                    <th style="width: 180px">Nombre Empleado</th>
                    <th style="width: 180px">Acción</th>
                    </thead>
                    <tbody>
                        <?php foreach ($listaEmpleados as $emp) { ?>
                            <tr>
                                <td style="width: 180px">
                                    <?php echo $emp->getRutEmpleado(); ?>
                                </td>
                                <td>
                                    <?php echo $emp->getNombreEmpleado(); ?>
                                </td>
                                <td style="width: 180px">
                                    <form action="s_SeleccionarModificar.php" method="POST">
                                        <input type ="hidden" name="rutModificar" value="<?php echo $emp->getRutEmpleado(); ?>"/>
                                        <button type="submit" class="btn btn-primary" value="" name="btnModificar">Modificar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
</body>
</html>
