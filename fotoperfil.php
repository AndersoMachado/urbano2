
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./modalsimples.js" defer></script>
    <link rel="stylesheet" href="stylecad.css">
    <title>Document</title>
</head>
<body>
<div class="container">
      <div class="imagem">
        <img src="./imagens/undraw_sign_in_re_o58h.svg" alt="">
      </div>
      <div class="form">
        <form enctype="multipart/form-data" action="salvarftperfil.php" method="POST" class="fomulario">
          <div class="header">
              <div class="titulo">
                  <h1>Trocar foto de perfil</h1>
              </div>
              <div class="bt-login">
                <button><a href="perfil.php">Voltar</a></button>
              </div>
              <div class="grupo">
            <div class="caixas">
              <label>Insira sua foto</label>
              <input type="file" id="arquivo" name="arquivo" placeholder="exemplo.jpg">
            </div>
          </div>

            <div class="bt-cad"> <button type="submit" name="enviar"> <h6>Salvar</h6> </button></div>  
          </form>  
      </div>
    </div>
</body>
</html>