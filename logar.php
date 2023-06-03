<?php
session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: select.php");
}
$email = "";
$senha = "";

if (isset($_COOKIE["usuario"])) {
    $usuario = json_decode($_COOKIE["usuario"]);
    $email = $usuario->email;
    $senha = $usuario->senha;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="script/style.css">
</head>

<body>

    <div class="container mx-auto bg-light mt-4 w-80" style="max-width: 550px; box-shadow: rgba(0, 0, 0, 0.24) 0px 8px 15px;">
        <header class="row">
            <div class="col-sm-10">
                <h1>Login</h1>
            </div>
        </header>
        <main class="col-12">
            <?php
            if (isset($_GET["failedlogin"])) :
            ?>
                <div style="color: red;">
                    Campos Invalidos.
                </div>
            <?php
            endif;
            ?>
            <form action="logando.php" method="post">

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label col-form-label-sm">E-mail*</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Digite seu email" required>
                        <span class="error" style="display: none;" id="erroEmail">Verefique o preenchimento do campo e-mail</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="senha" class="col-sm-2 col-form-label col-form-label-sm">Senha*</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-sm" name="senha" id="senha" placeholder="Digite sua senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$" required>
                        <span class="error" style="display: none;" id="erroSenha">O campo senha deve conter no mínimo 8 caracteres
                            com letras maiúsculas e minúsculas, números, caracteres especiais e não conter sequências</span>
                    </div>
                </div>

                <div class="form-group row mx-1">
                    <span class="col-sm-2">&nbsp;</span>
                    <input type="checkbox" <?php if (isset($_COOKIE["usuario"])) echo "checked" ?> value="1" name="guardandoEm">
                    <label for="dados_user" style="margin-left: 5px; margin-bottom: 0;">Salvar dados de acesso</label>
                </div>
                <div class="form-group row">
                    <div class="col-12 col-sm-10 mb-4">
                        <div class="button">
                            <button type="submit" onclick="validarInputs(event)" class="btn btn-primary my-1">Enviar</button>
                            <small class="form-text text-muted">*Campos obrigatórios.</small>
                        </div>
                        <a href="index.php">Cadastrar novo Usuário</a>
                    </div>
                </div>
            </form>
            <footer class="row">
                <div class="col-12">
                    <p>Copyright © 2022</p>
                </div>
            </footer>
        </main>
    </div>

    <script src="script/script2.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <noscript>Atualize seu navegador</noscript>
</body>

</html>