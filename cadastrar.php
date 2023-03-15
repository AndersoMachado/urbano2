<?php 
include("conexao.php");

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
   
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $nomeint = $nome." ".$sobrenome;
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
  
    $mysqli->query("INSERT INTO usuario (nome, email, senha) VALUES('$nomeint','$email','$senha' )") or die($mysqli->error);
    
    header('location:login.php');
    exit;               
} else{
    header('location:cad.php');
    }
?>



