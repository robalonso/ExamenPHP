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
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <form action="s_Login.php" method="POST">
            <table>
                <tbody>
                    <tr>
                        <td>Usuario</td>
                        <td><input type="text" name="txtRut" value="" required></td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td><input type="password" name="txtPass" value="" required></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Iniciar Sesión" name="btnLogin" />
        </form>
    </body>
</html>
