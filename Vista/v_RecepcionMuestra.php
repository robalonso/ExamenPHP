<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Agregar Muestra</h3>
        <form action="s_RecepcionMuestra.php" method="POST">
            <table border="0">
                
                <tbody>
                    <tr>
                        <td>Fecha Recepción</td>
                        <td><input type="date" name="dateFecha" value="" /></td>
                    </tr>
                    <tr>
                        <td>Temperatura</td>
                        <td><input type="text" name="txtTemperatura" value="" /></td>
                    </tr>
                    <tr>
                        <td>Cantidad</td>
                        <td><input type="text" name="txtCantidad" value="" /></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Agregar" name="btnAgregar" />
        </form>
    </body>
</html>
