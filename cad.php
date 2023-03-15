<!DOCTYPE html>
<html lang="pt-br">
<head>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecad.css">
    <title>Document</title>
</head>
<body>
  <div class="container">
      <div class="imagem">
        <img src="./imagens/undraw_sign_in_re_o58h.svg" alt="">
      </div>
      <div class="form">
        <form action="cadastrar.php" method="POST" class="fomulario">
          <div class="header">
              <div class="titulo">
                  <h1>Cadastre-se</h1>
              </div>
              <div class="bt-login">
                <button><a href="login.php">Entrar</a></button>
              </div>
          </div>
          <div class="grupo">
            <div class="caixas">
              <label for="primeironome">Nome</label>
              <input type="text" id="primeironome" name="nome" placeholder="Primeiro nome" required>
            </div>
            <div class="caixas">
              <label for="sobrenome">Sobrenome</label>
              <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
            </div>
            <div class="caixas">
              <label for="email">Endereço de email</label>
              <input type="email" id="email" name="email" aria-describedby="emailHelp" placeholder="Seu email" required>
            </div>
            <div class="caixas">
              <label for="senha">Senha</label>
              <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>
          </div>
       
            <div class="bt-reset">
              <button input type="reset" class="btn btn-danger"> <h6>Resetar informações</h6></button>
            <div class="bt-cad"> <button type="submit" name="enviar"> <h6>Cadastrar</h6> </button></div>  
          </form>  
      </div>
    </div>
</body>
</html>