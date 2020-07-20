<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.Created : Sidney Loyola de Sá
 * Date: 27/05/2020
 * Last Modified: 27/05/2020
 * @author Sidney Loyola
 */

/**
 * Description of Endereco
 *
 * @author rochelly
 */
class Endereco {
    //put your code here
    var $id = "";
    var $logradouro = "";
    var $numero = "";
    var $complemento= "";
    var $bairro = "";
    var $cidade = "";
    var $estado = "";
    var $cep = "";
    
    
    
    function get_id() {
        return $this->id;
    }

    function get_logradouro() {
        return $this->logradouro;
    }

    function get_numero() {
        return $this->numero;
    }

    function get_complemento() {
        return $this->complemento;
    }

    function get_bairro() {
        return $this->bairro;
    }

    function get_cidade() {
        return $this->cidade;
    }

    function get_estado() {
        return $this->estado;
    }

    function get_cep() {
        return $this->cep;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_logradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function set_numero($numero) {
        $this->numero = $numero;
    }

    function set_complemento($complemento) {
        $this->complemento = $complemento;
    }

    function set_bairro($bairro) {
        $this->bairro = $bairro;
    }

    function set_cidade($cidade) {
        $this->cidade = $cidade;
    }

    function set_estado($estado) {
        $this->estado = $estado;
    }

    function set_cep($cep) {
        $this->cep = $cep;
    }


}
