<?php 
  session_start();
  if(isset($_SESSION['email'])){

  }else{
    header('location:anonima.php');
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleenvio.css">
    <title>Document</title>
</head>
<body>
<button class="ref"><a href="https://br.freepik.com/vetores-gratis/indique-a-um-amigo-ilustracao-do-conceito_16807919.htm#query=denuncia&position=20&from_view=search&track=sph" target="_blank">...</a> </button>
  <div class="container">
      <div class="imagem">
      <a href="https://br.freepik.com/vetores-gratis/indique-a-um-amigo-ilustracao-do-conceito_16807919.htm#query=denuncia&position=20&from_view=search&track=sph"> <img src="./imagens/5806789.jpg" alt="Imagem de storyset no Freepik"></a>
        <img src="./imagens/5806789.jpg" alt="">
        
      </div>
      <div class="form">
      <form enctype="multipart/form-data" id="logado" action="test_img.php" method="POST" class="fomulario">
          <div class="header">
              <div class="titulo">
                  <h1>Enviar denúncia</h1>
              </div>
              <div class="bt-login">
                <button><a href="index.php">Voltar</a></button>
              </div>
          </div>
          <div>
       <h2 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"></h2> 
              
          </div>
          <div class="grupo">
            <div class="caixas">
              <label>Insira sua foto</label>
              <input type="file" id="arquivo" name="arquivo" placeholder="exemplo.jpg">
            </div>
            <div class="caixas">
            <label>Nome do local</label>
            <input type="text" class="form-control" id="Nome" name="Nome"  placeholder="Ex: Rua do condor">
            </div>
            <div class="caixas">
              <label>Data da foto</label>
              <input type="date" class="form-control" id="data" name="data" >
            </div>
            <div class="caixas">
            <label>Endereço</label>
            <input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Ex: Salgado filho, 2100, Pineville, Pinhais">
            </div>
            <div class="caixas">
            <label>Latitude</label>
              <input type="text" class="form-control" id="Latitude" name="Latitude" value="" placeholder="Ex: -25.423309">
            </div>
            <div class="caixas">
            <label>Longitude</label>
              <input type="text" class="form-control" id="Longitude" name="Longitude" value="" placeholder="Ex: -49.181568">
            </div>
            <div class="caixas">
            <label>Descrição da foto</label>
            <input type="text" class="form-control" id="descricao" name="descricao"  placeholder="Ex: Local da foto, condições do ambiente etc">
            </div>
            <div class="caixas">
            <label>Telefone</label>
              <input type="text" class="form-control" id="Telefone" name="Telefone" placeholder="Ex: +55(41)99832-5423">
            </div>
            <div class="caixas">
            <label>Telefone-2</label>
              <input type="text" class="form-control" id="Telefone2" name="Telefone2" placeholder="Ex: +55(41)99832-5423">
            </div>
            <div class="caixas">
            <label>Email de contato</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Ex: fulano@gmail.com">
            </div>
            <div class="caixas">
            <label>Email de contato-2</label>
              <input type="email" class="form-control" id="email2" name="email2" placeholder="Ex: fulano@gmail.com">
            </div>
          </div>
       
            <div class="bt-reset">
              <button input type="reset" class="btn btn-danger"> <h6>Resetar informações</h6></button>
              <button input type="reset" class="btn btn-danger"> <h6><a href="anonima.php">Denunciar como anonimo</a> </h6></button>
            </div>
            <div class="bt-cad"> <button type="submit" name="enviar"> <h6>Enviar</h6> </button></div>  
          </form>  
      </div>
    </div>
</form>
<script src="geo.js"></script>
</body>
</html>