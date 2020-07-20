<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */

            require_once('../connectvars.php');
            require_once('../classes/banco.php');
            //require_once('../classes/Endereco.php');
            //require_once('../classes/Fornecedor.php');

            // Connect to the database
            $banco = new Banco(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME);
            
            
            $endereco = new Endereco();
            $fornecedor = new Fornecedor();
            
            $fornecedor->set_CNPJ('123');
            $fornecedor->set_empresa('teste');
            
            $banco->inserir_fornecedor($fornecedor);