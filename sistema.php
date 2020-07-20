<?php
/* * To change this license header, choose License Headers in Project Properties. 
 * * To change this template file, choose Tools | Templates
 *  * and open the template in the editor.
 *  */

require_once('appvars.php');
require_once('connectvars.php');

session_start();
// If the session vars aren't set, try to set them with a cookie 
if (!isset($_SESSION['id'])) {
    if (isset($_COOKIE['id']) && isset($_COOKIE['usuario'])) {
        $_SESSION['id'] = $_COOKIE['id'];
        $_SESSION['usuario'] = $_COOKIE['usuario'];
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <title>SGA - Sistema de Gerenciamento de ATAS</title> 
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    <script type="text/javascript">
        function marcarTodos(marcar) {
            var itens = document.getElementsByName('cores[]');

            if (marcar) {
                document.getElementById('acao').innerHTML = 'Desmarcar Todos';
            } else {
                document.getElementById('acao').innerHTML = 'Marcar Todos';
            }

            var i = 0;
            for (i = 0; i < itens.length; i++) {
                itens[i].checked = marcar;
            }

        }
    </script>

    <body class="center-form">  
        <div class="center-form">
            <?php
            // Make sure the user is logged in before going any further. 
            if (!isset($_SESSION['id'])) {
                echo '<p >Please <a href="index.php">log in</a> to access this page.</p>';
                exit();
            } else {
                echo '<table border="1">';
                echo '<tr>';
                echo '<td colspan="4">Você está logado como ' . $_SESSION['usuario'] . ' e PERFIL =  ' . $_SESSION['perfil'] . '<a href="logout.php">Log out</a></td> ';
                echo '</tr>';
            }
            ?>

            <tr>  
                <td>usuario</td> 
                <td>perfil</td>  
                <td>aprovacao</td>
                <td>
                    <input type="checkbox" name="cores[]" onclick="marcarTodos(this.checked);">
                        <span id="acao">Marcar</span>
                </td>
            </tr>

            <?php
            //  
// Connect to the database//  
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); ////  
// Grab the profile data from the database//  
            if (isset($_SESSION['id'])) {//    
                $query = "SELECT usuario,perfil,aprovacao FROM Usuarios where verificado = true and aprovacao = false";
                $result = mysqli_query($dbc, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo ' ' . '<td>' . $row['usuario'] . '</td>';
                    echo ' ' . '<td>' . $row['perfil'] . '</td>';
                    echo ' ' . '<td>' . $row['aprovacao'] . '</td>';
                    echo ' ' . '<td><input type="checkbox" name="cores[]"></td>';
                    echo '</tr>';
                }

                mysqli_close($dbc);
            }//                                                                     
            ?>
            </table>
        </div>
    </body> 
</html>