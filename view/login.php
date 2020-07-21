<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo/estilo.css">
        <link rel="stylesheet" type="text/css" href="estilo/style.css">
        <title>SGC - Sistema de Gerenciamento de Contratos</title>
    </head>

    <body class="center-form">
        <div class="center-form">
            
             <?php
            // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
            if (empty($_SESSION['id'])) {
                if($error_msg == ""){
                    ?>
                   <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <fieldset>
                        <legend>SGC - Sistema de Gerenciamento de Contratos</legend>
                        <label for="username" class="hora">Usuário:</label>
                        <input type="text" name="usuario" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
                        <label for="password" class="hora">Senha:</label>
                        <input type="password" name="senha" />
                    </fieldset>

                    <a href="signup.php"><input class="hora" type="button" value="NOVO USUÁRIO" /></a>                         
                    <input class="hora" type="submit" value="ENTRAR" name="submit"/>



                </form> 
            <?php
                }else{
                    echo '<p class="error">' . $error_msg . '</p>';
                }           
                
            } else {
                // Confirm the successful log-in
                header('Location: ' .  "contratos/view/dashboard.php");
                //echo('<p class="login">You are logged in as ' . $_SESSION['usuario'] . '.</p>');
            }
                ?>                      
    
        </div>
    </body>
</html>
