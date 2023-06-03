<?php

include("conecta.php");

$nome = $_POST["nome"];

$email = $_POST["email"];

$senha = $_POST["senha"];

$confirmar_senha = $_POST["confirmaSenha"];

$erro = [];


function validarCadastro(string $nome, string $email, string $senha, string $confirmar_senha, &$erro)
{
    $Validar = true;
    if (strlen($nome) == 0) {
        $Validar = false;
        $erro["nomeError"] = "O nome informado não é válido.";
    } elseif (strlen($nome) < 3 || strlen($nome) > 50) {
        $Validar = false;
        $erro["nomeError"] = "O nome informado não é válido EX: deve conter no min 3 e Max de 50 caracteres.\n";
    }

    if (strlen($email) == 0) {
        $Validar = false;
        $erro["emailError"] = "O e-mail informado não é válido. \n";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $Validar = false;
        $erro["emailError"] = "O e-mail informado não é válido.\n";
    }

    if (strlen($senha) == 0) {
        $Validar = false;
        $erro["senhaError"] = "A senha informada não é válida.\n";
    } elseif (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/", $senha)) {
        $Validar = false;
        $erro["senhaError"] = "A senha informada não é válida EX: Min 8 dígitos contendo letras maiúsculas e minúsculas, números, caracteres especiais e não conter sequências. \n";
    }

    if ($senha != $confirmar_senha) {
        $Validar = false;
        $erro["confirmaError"] = "Os campos preenchidos são válidos.\n";
    }
    return $Validar;
}

if (!validarCadastro($nome, $email, $senha, $confirmar_senha, $erro)) {
    $erro["nome"] = $nome;
    $erro["email"] = $email;
    $arr = json_encode($erro);
    header("Location:index.php?errors=$arr");
    exit;
}

$conn = new mysqli($host . ':' . $port, $user, $password, $db);

$sql = "select * from usuario where email = '$email';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $erro["nome"] = $nome;
    $erro["email"] = $email;
    $erro["emailError"] =  "Email já cadastrado na base de dados";
    $arr = json_encode($erro);
    header("Location:index.php?errors=$arr");
    exit;
}

$sql = "INSERT INTO usuario (nome, email, senha)
    VALUES ('$nome', '$email', '$senha')";


if ($conn->query($sql) === TRUE) {
    $ok["nome"] = $nome;
    $ok["email"] = $email;
    $ok["senha"] = $senha;
    $arr = json_encode($ok);
    header("Location:index.php?ok=$arr");
    exit;
}
