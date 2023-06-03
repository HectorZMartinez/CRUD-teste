<?php
include("conecta.php");
include("validarLog.php");

// Obtém o ID do usuário atual da sessão
$userId = $_SESSION["usuario"]["idusuario"];

// Cria o dsn com as informações do banco
$dsn = "mysql:host=$host;port=$port;dbname=$db";

// Cria uma instância do PDO representando a conexão com o banco
$pdo = new PDO($dsn, $user, $password);

// Prepara a consulta SQL para obter os contatos do usuário atual
$sql = "SELECT * FROM contatos WHERE user_id = ?";

// Prepara um objeto PDOStatement para executar a consulta
$stmt = $pdo->prepare($sql);

// Vincula o ID do usuário aos parâmetros da consulta
$stmt->bindValue(1, $userId);

// Executa a consulta
$stmt->execute();

// Obtém os resultados da consulta
$contatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fecha a conexão com o banco
$pdo = null;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Contatos</title>
</head>

<body>
    <h2>Lista de Contatos</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Número</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contatos as $contato) : ?>
                <tr>
                    <td><?php echo $contato['nome']; ?></td>
                    <td><?php echo $contato['numero']; ?></td>
                    <td><?php echo $contato['endereco']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>