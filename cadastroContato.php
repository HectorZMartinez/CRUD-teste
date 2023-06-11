<?php
include("validarLog.php");

$display = "none";
if (isset($_GET["erro"])) {
    $erro = json_decode($_GET["erro"]);
}

if (isset($_GET["OK"])) {
    $OK = json_decode($_GET["OK"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nomeContato = $_POST["nomeContato"];
    $numeroContato = $_POST["numeroContato"];
    $enderecoContato = $_POST["enderecoContato"];

    header("Location: cadastroContato.php?OK=" . urlencode(json_encode(["message" => "Contato cadastrado com sucesso!"])));
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="script/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container mx-auto bg-light mt-4 w-80" style="max-width: 550px; box-shadow: rgba(0, 0, 0, 0.24) 0px 8px 15px;">
        <main class="col-12 pt-4">
            <h2 id="formulario">Suas informações cadastradas</h2>

            <!-- Formulário editar conta usuário  -->
            <form method="post" action="deletarUser.php">

                <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label col-form-label-sm">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $_SESSION["usuario"]["nome"] ?>" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="senha" class="col-sm-2 col-form-label col-form-label-sm">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-sm" name="senha" id="senha" placeholder="Digite sua senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$" required>
                        <span class="error" style="display: none;" id="erroSenha">O campo senha deve conter no mínimo 8 caracteres
                            com letras maiúsculas e minúsculas, números, caracteres especiais e não conter sequências</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Seu <br>E-mail</br></label>
                    <div class="col-sm-10">
                        <input class="form-control form-control-sm" value="<?php echo $_SESSION["usuario"]["email"] ?>" class="form-control" disabled><br>
                    </div>
                </div>

                <div style="margin-left: 90px;">
                    <button type="submit" onclick="validarInputs(event)" formaction="editUser.php" class="btn btn-info" value="LOGAR" data-cy="editUser">Editar</button>
                    <button type="submit" onclick="validarInputs(event)" class="btn btn-danger" data-cy="deleteUser">Apagar conta</button>
                </div>
            </form>

            <!-- Formulário cadastro de contato  -->
            <h2 id="formulario">Cadastrar contatos</h2>
            <form method="post" action="validarCadastroContato.php">

                <div class="form-group row">
                    <label for="nomeContato" class="col-sm-2 col-form-label col-form-label-sm">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" placeholder="Digite o nome do contato" name="nomeContato" id="nomeContato" required minlength="3" maxlength="50">
                        <span class="error" style="display: none;" id="erroNomeContato">O campo nome deve conter entre 3 a 50 caracteres</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="numeroContato" class="col-sm-2 col-form-label col-form-label-sm">Número</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" placeholder="Digite o número do contato" name="numeroContato" id=numeroContato required pattern="\(\d{2}\)\s\d{4,5}-\d{4}">
                        <span class="error" style="display: none;" id="erroNumero">O campo número deve ter o formato (XX) XXXX-XXXX ou (XX) XXXXX-XXXX</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="enderecoContato" class="col-sm-2 col-form-label col-form-label-sm">Endereço</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" placeholder="Digite o endereço do contato" name="enderecoContato" id="enderecoContato" required pattern="[A-Za-z0-9\s\.,'-]+">
                        <span class="error" style="display: none;" id="erroEndereco">O campo endereço deve conter somente letras, números e os caracteres . , ' -</span>
                    </div>
                </div>

                <div style="margin-left: 90px;">
                    <button type="submit" onclick="validarInputsNew(event)" class="btn btn-info" data-cy="cadastroContato">Cadastrar</button>
                    <a class="btn btn-warning" href="deslogar.php" data-cy="deslogarUser">Sair</a>
                </div>
            </form>

            <div style="padding-bottom: 1rem;">
                <a href="contatos.php" class="btn btn-ok" data-cy="listaContato">Lista de contatos</a>
            </div>

            <footer class="row" style="padding-top: 1rem;">
                <div class="col-12">
                    <p>Copyright © 2023</p>
                </div>
            </footer>
        </main>
    </div>

    <script src="script/script3.js"></script>
    <script src="script/script4.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <noscript>Atualize seu navegador</noscript>
</body>

</html>