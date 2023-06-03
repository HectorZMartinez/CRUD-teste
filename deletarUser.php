<?php
include("conecta.php");
session_start();
if (!$_SESSION["usuario"]) {
    header("Location: logar.php");
    exit();
}

$id = $_SESSION["usuario"]["idusuario"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuario WHERE idusuario = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $senhaSalva = $row["senha"];

        if ($senha === $senhaSalva) {
            $deleteSql = "DELETE FROM usuario WHERE idusuario = $id";
            $conn->query($deleteSql);

            if (isset($_COOKIE["usuario"])) {
                setcookie("usuario", "", time() - 3600);
            }

            session_destroy();

            // Redirecionar para a página principal
            header("Location: index.php");
            exit();
        } else {
            // Senha incorreta
            // Redirecionar para a página de edição sem mensagem de erro
            header("Location: select.php");
            exit();
        }
    } else {
        // Erro ao obter os dados do usuário
        // Redirecionar para a página principal sem mensagem de erro
        header("Location: select.php");
        exit();
    }
}
