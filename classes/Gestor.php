<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Created : Sidney Loyola de Sá
 * Date: 27/05/2020
 * Last Modified: 27/05/2020
 * @author Sidney Loyola
 */
class Gestor {
    
    var $id;
    var $nome;
    var $email;
    var $papel;
    
    function get_papel() {
        return $this->papel;
    }

    function set_papel($papel) {
        $this->papel = $papel;
    }

        function get_id() {
        return $this->id;
    }

    function get_nome() {
        return $this->nome;
    }

    function get_email() {
        return $this->email;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_nome($nome) {
        $this->nome = $nome;
    }

    function set_email($email) {
        $this->email = $email;
    }


}
