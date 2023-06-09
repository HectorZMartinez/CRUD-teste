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
            // Iniciar transação
            $conn->begin_transaction();

            try {
                // Excluir os contatos vinculados ao usuário
                $deleteContatosSql = "DELETE FROM contatos WHERE user_id = $id";
                $conn->query($deleteContatosSql);

                $deleteSql = "DELETE FROM usuario WHERE idusuario = $id";
                $conn->query($deleteSql);

                // Commit da transação
                $conn->commit();

                if (isset($_COOKIE["usuario"])) {
                    setcookie("usuario", "", time() - 3600);
                }

                session_destroy();

                // Redirecionar para a página principal
                header("Location: index.php");
                exit();
            } catch (Exception $e) {
                // Ocorreu um erro, desfazer transação
                $conn->rollback();

                echo "Erro ao excluir usuário: " . $e->getMessage();
            }
        } else {
            // Senha incorreta
            // Redirecionar para a página de edição sem mensagem de erro
            header("Location: cadastroContato.php");
            exit();
        }
    } else {
        // Erro ao obter os dados do usuário
        // Redirecionar para a página principal sem mensagem de erro
        header("Location: cadastroContato.php");
        exit();
    }
}
