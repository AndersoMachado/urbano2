<?php 
session_start();
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css"/>
    <script src="./slider.js" defer></script>
    <script src="./maps.js" defer></script>
    <script src="./modal.js" defer></script>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
</head>
<body>
<header>
      <nav class="nav-bar">
        <div class="logo">
        <img src="./imagens/Adicionar_foto__4_-removebg-preview.png" alt="">
        </div>
        <div class="nav-list">
          <ul>
          <?php 
            if((isset($_SESSION['email'])== true) and(isset($_SESSION['senha'])==true)){
                $verify= "SELECT * FROM usuario WHERE email= '$_SESSION[email]' LIMIT 1";
                $mod = $mysqli->query($verify);
                while($test = mysqli_fetch_assoc($mod)){
                $pref = $test['prefeitura'];
                    if($test['Moderador']==1){
                        $_SESSION['moderador']=$test['Moderador'];
                        echo'<li class="nav-item"><a class="nav-link" href="verificação.php">Verificação</a></li>';
                    }}
                }?> 
            <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
            <li class="nav-item"><a class="nav-link" href="denuncias.php">Denúncias</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contato</a></li> 
            <?php 
            if(isset($_SESSION['email'])){
                echo'<li class="nav-item"><a href="perfil.php" role="button"> <i class="fa-solid fa-user" style="font-size:30px; color:red; background-color:transparent; border: none; cursor:pointer;"></i></a></li>';
            } 
            else{
                echo'<li class="nav-item" ><a  class="nav-link"href="login.php">Login</a></li>';
            }
            ?>
          </ul>
          </div>
  
        <div class="icone-menu-mobile">
            <button onclick="menuShow()"><img class="icon" src="./imagens/menu_white_36dp.svg" alt=""></button>
        </div>
        
      </nav>
      <div class="mobile-menu">
        <ul>
        <?php 
            if((isset($_SESSION['email'])== true) and(isset($_SESSION['senha'])==true)){
                $verify= "SELECT * FROM usuario WHERE email= '$_SESSION[email]' LIMIT 1";
                $mod = $mysqli->query($verify);
                while($test = mysqli_fetch_assoc($mod)){
                $pref = $test['prefeitura'];
                    if($test['Moderador']==1){
                        $_SESSION['moderador']=$test['Moderador'];
                        echo'<li class="nav-item"><a class="nav-link" href="verificação.php">Verificação</a></li>';
                    }}
                }?> 
            <li class="nav-item"><a class="nav-link" href="Index.php">Início</a></li>
            <li class="nav-item"><a class="nav-link" href="denuncias.php">Denúncias</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contato</a></li> 
            <?php 
            if(isset($_SESSION['email'])){
                echo'<li class="nav-item"><a href="perfil.php" role="button"> <i class="fa-solid fa-user" style="font-size:30px; color:red; background-color:transparent; border: none; cursor:pointer;"></i></a></li>';
            } 
            else{
                echo'<li class="nav-item"><a  href="login.php">Login</a></li>';
            }
            ?>
          </ul>
          </div>
    </header>
    <h2>Aqui são listadas as denúncias atendidas pela prefeitura 
    </h2>
  <?php 
        
        $sql= "SELECT * FROM arquivos WHERE Atendido = 1 ORDER BY id";
        $result = $mysqli->query($sql);
        ?> <section class="flex">
        
           <?php
                   $id = 0;
                   while($img_dados = mysqli_fetch_assoc($result)){
                    $id += 1;
                    $button = "'dialog$id'";
                    echo'<div>';
                     echo'<button onClick="buttonClick('.$button.');"><img class="galeria"src='.$img_dados['endereco'].' alt=""></button> 
                     <dialog id="dialog'.$id.'"><div class="headmodal"><img src='.$img_dados['endereco']. ' alt=""> <button onClick="buttonCloseModal('.$button.');" class="fecha"><i class="fa-solid fa-xmark"></i></button></div> <div class="map" id="map"></div>';
                     $sqldados= "SELECT * FROM dados_arquivos where IDIMG = $img_dados[id]";
                     $result1 = $mysqli->query($sqldados);
                     while($img_dados1 = mysqli_fetch_assoc($result1)){
                         echo $img_dados1['Descricao'].'<br>';
                         echo $img_dados1['Responsavel'].'<br>';
                         echo $img_dados1['Data'].'<br>';
                         $sqlcontato= "SELECT * FROM contato where IDIMG = $img_dados[id]";
                         $resultcontato = $mysqli->query($sqlcontato);
                         while($img_contato = mysqli_fetch_assoc($resultcontato)){
                        echo $img_contato['Telefone'].'<br>';
                        echo $img_contato['Telefone2'].'<br>';
                        echo $img_contato['Email'].'<br>';
                        echo $img_contato['Email2'].'<br>';
                       
    
                         }
                     }
                   
                     '</dialog>';
                     echo'</div>';
                  }
                     ?>
                     </section>
</body>
</html>