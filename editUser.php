<?php
include("conecta.php");
session_start();
if (!$_SESSION["usuario"] || !$_POST["senha"]) {
    header("Location: logar.php");
    exit();
}

$erro = [];
$senha = $_POST["senha"];
$id = $_SESSION["usuario"]["idusuario"];

if (validarFormulario($senha, $erro)) {
    $sql = "UPDATE usuario
            SET senha = '$senha'
            WHERE idusuario = $id";
    $result = $conn->query($sql);

    if ($result) {
        $sql = "SELECT * FROM usuario WHERE idusuario = $id";
        $result = $conn->query($sql);

        $usuario = $result->fetch_assoc();
        $_SESSION["usuario"] = $usuario;

        if (isset($_COOKIE["usuario"])) {
            $hour = time() + 3600 * 24 * 30;
            setcookie("usuario", json_encode($usuario), $hour);
        }

        header("Location: cadastroContato.php?success=1");
        exit;
    } else {
        $erro["databaseError"] = "Erro ao atualizar a senha no banco de dados.";
        $arr = json_encode($erro);
        header("Location: cadastroContato.php?erro=$arr");
        exit;
    }
} else {
    $arr = json_encode($erro);
    header("Location: cadastroContato.php?erro=$arr");
    exit;
}

function validarFormulario($senha, &$erro)
{
    $eValido = true;
    if (strlen($senha) == 0) {
        $eValido = false;
        $erro["senhaError"] = "A senha informada não é válida.\n";
    } else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/", $senha)) {
        $eValido = false;
        $erro["senhaError"] = "A senha informada não é válida EX: Min 8 dígitos contendo letras maiúsculas e minúsculas, números, caracteres especiais e não conter sequências. \n";
    }

    return $eValido;
}
