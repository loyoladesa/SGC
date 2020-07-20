<?php

require_once('Endereco.php');
/**
 * Created : Sidney Loyola de Sá
 * Date: 27/05/2020
 * Last Modified: 27/05/2020
 * @author Sidney Loyola
 */
class Fornecedor {
    
    var $CNPJ = "";
    var $empresa = "";
    var $contato = "";
    var $telefone = "";
    var $email= "";
    var $assinatura = "";
    var $endereco;
    
    function iniciar(){
        $this->endereco = new Endereco();
    }
    
    function get_CNPJ() {
        return $this->CNPJ;
    }

    function get_empresa() {
        return $this->empresa;
    }

    function get_contato() {
        return $this->contato;
    }

    function get_telefone() {
        return $this->telefone;
    }

    function get_email() {
        return $this->email;
    }

    function get_assinatura() {
        return $this->assinatura;
    }

    function get_endereco(): Endereco {
        if($this->endereco == null){
            $this->endereco = new Endereco();
        }
        return $this->endereco;
    }

    function set_CNPJ($CNPJ) {
        $this->CNPJ = $CNPJ;
    }

    function set_empresa($empresa) {
        $this->empresa = $empresa;
    }

    function set_contato($contato) {
        $this->contato = $contato;
    }

    function set_telefone($telefone) {
        $this->telefone = $telefone;
    }

    function set_email($email) {
        $this->email = $email;
    }

    function set_assinatura($assinatura) {
        $this->assinatura = $assinatura;
    }

    function set_endereco(Endereco $endereco) {
        $this->endereco = $endereco;
    }


}
