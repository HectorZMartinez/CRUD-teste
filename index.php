<?php
$display = "none";
if (isset($_GET["erro"])) {
  $erro = json_decode($_GET["erro"]);
}

if (isset($_GET["ok"])) {
  $ok = json_decode($_GET["ok"]);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Formulário de Cadastro</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="script/style.css">
</head>

<body>

  <div class="container mx-auto bg-light mt-1 w-90">
    <main class="col-12">
      <h2 id="formulario">Formulário de Cadastro</h2>
      <form action="recebe_dados.php" method="post">

        <div class="form-group row">
          <label for="nome" class="col-sm-2 col-form-label col-form-label-sm">Nome*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" name="nome" id="nome" placeholder="Digite seu nome" required minlength="3" required maxlength="50" required>
            <span class="error" style="display: none;" id="erroNome" value="<?php if (isset($erro) && isset($erro->nome)) echo  $erro->nome ?>">O campo nome deve conter entre 3 a 50
              caracteres</span>
          </div>
        </div>

        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label col-form-label-sm">E-mail*</label>
          <div class="col-sm-10">
            <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Digite seu email" required>
            <span class="error" style="display: none;" id="erroEmail" value="<?php if (isset($erro) && isset($erro->email)) echo  $erro->email ?>">Verefique o preenchimento do campo e-mail</span>
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

        <div class="form-group row">
          <label for="confirmaSenha" class="col-sm-2 col-form-label col-form-label-sm">Confirmação de <br>senha*</label>
          <div class="col-sm-10">
            <input type="password" class="form-control form-control-sm" name="confirmaSenha" id="confirmaSenha" placeholder="Digite sua confirmação de senha" required>
            <span class="error" style="display: none;" id="erroConfirmaSenha">Campo confirmação de senha e o campo senha
              não conferem</span>

            <div class="button">
              <button type="submit" onclick="validarInputs(event)" class="btn btn-primary my-1" data-cy="cadastroNewUser">Enviar</button>
              <small class="form-text text-muted">*Campos obrigatórios.</small>
            </div>

          </div>
        </div>

        <?php
        if (isset($_GET["ok"])) {
        ?>

          <div style="color: green;" class="alert alert-ok">
            <b>Seus dados foram cadastrados com sucesso!<br>
          </div>

        <?php } ?>

        <div style="padding-bottom: 1rem;">
          <a href="logar.php" class="btn btn-ok" data-cy="oldUser">Já tem cadastro?</a>
        </div>
      </form>
    </main>

    <footer class="row">
      <div class="col-12">
        <p>Copyright © 2023</p>
      </div>
    </footer>
  </div>

  <script src="script/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <noscript>Atualize seu navegador</noscript>

</body>

</html>