<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Registro de Clientes</h3>

        <form action="s_RegistroClientes.php" method="POST">

            <table border="0">

                <tbody>
                    <tr><td>Datos Empresa</td></tr>
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" name="txtRutEmpresa" value="" /></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" name="txtNombreEmpresa" value="" /></td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td><input type="password" name="txtPassEmpresa" value="" /></td>
                    </tr>
                    <tr>
                        <td>Confirmar Contraseña</td>
                        <td><input type="password" name="txtPassConfirm" value="" /></td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td><input type="text" name="txtDireccionEmpresa" value="" /></td>
                    </tr>
                    <tr><td>Contacto</td></tr>
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" name="txtRutContacto" value="" /></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" name="txtNombreContacto" value="" /></td>
                    </tr>    
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="txtEmail" value="" /></td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td><input type="text" name="txtTelefono" value="" /></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Registrar" name="btnRegistrar" />
        </form>
    </body>
</html>
