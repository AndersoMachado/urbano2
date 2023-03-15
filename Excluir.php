<?php 
if(!empty($_GET['id'])){
    include_once('conexao.php');
  
    $id=$_GET['id'];
    $mysqli->query("DELETE FROM arquivos WHERE id= '$id'")  or die($mysqli->error);
    $mysqli->query("DELETE FROM dados_arquivos WHERE IDIMG= '$id'")  or die($mysqli->error);
    $mysqli->query("DELETE FROM contato WHERE IDIMG= '$id'")  or die($mysqli->error);
    $mysqli->query("DELETE FROM maps WHERE IDIMG= '$id'")  or die($mysqli->error);
    header('location: perfil.php');
}else{
header('location: perfil.php');}
?>