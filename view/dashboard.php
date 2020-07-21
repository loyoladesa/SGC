<?php
    echo ('Sistema de Gerenciamento de Contratos ');
    echo('<p class="login">You are logged in as ' . $_SESSION['usuario'] . '.</p>');
    echo('<p><a href="../fornecedores/cadastrar_fornecedores.php">Cadastrar Fornecedores</a></p>');
    echo('<a href="../logout.php">sair</a>');
?>