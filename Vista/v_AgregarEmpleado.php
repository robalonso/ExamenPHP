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
    </head>
    <body>


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

        <form action="s_AgregarEmpleado.php" method="POST">
            <div class="container col-12">
                <h3>
                    Ingresar datos Empleado
                </h3>

                <div class="col-6 justify-content-end" style="padding-right: 10%">
                    <div class="card" style="border: 0px;">
                        <div class="card-header header-grandient text-teal h4 text-center">Ingreso de Usuarios</div>
                        <div class="card-body">
                            <div class="title h5 text-center text-muted">Datos Usuario</div>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-6"  style="font-family: 'Varela Round', sans-serif; font-size: 18px">Rut</div>
                                <div class="col-6"><input type="text" id="txtRut" name="txtRut" class="form-control h-75 border-info" value="" required /></div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Nombre</div>
                                <div class="col-6"><input type="text" name="txtNombre" class="form-control h-75 border-info" value="" required/></div>
                            </div>  
                            <div class="row">
                                <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Contraseña</div>
                                <div class="col-6"><input type="password" id="txtPassword" name="txtPassword" class="form-control h-75 border-info" value="" required/></div>
                            </div>  
                            <div class="row">
                                <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Confirmar Contraseña</div>
                                <div class="col-6"><input type="password" id="txtConfirmarPass" name="txtConfirmarPass" class="form-control h-75 border-info" value=""  required/></div>
                            </div>  

                            <div class="row">
                                <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Categoria</div>
                                <div class="col-6">

                                    <select name="dropCategoria">
                                        <option value="" disabled="" selected="true">Seleccionar...</option>
                                        <?php
                                        include_once '../Controlador/CategoriaDaoImp.php';
                                        $opcion = CategoriaDaoImp::ListarTodas();
                                        foreach ($opcion as $value) {
                                            echo "<option> $value </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Activo</div>
                                <div class="col-6">
                                    <input type="checkbox" name="checkActivo" value="ON" /></div>
                            </div>  
                        </div>
                    </div>
                </div>
                <input type="submit" value="Agregar" name="btnAgregar" />
            </div>
        </form>
    </body>
</html>
