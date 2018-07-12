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
                        <td style="width: 180px">
                            Rut Empleado:
                            <input type = "text" name = "txtRut" value = "<?php echo $dto->getRutEmpleado(); ?>" readonly = "readonly" />
                        </td>
                        <td style="width: 180px">
                            Nombre Empleado:
                            <input type="text" name="txtNombre" value="<?php echo $dto->getNombreEmpleado(); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 180px">
                            Nueva Contraseña:
                            <input type="password" name="txtPass" value="" />
                        </td>
                        <td style="width: 180px">
                            Confirmar Contraseña:
                            <input type="password" name="txtConfirmarPass" value="" />
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 180px">
                            Categoría:
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
                        </td>
                        <td style="width: 180px">
                            Activo:
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Actualizar" name="btnActualizar" />
        </form>
    <?php }
    ?>
</body>
</html>
