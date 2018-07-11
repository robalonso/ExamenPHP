<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!-- font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

        <!-- style font-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="css/registroCliente.css">
        <!-- JS -->
        <script type="text/javascript" src="js/recepcionMuestra.js"></script>
        <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <form action="s_RegistroClientes.php" method="POST">
            <div class="container col-12">
                <br>
                <div class="row ">
                    <div class="col-6">
                        <img src="img/pic1.jpg" alt="pic1">
                    </div>
                    <div class="col-6 justify-content-end" style="padding-right: 10%">
                        <div class="card" style="border: 0px;">
                            <div class="card-header header-grandient text-white h4 text-center">Registro de Clientes</div>
                            <div class="card-body">
                                <div class="title h5 text-center text-muted">Datos Empresa</div>
                                <hr>
                                <div class="row justify-content-center">
                                    <div class="col-6"  style="font-family: 'Varela Round', sans-serif; font-size: 18px">Rut</div>
                                    <div class="col-6"><input type="text" name="txtRutEmpresa" class="form-control h-75" value="" /></div>
                                </div>
                                <div class="row">
                                    <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Nombre</div>
                                    <div class="col-6"><input type="text" name="txtNombreEmpresa" class="form-control h-75" value="" /></div>
                                </div>  
                                <div class="row">
                                    <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Contraseña</div>
                                    <div class="col-6"><input type="password" name="txtPassEmpresa" class="form-control h-75" value="" /></div>
                                </div>  
                                <div class="row">
                                    <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Confirmar Contraseña</div>
                                    <div class="col-6"><input type="password" name="txtPassConfirm" class="form-control h-75" value="" /></div>
                                </div>  
                                <div class="row">
                                    <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Dirección</div>
                                    <div class="col-6"><input type="text" name="txtDireccionEmpresa" class="form-control h-75" value="" /></div>
                                </div>
                                <br>
                                <div class="title h5 text-center text-muted">Contacto</div>
                                <hr>
                                <div class="row justify-content-center">
                                    <div class="col-6"  style="font-family: 'Varela Round', sans-serif; font-size: 18px">Rut</div>
                                    <div class="col-6"><input type="text" name="txtRutContacto" class="form-control h-75" value="" /></div>
                                </div>
                                <div class="row">
                                    <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Nombre</div>
                                    <div class="col-6"><input type="text" name="txtNombreContacto" class="form-control h-75" value="" /></div>
                                </div>  
                                <div class="row">
                                    <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Email</div>
                                    <div class="col-6"><input type="email" name="txtEmail" class="form-control h-75" value="" /></div>
                                </div>  
                                <div class="row">
                                    <div class="col-6" style="font-family: 'Varela Round', sans-serif; font-size: 18px">Teléfono</div>
                                    <div class="col-6"><input type="text" name="txtTelefono" class="form-control h-75" value="" /></div>
                                </div>  
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Registrar" name="btnRegistrar" class="btn btn-secondary" style="font-family: 'Varela Round', sans-serif; font-size: 18px"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
