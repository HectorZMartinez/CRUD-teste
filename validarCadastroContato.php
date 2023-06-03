<?php
include("conecta.php");
include("validarLog.php"); // Inicia a sessão para obter o ID do usuário atual e valida

// Cria o dsn com as informações do banco
$dsn = "mysql:host=$host;port=$port;dbname=$db";

// Cria uma instância do PDO representando a conexão com o banco
$pdo = new PDO($dsn, $user, $password);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nomeContato = $_POST["nomeContato"];
    $numeroContato = $_POST["numeroContato"];
    $enderecoContato = $_POST["enderecoContato"];

    // Obtém o ID do usuário atual da sessão
    $userId = $_SESSION["usuario"]["idusuario"];

    // Prepara a consulta SQL para inserir o contato vinculado ao usuário atual
    $sql = "INSERT INTO contatos (nome, numero, endereco, user_id) VALUES (?, ?, ?, ?)";

    // Prepara um objeto PDOStatement para executar a consulta
    $stmt = $pdo->prepare($sql);

    // Vincula os valores aos parâmetros da consulta
    $stmt->bindValue(1, $nomeContato);
    $stmt->bindValue(2, $numeroContato);
    $stmt->bindValue(3, $enderecoContato);
    $stmt->bindValue(4, $userId);

    // Executa a consulta
    if ($stmt->execute()) {
        // Contato salvo com sucesso

        // Redireciona para a mesma página exibindo a mensagem de sucesso como parâmetro na URL
        header("Location: select.php");
        exit();
    } else {
        // Erro ao salvar o contato
        echo "Erro ao cadastrar o contato: " . $stmt->errorInfo()[2];
    }
}

$pdo = null; // Fecha a conexão com o banco
