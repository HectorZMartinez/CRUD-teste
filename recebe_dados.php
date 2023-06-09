<?php

include("conecta.php");

$nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
$confirmar_senha = isset($_POST["confirmaSenha"]) ? $_POST["confirmaSenha"] : "";

$erro = [];

function validarCadastro(string $nome, string $email, string $senha, string $confirmar_senha, &$erro)
{
    $Validar = true;
    if (strlen($nome) == 0) {
        $Validar = false;
        $erro["nomeError"] = "O nome informado não é válido.";
    } elseif (strlen($nome) < 3 || strlen($nome) > 50) {
        $Validar = false;
        $erro["nomeError"] = "O nome informado não é válido. Deve conter no mínimo 3 e no máximo 50 caracteres.";
    }

    if (strlen($email) == 0) {
        $Validar = false;
        $erro["emailError"] = "O e-mail informado não é válido.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $Validar = false;
        $erro["emailError"] = "O e-mail informado não é válido.";
    }

    if (strlen($senha) == 0) {
        $Validar = false;
        $erro["senhaError"] = "A senha informada não é válida.";
    } elseif (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/", $senha)) {
        $Validar = false;
        $erro["senhaError"] = "A senha informada não é válida. Deve conter no mínimo 8 caracteres, incluindo letras maiúsculas e minúsculas, números e caracteres especiais.";
    }

    if ($senha != $confirmar_senha) {
        $Validar = false;
        $erro["confirmaError"] = "Os campos de senha não correspondem.";
    }

    return $Validar;
}

if (!validarCadastro($nome, $email, $senha, $confirmar_senha, $erro)) {
    $erro["nome"] = $nome;
    $erro["email"] = $email;
    $arr = json_encode($erro);
    header("Location: index.php?errors=$arr");
    exit;
}

$conn = new mysqli($host . ':' . $port, $user, $password, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuario WHERE email = '$email'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $erro["nome"] = $nome;
    $erro["email"] = $email;
    $erro["emailError"] = "E-mail já cadastrado na base de dados";
    $arr = json_encode($erro);
    header("Location: index.php?errors=$arr");
    exit;
}

$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    $ok["nome"] = $nome;
    $ok["email"] = $email;
    $ok["senha"] = $senha;
    $arr = json_encode($ok);
    header("Location: index.php?ok=$arr");
    exit;
} else {
    echo "Erro ao inserir no banco de dados: " . $conn->error;
}

$conn->close();
