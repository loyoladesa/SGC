<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema de Gerenciamento de ATAS - Novo Usuário</title>
        <link rel="stylesheet" type="text/css" href="estilo/style.css" />
        <link rel="stylesheet" type="text/css" href="estilo/estilo.css" />
    </head>

    <body class="center-form">
        <div class="center-form">


            <?php
            require_once('appvars.php');
            require_once('connectvars.php');

            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            if (isset($_POST['submit'])) {
                // Grab the profile data from the POST
                $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
                $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
                $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
                $email = mysqli_real_escape_string($dbc, trim($_POST['email']));

                if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
                    // Make sure someone isn't already registered using this username
                    $query = "SELECT * FROM Usuarios WHERE Usuario = '$username';";
                    $data = mysqli_query($dbc, $query);
                    if (mysqli_num_rows($data) == 0) {
                        
                        $codigo = mt_rand(1,100);
                        // The username is unique, so insert the data into the database
                        $query = "INSERT INTO Usuarios (Usuario, Senha,Data_Cadastro,Email,Aprovacao,Verificado,Perfil,codigo) VALUES ('$username', SHA('$password1'), NOW(),'$email',false,false,'administrador','$codigo');";
                        mysqli_query($dbc, $query);


                        $headers = 'From: admin@gerenciamentodeatas.com.br' . "\r\n" .
                                'Reply-To: admin@gerenciamentodeatas.com.br' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();

                        $email_usuario = $email;
                        

                        $corpo = ' Olá! Bem-vindo ao Sistema de Gerenciamento de ATAS!
                        
                        Clique no link a seguir para confirmar seu cadastro:
                       
                        http://loyoladesa.com.br/sga/validarEmail.php?email=' . $email_usuario . '&codigo=' . $codigo . '';

                        if (mail('loyoladesa@gmail.com', 'Novo Cadastro', $corpo, $headers)) {
                            echo '<p>Sua nova conta foi criada com sucesso. Um link de validação de cadastro foi enviado para o seu email. Você está pronto para <a href="index.php">log in</a>.</p>';
                        } else {
                            echo 'aconteceu um erro!';
                        }
                        // Confirm success with the user


                        mysqli_close($dbc);
                        exit();
                    } else {
                        // An account already exists for this username, so display an error message
                        echo '<p class="error">Uma conta já existe para esse usuário. Por favor use um usuário diferente.</p>';
                        $username = "";
                    }
                } else {
                    echo '<p class="error">Você deve preencher todos os dados incluindo a senha desejada duas vezes</p>';
                }
            }

            mysqli_close($dbc);
            ?>


            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <fieldset>
                    <legend>Sistema de Gerenciamento de ATAS - Novo Usuário</legend>
                    <label  for="username" class="hora">Usuário:</label>
                    <input  type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
                    <label  for="password1" class="hora">Senha:</label>
                    <input  type="password" id="password1" name="password1" /><br />
                    <label  for="password2" class="hora">Senha (repetir):</label>
                    <input  type="password" id="password2" name="password2" /><br />
                    <label  for="email" class="hora">Email:</label>
                    <input  type="text" id="email" name="email" /><br />
                    <label  for="nomeCompleto" class="hora">Nome Completo:</label>
                    <input  type="text" id="nome" name="nome" /><br />
                </fieldset>
                <a href="index.php"><input class="hora" type="button" value="Voltar" /></a>  
                <input type="submit" value="Sign Up" name="submit" />
            </form>
        </div>
    </body> 
</html>
