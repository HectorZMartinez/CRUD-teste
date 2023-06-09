<?php
include("conecta.php");
include("validarLog.php");

// Obtém o ID do usuário atual da sessão
$userId = $_SESSION["usuario"]["idusuario"];

// Verifica se o ID do contato foi fornecido como parâmetro
if (isset($_POST["idcontato"])) {
    $contatoId = $_POST["idcontato"];

    // Cria o dsn com as informações do banco
    $dsn = "mysql:host=$host;port=$port;dbname=$db";

    // Cria uma instância do PDO representando a conexão com o banco
    $pdo = new PDO($dsn, $user, $password);

    // Prepara a consulta SQL para deletar o contato
    $deleteSql = "DELETE FROM contatos WHERE idcontato = ? AND user_id = ?";

    // Prepara um objeto PDOStatement para executar a consulta de deleção
    $deleteStmt = $pdo->prepare($deleteSql);

    // Vincula o ID do contato e o ID do usuário aos parâmetros da consulta
    $deleteStmt->bindValue(1, $contatoId);
    $deleteStmt->bindValue(2, $userId);

    // Executa a consulta de deleção
    $deleteStmt->execute();

    // Fecha a conexão com o banco
    $pdo = null;

    // Redireciona de volta para a página de contatos
    header("Location: contatos.php");
    exit();
} else {
    // Caso o ID do contato não tenha sido fornecido, redireciona para a página de contatos
    header("Location: contatos.php");
    exit();
}
