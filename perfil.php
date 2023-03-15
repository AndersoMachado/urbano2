<?php 
session_start();
unset($_SESSION['teste']);
include_once('conexao.php');
$email=$_SESSION['email'];
if((isset($_SESSION['email'])!== true) and(isset($_SESSION['senha'])!==true)) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleperfil.css">
    <script src="./modal.js" defer></script>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <title>Document</title>
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
            <li class="nav-item"><a class="nav-link" href="atendidos.php">Atendidos</a></li>
            <li class="nav-item"><a class="nav-link" href="denuncias.php">Denúncias</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contato</a></li> 
            <li class="nav-item"><a href="index.php"> <i class="fa-solid fa-house" style="font-size:30px; color:red;"></i></a></li>
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
            <li class="nav-item"><a class="nav-link" href="atendidos.php">Atendidos</a></li>
            <li class="nav-item"><a class="nav-link" href="denuncias.php">Denúncias</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contato</a></li> 
          </ul>
          </div>
    </header>
<?php
  $sql = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1 ";
  $result= $mysqli->query($sql);
  while($perfil=mysqli_fetch_assoc($result)){
  $id = $perfil['id'];
  $email = $perfil['Email'];
  $nome = $perfil['Nome'];
  $sqlft = "SELECT * FROM ftperfil WHERE iduser = '$id' LIMIT 1 ";
  $resultft= $mysqli->query($sqlft);
  while($ftperfil=mysqli_fetch_assoc($resultft)){
    $endereco = $ftperfil['endereco'];
  }
  }
  
?>
        <div class="info">
            <div class="imagem">
                <?php 
                
                if(isset($endereco)==true){
                    echo"<img src=".$endereco." alt=''>";
                }else{
                    echo"<img src='./imagens/aatrox_0.jpg' alt=''>";
                }
                ?>
            </div>
            <div class="dados">
            <a href="sair.php"><i class="fa-solid fa-right-from-bracket" style="font-size:30px; color:red; margin:0.3em; text-align:right;"></i></a>
                <?php echo'<p>Nome: '.$nome.'</p>'; ?>
                <?php echo'<p>Email: '.$email.'</p>'; ?>
                
                <button> <a href="fotoperfil.php">Trocar foto de perfil</a></button>
                <?php  
                echo '<button><a href="editperf.php?id='.$id.'"> Editar informações </a></button>';
                echo '<button><a href="trocasenha.php?id='.$id.'"> Mudar Senha </a></button>'; ?>
            </div>
            <div class="quebra"></div>
        <br>
    <?php 
    include_once('conexao.php');
        $sql= "SELECT * FROM arquivos where iduser = $id ";
        $result = $mysqli->query($sql);
        ?>
    <?php
        $id = 0;
        while($img_dados = mysqli_fetch_assoc($result)){
            $id += 1;
            $button = "'dialog$id'";
            echo'<div class="grade">';
            echo'<button class="botaoimg" onClick="buttonClick('.$button.');"><img class="galeria"src='.$img_dados['endereco'].' alt=""></button> 
            <dialog id="dialog'.$id.'"><div class="headmodal"><img src='.$img_dados['endereco'].' alt=""> <button onClick="buttonCloseModal('.$button.');" class="fecha"><i class="fa-solid fa-xmark"></i></button></div>
            <a class="btn btn-sm btn-primary" href="altperfilimg.php?id='.$img_dados['id'].'">Editar</a>
            <a class="btn btn-sm btn-danger" href="Excluir.php?id='.$img_dados['id'].'">Excluir</a> 
            <br>';
            $sqldados= "SELECT * FROM dados_arquivos where IDIMG = $img_dados[id]";
                     $result1 = $mysqli->query($sqldados);
                     while($img_dados1 = mysqli_fetch_assoc($result1)){
                         echo "Descrição: ".$img_dados1['Descricao'].'<br>';
                         echo "Responsável: ".$img_dados1['Responsavel'].'<br>';
                         echo "Data: ".$img_dados1['Data'].'<br>';
                         $sqlcontato= "SELECT * FROM contato where IDIMG = $img_dados[id]";
                         $resultcontato = $mysqli->query($sqlcontato);
                         while($img_contato = mysqli_fetch_assoc($resultcontato)){
                        echo "Telefone 1: ".$img_contato['Telefone'].'<br>';
                        echo "Telefone 2: ".$img_contato['Telefone2'].'<br>';
                        echo "Email 1: ".$img_contato['Email'].'<br>';
                        echo "Email 2: ".$img_contato['Email2'].'<br>';
                         }
                        
                     }
            '</dialog>';
            echo'</div>';
                  }
    ?>
           </div>
</body>
</html>