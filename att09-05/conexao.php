<?php

// Defina as informações de conexão com o banco de dados
$servidor = "localhost"; // Geralmente é 'localhost' para bancos de dados locais
$usuario = "root"; // Seu nome de usuário do banco de dados
$senha = ""; // Sua senha do banco de dados
$banco = "meubanco2"; // O nome do banco de dados que criamos

// Variável para armazenar a conexão
$conexao = null;

// Tenta estabelecer a conexão com o banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if (!$conexao) {
    $mensagem_conexao = "<p style='color: red;'>Erro ao conectar com o banco de dados: " . mysqli_connect_error() . "</p>";
} else {
    $mensagem_conexao = "<p style='color: green;'>Conexão com o banco de dados realizada com sucesso usando MySQLi!</p>";
}

// Função para obter a conexão (útil se você precisar da conexão em outros arquivos)
function obterConexaoMySQLi() {
    global $conexao;
    return $conexao;
}

// Função para exibir a mensagem de conexão (para o nosso exemplo no HTML)
function exibirMensagemConexaoMySQLi() {
    global $mensagem_conexao;
    echo $mensagem_conexao;
}

?>