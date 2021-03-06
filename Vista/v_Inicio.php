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
        <link rel="stylesheet" href="css/Inicio.css">

        <!-- JS -->
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body>
        <?php if ($_SESSION["tipo"] == 1) { ?>

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="v_EditarDatosUsuario.php">Editar Datos Personales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=></a>
                    </li>
                </ul>
            </nav>
        <?php } ?>

        <?php if ($_SESSION["tipo"] == 2) { ?>

            <?php if ($_SESSION["categoria"] == 1) { ?>
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="v_EditarDatosUsuario.php">Editar Datos Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="v_AgregarEmpleado.php">Agregar Empleado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="v_MostrarEmpleados.php">Listado de Empleados</a>
                        </li>
                    </ul>
                </nav>
            <?php } ?>

            <?php if ($_SESSION["categoria"] == 2) { ?>
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="v_EditarDatosUsuario.php">Editar Datos Personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="v_RecepcionMuestra.php">Recepción de Muestras</a>
                        </li>
                    </ul>
                </nav>
            <?php } ?>

        <?php } ?>

        <?php if ($_SESSION["tipo"] == 3) { ?>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="v_EditarDatosUsuario.php">Editar Datos Personales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                </ul>
            </nav>

        <?php } ?>

        <div class="body"></div>


    </body>
</html>
