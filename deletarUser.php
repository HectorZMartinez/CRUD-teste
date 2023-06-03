<?php
include("conecta.php");
session_start();
if (!$_SESSION["usuario"]) {
    header("Location: logar.php");
    exit();
}

$id = $_SESSION["usuario"]["idusuario"];
$error = ""; // Inicializa a mensagem de erro como vazia

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém a senha fornecida no formulário
    $senha = $_POST["senha"];

    // Verifica a senha no banco de dados
    $sql = "SELECT * FROM usuario WHERE idusuario = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $senhaSalva = $row["senha"];

        // Verifica se a senha fornecida coincide com a senha salva no banco de dados
        if ($senha === $senhaSalva) {
            // Exclui a conta do usuário
            $deleteSql = "DELETE FROM usuario WHERE idusuario = $id";
            $conn->query($deleteSql);

            // Remove o cookie do usuário (se existir)
            if (isset($_COOKIE["usuario"])) {
                setcookie("usuario", "", time() - 3600);
            }

            // Encerra a sessão
            session_destroy();

            // Redirecionar para a página principal com a mensagem de sucesso
            $success = "Conta excluída com sucesso.";
            header("Location: index.php?OK=" . urlencode(json_encode(["message" => $success])));
            exit();
        } else {
            // Senha incorreta
            $error = "Dados inválidos. Tente novamente.";

            // Redirecionar para a página de edição com a mensagem de erro
            header("Location: select.php?erro=" . urlencode($error));
            exit();
        }
    } else {
        // Erro ao obter os dados do usuário
        $error = "Erro ao obter os dados do usuário.";

        // Redirecionar para a página principal com a mensagem de erro
        header("Location: select.php?erro=" . urlencode($error));
        exit();
    }
}
