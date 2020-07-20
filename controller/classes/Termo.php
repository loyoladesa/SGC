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
class Termo {
    //put your code here
    
    var $numero;    
    var $fornecedor;
    var $tipo;
    var $objeto;
    var $inicio;
    var $termino;
    var $valor_mensal;
    var $valor_anual;
    var $valor_garantia;
    var $dou;
    var $registro_termo;
    var $registro_garantia;
    
    
    function get_numero() {
        return $this->numero;
    }

    function get_fornecedor() {
        return $this->fornecedor;
    }

    function get_tipo() {
        return $this->tipo;
    }

    function get_objeto() {
        return $this->objeto;
    }

    function get_inicio() {
        return $this->inicio;
    }

    function get_termino() {
        return $this->termino;
    }

    function get_valor_mensal() {
        return $this->valor_mensal;
    }

    function get_valor_anual() {
        return $this->valor_anual;
    }

    function get_valor_garantia() {
        return $this->valor_garantia;
    }

    function get_dou() {
        return $this->dou;
    }

    function get_registro_termo() {
        return $this->registro_termo;
    }

    function get_registro_garantia() {
        return $this->registro_garantia;
    }

    function set_numero($numero) {
        $this->numero = $numero;
    }

    function set_fornecedor($fornecedor) {
        $this->fornecedor = $fornecedor;
    }

    function set_tipo($tipo) {
        $this->tipo = $tipo;
    }

    function set_objeto($objeto) {
        $this->objeto = $objeto;
    }

    function set_inicio($inicio) {
        $this->inicio = $inicio;
    }

    function set_termino($termino) {
        $this->termino = $termino;
    }

    function set_valor_mensal($valor_mensal) {
        $this->valor_mensal = $valor_mensal;
    }

    function set_valor_anual($valor_anual) {
        $this->valor_anual = $valor_anual;
    }

    function set_valor_garantia($valor_garantia) {
        $this->valor_garantia = $valor_garantia;
    }

    function set_dou($dou) {
        $this->dou = $dou;
    }

    function set_registro_termo($registro_termo) {
        $this->registro_termo = $registro_termo;
    }

    function set_registro_garantia($registro_garantia) {
        $this->registro_garantia = $registro_garantia;
    }


}
