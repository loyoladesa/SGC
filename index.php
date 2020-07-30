<?php

  define('ROOT_PATH', dirname(__FILE__));
require_once 'controller/LoginController.php';

// Start the session
session_start();
   $error_msg = "";
   
   $controller = new LoginController();
   
   // If the user isn't logged in, try to log them in
        if (!isset($_SESSION['id'])) {
            if (isset($_POST['submit'])) {

                // Grab the user-entered log-in data
                $user_username = $_POST['usuario'];       
                $user_password = $_POST['senha'];                

                if (!empty($user_username) && !empty($user_password)) {
                    // Look up the username and password in the database            
                    try{
                        $row = $controller->login($user_username, $user_password);            
                        if ($row <> null) {
                            // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['usuario'] = $row['usuario'];
                            $_SESSION['perfil'] = $row['perfil'];

                            setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                            setcookie('usuario', $row['usuario'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                            setcookie('perfil', $row['perfil'], time() + (60 * 60 * 24 * 30));  // expires in 30 days   
                            //setcookie('state', $controller->get_state(), time() + (60 * 60 * 24 * 30));  // expires in 30 days   
                        } 
                    }catch(Exception $e){
                        echo'Ops! Algo inseperado aconteceu!';
                    }
                }        
            }   
        }else{
            $controller->set_state('logged');
        } 


   



//header('Location: ' . $controller->isLogin());
require_once $controller->get_view();



?>


