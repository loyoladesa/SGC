<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema de Gerenciamento de Contratos</title>
        <link rel="stylesheet" type="text/css" href="estilo/style.css" />
        <link rel="stylesheet" type="text/css" href="estilo/estilo.css" />
    </head>

    <body class="center-form">
        <div class="center-form">


            <?php
            require_once('../connectvars.php');
            require_once('../classes/banco.php');
            //require_once('../classes/Endereco.php');
            //require_once('../classes/Fornecedor.php');

            // Connect to the database
            $banco = new Banco(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME);
            $banco->conectar();
            $endereco = new Endereco();
            $fornecedor = new Fornecedor();

            if (isset($_POST['submit'])) {
                // Grab the profile data from the POST
                $fornecedor->set_empresa($banco->preparar($_POST['empresa']));
                $fornecedor->set_CNPJ($banco->preparar($_POST['cnpj']));
                $fornecedor->set_email($banco->preparar($_POST['email']));
                $fornecedor->set_telefone($banco->preparar($_POST['telefone']));
                $fornecedor->set_contato($banco->preparar($_POST['contato']));
                $fornecedor->set_assinatura($banco->preparar($_POST['assinatura']));
                
                $endereco->set_logradouro($banco->preparar($_POST['logradouro']));
                $endereco->set_numero($banco->preparar($_POST['numero']));
                $endereco->set_complemento($banco->preparar($_POST['complemento']));
                $endereco->set_bairro($banco->preparar($_POST['bairro']));
                $endereco->set_cidade($banco->preparar($_POST['cidade']));
                $endereco->set_estado($banco->preparar($_POST['estado']));
                $endereco->set_cep($banco->preparar($_POST['cep']));
                $fornecedor->set_endereco($endereco);
                
                $banco->inserir_fornecedor($fornecedor);
                
                $home_url = 'http://loyoladesa.com.br/contratos/contratos.php';
                header('Location: ' . $home_url);
                
            }

            mysqli_close($banco->get_dbc());
            ?>


            <form method="post" action="http://loyoladesa.com.br/contratos/fornecedores/cadastrar_fornecedores.php">
                <fieldset>
                    <legend>Sistema de Gerenciamento de Contratos - Novo Fornecedor</legend>
                    
                    <table>
                        <tr>
                            <td >
                                <label for="empresa" class="hora">Empresa</label>
                            </td>
                            <td>
                                <label for="cnpj" class="hora">CNPJ</label>
                            </td>                            
                        </tr>
                        <tr>
                            <td width=>
                                <input type="text" id="empresa" name="empresa" size="50"/>
                            </td>
                            <td>
                                <input type="text" id="cnpj" name="cnpj" size="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email" class="hora">E-mail</label>
                            </td>
                            <td>
                                <label for="telefone" class="hora">Telefone</label>
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <input type="email" id="email" name="email" size="50"/>
                            </td>
                            <td>
                                <input type="tel" id="telefone" name="telefone" size="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="contato" class="hora">Contato</label>
                            </td>
                            <td>
                                <label for="assinatura" class="hora">Nome da Assinatura</label>
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="contato" name="contato" size="50"/>
                            </td>
                            <td>
                                <input type="text" id="assinatura" name="assinatura" size="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="logradouro" class="hora">Logradouro</label>
                            </td>
                            <td>
                                <label for="numero" class="hora">Numero</label>
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="logradouro" name="logradouro" size="50"/>
                            </td>
                            <td>
                                <input type="text" id="numero" name="numero" size="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="complemento" class="hora">Complemento</label>
                            </td>
                            <td>
                                <label for="bairro" class="hora">Bairro</label>
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="complemento" name="complemento" size="50"/>
                            </td>
                            <td>
                                <input type="text" id="bairro" name="bairro" size="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cidade" class="hora">Cidade</label>
                            </td>
                            <td>
                                <label for="estado" class="hora">Estado</label>
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="cidade" name="cidade" size="50"/>
                            </td>
                            <td>
                                <input type="text" id="estado" name="estado" size="50"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cep" class="hora">CEP</label>
                            </td>
                            <td>
                                <label for="info" class="hora">Informação Adicional</label>
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="cep" name="cep" size="50"/>
                            </td>
                            <td>
                                <input type="text" id="info" name="info" size="50" />
                            </td>
                        </tr>
                    </table>                    
                </fieldset>
                <a href="../contratos.php"><input class="hora" type="button" value="Voltar" /></a>  
                <input type="submit" value="Cadastrar" name="submit" />
            </form>
        </div>
    </body> 
</html>



