<?php

require_once('Endereco.php');
require_once('Fornecedor.php');

/* 
 * Created : Sidney Loyola de Sá
 * Date: 25/05/2020
 * Last Modified: 25/05/2020
 */
class Banco{
    
    var $host;
    var $user;
    var $password;
    var $name;
    var $dbc;
    
    function Banco($host,$user,$password,$name){
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->name = $name;
    }
    
    function conectar(){
        $this->dbc = mysqli_connect($this->host, $this->user, $this->password, $this->name);
    }
    
    function close(){
        msqli_close($dbc);
    }
            
    function preparar($nome){
        return mysqli_real_escape_string($this->dbc, trim($nome));
    }
    
   
    
    
    function login($usuario,$senha){
        
        $this->dbc = mysqli_connect($this->host, $this->user, $this->password, $this->name);
        
        $query = "SELECT id, usuario,perfil FROM Usuarios WHERE Usuario = '$usuario' AND Senha = SHA('$senha');";
        $data = mysqli_query($this->dbc, $query);
        
        $retorno = false;

            if (mysqli_num_rows($data) == 1) {
                
               $retorno = true;
             }
             
             mysqli_close($this->dbc);
             
             return $retorno;
    }
    
    function obterUsuario($usuario,$senha){
            $this->dbc = mysqli_connect($this->host, $this->user, $this->password, $this->name);
            
            $query = "SELECT id, usuario,perfil FROM Usuarios WHERE Usuario = '$usuario' AND Senha = SHA('$senha');";
            $data = mysqli_query($this->dbc, $query);
            $row = mysqli_fetch_array($data);
            
            mysqli_close($this->dbc);
            
            return $row;
            
    }
    
    function inserirEndereco(Endereco $endereco){
        $this->dbc = mysqli_connect($this->host, $this->user, $this->password, $this->name);
        
        
            
        
            $logradouro = mysqli_real_escape_string($this->dbc, trim($endereco->get_logradouro()));
            $numero = mysqli_real_escape_string($this->dbc, trim($endereco->get_numero()));
            $complemento = mysqli_real_escape_string($this->dbc, trim($endereco->get_complemento()));
            $bairro = mysqli_real_escape_string($this->dbc, trim($endereco->get_bairro()));
            $cidade = mysqli_real_escape_string($this->dbc, trim($endereco->get_cidade()));
            $estado = mysqli_real_escape_string($this->dbc, trim($endereco->get_estado()));
            $cep = mysqli_real_escape_string($this->dbc, trim($endereco->get_cep()));
            
            $query_1 = "INSERT INTO Endereco (logradouro,numero,complemento,bairro,cidade,estado,cep) "
                    . "VALUES ('$logradouro', '$numero','$complemento','$bairro','$cidade','$estado','$cep');";
            $result = mysqli_query($this->dbc, $query_1);
            
            mysqli_close($this->dbc);
            
            return $result;
        
    }
    
    function obterIDEndereco($logradouro,$numero){
        $this->dbc = mysqli_connect($this->host, $this->user, $this->password, $this->name);
        
            $query_2 = "SELECT id FROM Endereço WHERE logradouro = '$logradouro' AND numero = '$numero';";
            $id_end = 0;
            
            if(mysqli_query($this->dbc, $query_2)){
                $row = mysqli_fetch_array($this->dbc,$query_2);
                $id_end = $row['id'];
            }
            
            
             mysqli_close($this->dbc);
             
             return $id_end;
    }
            
     function inserir_fornecedor(Fornecedor $fornecedor){
          
           $endereco = $fornecedor->get_endereco();
           $id_end = 0;
           
         
               $id_end = $this->obterIDEndereco($endereco->get_logradouro(), $endereco->get_numero()); 
          
            $this->dbc = mysqli_connect($this->host, $this->user, $this->password, $this->name);
            
            $cnpj = $fornecedor->get_CNPJ();
            $empresa = $fornecedor->get_empresa();
            $email = $fornecedor->get_email();
            $telefone = $fornecedor->get_telefone();
            $contato = $fornecedor->get_contato();
            $assinatura = $fornecedor->get_assinatura();
            
            $query_3 = "INSERT INTO Fornecedor (Assinatura,CNPJ,Contato,email,Empresa,id_end,Telefone) "
                    . "VALUES ('$assinatura', '$cnpj','$contato','$email','$empresa','$id_end','$telefone');";
            $result = mysqli_query($this->dbc, $query_3);                 
            mysqli_close($this->dbc);
            
            return $result;
           
            
    }
    
    function get_dbc() {
        return $this->dbc;
    }
    
    

    function set_dbc($dbc) {
        $this->dbc = $dbc;
    }


}
