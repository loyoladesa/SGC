<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author loyol
 */

require_once('connectvars.php');
require_once ('classes/banco.php');


class LoginController {
    //put your code here
    
    var $view;
    var $model;
    
    function LoginController(){
        $this->model = new Banco(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME);
    }
    
    function login($user,$pwd) {
        $this->model->conectar();
        $user_username = $this->model->preparar($user);
        $user_password = $this->model->preparar($pwd);
         
         if ($this->model->login($user_username, $user_password)){
             $row = $this->model->obterUsuario($user_username, $user_password);
             return $row;
         }
         return null;
    }
    
    function get_view() {
        return $this->view;
    }

    function get_model() {
        return $this->model;
    }

    function set_view($view) {
        $this->view = $view;
    }

    function set_model($model) {
        $this->model = $model;
    }


    
}
