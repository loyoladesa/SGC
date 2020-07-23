<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FornecedoresController
 *
 * @author loyol
 */

require_once('connectvars.php');
require_once ('classes/banco.php');
require_once './classes/Endereco.php';
require_once './classes/Fornecedor.php';

class FornecedoresController {
    //put your code here
    
    var $banco;
    var $view;
    
    
    function FornecedoresController(){
        $this->banco = new Banco(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME);
        $this->view = ROOT_PATH . "/view/dashboard.php";
        $this->fornecedor = new Fornecedor();
    }
    
    function cadastrarFornecedor() {
        $this->banco->conectar();
                
        $endereco = new Endereco();
        $fornecedor = new Fornecedor();

        // Grab the profile data from the POST
        $fornecedor->set_empresa($this->banco->preparar($_POST['empresa']));
        $fornecedor->set_CNPJ($this->banco->preparar($_POST['cnpj']));
        $fornecedor->set_email($this->banco->preparar($_POST['email']));
        $fornecedor->set_telefone($this->banco->preparar($_POST['telefone']));
        $fornecedor->set_contato($this->banco->preparar($_POST['contato']));
        $fornecedor->set_assinatura($this->banco->preparar($_POST['assinatura']));

        $endereco->set_logradouro($this->banco->preparar($_POST['logradouro']));
        $endereco->set_numero($this->banco->preparar($_POST['numero']));
        $endereco->set_complemento($this->banco->preparar($_POST['complemento']));
        $endereco->set_bairro($this->banco->preparar($_POST['bairro']));
        $endereco->set_cidade($this->banco->preparar($_POST['cidade']));
        $endereco->set_estado($this->banco->preparar($_POST['estado']));
        $endereco->set_cep($this->banco->preparar($_POST['cep']));
        $fornecedor->set_endereco($endereco);

        $this->banco->inserir_fornecedor($fornecedor);        
    }    
    
}


            $fornController = new FornecedoresController();         

            if (isset($_POST['submit'])) {                
                try{
                    $fornController->cadastrarFornecedor();
                    $home_url = 'http://loyoladesa.com.br/contratos/view/fornecedores/fornecedor_cadastrado.php';
                    header('Location: ' . $home_url);   
                    
                } catch (Exception $ex) {
                    $home_url = 'http://loyoladesa.com.br/contratos/view/fornecedores/cadastro_negado.php';
                    header('Location: ' . $home_url); 
                }                          
            }else{
                $home_url = 'http://loyoladesa.com.br/contratos/index.php';
                    header('Location: ' . $home_url); 
            }
