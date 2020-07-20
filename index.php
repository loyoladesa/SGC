<?php
//require_once('connectvars.php');
//require_once ('classes/banco.php');

// Start the session
session_start();

// Clear the error message
$error_msg = "";
$controller = new LoginController();

// If the user isn't logged in, try to log them in
if (!isset($_SESSION['id'])) {
    if (isset($_POST['submit'])) {
        // Connect to the database
//        $banco = new Banco(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME);
//        $banco->conectar();
        

        // Grab the user-entered log-in data
        $user_username = $_POST['usuario'];       
        $user_password = $_POST['senha'];
                
        
        

        if (!empty($user_username) && !empty($user_password)) {
            // Look up the username and password in the database
            
            $row = $controller->login($user_username, $user_password);
            
            if ($row <> null) {
                // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                $_SESSION['id'] = $row['id'];
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['perfil'] = $row['perfil'];
                setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                setcookie('usuario', $row['usuario'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                setcookie('perfil', $row['perfil'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/contratos.php';
                header('Location: ' . $home_url);
            } else {
                // The username/password are incorrect so set an error message
                //$error_msg = 'Sorry, you must enter a valid username and password to log in.';
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login_negado.php';
                header('Location: ' . $home_url);
            }
        } else {
            // The username/password weren't entered so set an error message
            //$error_msg = 'Sorry, you must enter your username and password to log in.';
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login_negado.php';
            header('Location: ' . $home_url);
        }
    }
} else {
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/contratos.php';
    header('Location: ' . $home_url);
}
?>

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
                echo('<p class="login">You are logged in as ' . $_SESSION['usuario'] . '.</p>');
            }
                ?>                      
    
        </div>
    </body>


</html>
