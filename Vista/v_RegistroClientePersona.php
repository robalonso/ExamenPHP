<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Registro de Clientes</h3>

        <form action="s_RegistroClientesPersona.php">

            <table border="0">

                <tbody>
                    <tr>
                        <td>Rut</td>
                        <td><input type="text" name="txtRut" value="" /></td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" name="txtNombre" value="" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="txtPass" value="" /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="txtEmail" value="" /></td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td><input type="text" name="txtTelefono" value="" /></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Registrar" name="btnRegistrar" />
        </form>
    </body>
</html>
