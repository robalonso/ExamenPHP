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
        <link rel="stylesheet" href="css/startPage.css">

        <!-- JS -->
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body>
        <?php
        // put your code here
        ?>
        <nav class="navbar navbar-expand-lg navbar-light header-grandient">
            <a class="navbar-brand text-white" href="#">Instituto de Salud Pública de Chile</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-right" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-secondary drop-gradient text-white h5" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Registrarse
                        </a>
                        <div class="dropdown-menu  drop-gradient" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item text-dark" href="v_RegistroCliente.php">Empresa</a>
                            <a class="dropdown-item text-dark" href="v_RegistroClientesPersona.php">Particular</a>
                        </div>
                    </li>
                    <li class="nav-item active pl-3">
                        <a class="nav-link btn btn-primary h4 text-white"  href="#" data-toggle="modal" data-target="#login-modal">Entrar <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content loginmodal-container">
                    <div class="modal-body">
                        <h1>Iniciar Sesión</h1><br>
                        <form action="s_Login.php" method="POST">
                            <input type="text" name="txtRut" placeholder="Rut" value="">
                            <input type="password" name="txtPass" placeholder="Contraseña">
                            <input type="submit" name="btnLogin" class="login loginmodal-submit" value="Entrar">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
