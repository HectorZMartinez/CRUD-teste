<?php
include("conecta.php");
session_start(); // Inicia a sessão para obter o ID do usuário atual

$conn = new mysqli($host . ':' . $port, $user, $password, $db);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nomeContato = $_POST["nomeContato"];
    $numeroContato = $_POST["numeroContato"];
    $enderecoContato = $_POST["enderecoContato"];

    // Obtém o ID do usuário atual da sessão
    $userId = $_SESSION["user_id"];

    // Prepara a consulta SQL para inserir o contato vinculado ao usuário atual
    $sql = "INSERT INTO contatos (nome, numero, endereco, user_id) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nomeContato, $numeroContato, $enderecoContato, $userId);

    // Executa a consulta
    if ($stmt->execute()) {
        // Contato salvo com sucesso
        echo "Contato cadastrado com sucesso!";
    } else {
        // Erro ao salvar o contato
        echo "Erro ao cadastrar o contato: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
