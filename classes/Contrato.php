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
class Contrato {
    //put your code here
    var $id;
    var $status;
    var $objeto;
    var $inicio;
    var $termino;
    var $valor_mensal;
    var $valor_anual;
    var $mao_obra;
    var $processo;
    var $prazo;
    var $apoio;
    
    var $unidades = array();
    var $gestores = array();
    var $termos = array();
    
    function get_id() {
        return $this->id;
    }

    function get_status() {
        return $this->status;
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

    function get_mao_obra() {
        return $this->mao_obra;
    }

    function get_processo() {
        return $this->processo;
    }

    function get_prazo() {
        return $this->prazo;
    }

    function get_apoio() {
        return $this->apoio;
    }

    function get_unidades() {
        return $this->unidades;
    }

    function get_gestores() {
        return $this->gestores;
    }

    function get_termos() {
        return $this->termos;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_status($status) {
        $this->status = $status;
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

    function set_mao_obra($mao_obra) {
        $this->mao_obra = $mao_obra;
    }

    function set_processo($processo) {
        $this->processo = $processo;
    }

    function set_prazo($prazo) {
        $this->prazo = $prazo;
    }

    function set_apoio($apoio) {
        $this->apoio = $apoio;
    }

    function set_unidades($unidades) {
        $this->unidades = $unidades;
    }

    function set_gestores($gestores) {
        $this->gestores = $gestores;
    }

    function set_termos($termos) {
        $this->termos = $termos;
    }

        
    
    /* Exemplo de Lista no PHP
     * Definição mais longa, porém mais fácil de entender
    $lista = array();
    $lista[0] = 'Pão';
    $lista[1] = 'Ovos';
    $lista[2] = 'Carne';
    $lista[3] = 'Macarrão';
    }
     * 
     */
    }
