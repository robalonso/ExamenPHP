<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

        <!-- sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body>
        <h3>Agregar Muestra</h3>
        <form action="s_RecepcionMuestra.php" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <table>         
                                <tbody> 
                                    <tr>
                                        <td><input type="text" name="txtCodigoCliente" class="form-control" value="" placeholder="Código Cliente" onclick="buscar(this.value)"/></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="txtRutCliente" value="" placeholder="Rut Cliente"/></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="txtNombreCliente" value="" placeholder="Nombre Cliente" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <table>         
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
                        </td>
                    </tr>
                    <tr>
                        <td class="form-group">
                            <label for="dropTipoMuestra">Tipo de análisis a realizar</label>
                            <select name="dropTipoMuestra" id="dropTipoMuestra">
                                <option value="" disabled="" selected="true">Seleccionar...</option>
                                <?php
                                include_once '../Controlador/TipoAnalisisDaoImp.php';
                                $daoTipo = new TipoAnalisisDaoImp();
                                $tipos = $daoTipo->ListarTodos();
                                foreach ($tipos as $valueTipos) {
                                    echo "<option> $valueTipos </option>";
                                }
                                ?>
                            </select>
                        </td> 
                    </tr>
                </tbody>
            </table>

            <input type="submit" value="Agregar" name="btnAgregar" />
        </form>
    </body>
</html>
