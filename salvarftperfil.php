<?php 
session_start();   
if(isset($_FILES['arquivo'])){
  $arquivo = $_FILES['arquivo'];
 include('conexao.php');
  if($arquivo['error']){
    header('location: perfil.php');
  }
  $pasta = "arquivos/";
  $nomedoarquivo = $arquivo['name'];
  $novonomedoarquivo = uniqid();
  $extensao = strtolower(pathinfo($nomedoarquivo, PATHINFO_EXTENSION));

  if($extensao != "jpg" && $extensao !="png"){
    header('location: perfil.php');
}
  $endereco =  $pasta . $novonomedoarquivo . "." . $extensao;
  $sucesso = move_uploaded_file($arquivo["tmp_name"], $pasta . $novonomedoarquivo . "." . $extensao);
  if($sucesso){
    $iduser = $_SESSION['iduser'];
    $sql = "SELECT * FROM usuario WHERE id='$iduser' LIMIT 1";
    $exec_sql = $mysqli->query($sql) or die($mysqli->error);
    $usuario = $exec_sql->fetch_assoc();
    $id = $usuario['id'];   
    $nome= $usuario['Nome'];
    $email = $usuario['Email'];
    $sqlft = "SELECT * FROM ftperfil WHERE iduser='$id' LIMIT 1";
    $exec_sqlft = $mysqli->query($sqlft) or die($mysqli->error);
    $usuarioft = $exec_sqlft->fetch_assoc();
    $endereco1 = $usuarioft['endereco'];
    if(isset($endereco1)==true){
        $mysqli->query("UPDATE ftperfil set endereco='$endereco' where iduser='$id'") or die($mysqli->error);
        echo'oi';
    }else{
        $mysqli->query("INSERT INTO ftperfil (iduser, endereco, nome) VALUES('$id','$endereco','$nomedoarquivo')") or die($mysqli->error);
    header('location:perfil.php');
    }
  }
}header('location:perfil.php');
?>