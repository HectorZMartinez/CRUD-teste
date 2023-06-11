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
    <link rel="stylesheet" type="text/css" href="script/style2.css">
</head>

<body>
    <h2>Lista de Contatos</h2>
    <a href="cadastroContato.php" class="btn-voltar" data-cy="voltarCadastroContato">Retornar ao formulário de contato</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Número</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contatos as $contato) : ?>
                <tr>
                    <td><?php echo $contato["nome"]; ?></td>
                    <td><?php echo $contato["numero"]; ?></td>
                    <td><?php echo $contato["endereco"]; ?></td>
                    <td>
                        <form method="post" action="deletarContato.php">
                            <input type="hidden" name="idcontato" value="<?php echo $contato['idcontato']; ?>">
                            <input type="submit" value="Excluir" class="btn-excluir" data-cy="deletContato">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</body>

</html>