<?php 
if(!empty($_POST['enviar'])){
    $id=$_POST['enviar'];
   
if(isset($_POST['enviar']) && isset($_POST['senha']) && isset($_POST['novasenha'])){
    include_once('conexao.php');
    $senha = $_POST['senha'];
    $novasenha = password_hash($_POST['novasenha'], PASSWORD_DEFAULT);
    $sql = "SELECT * FROM usuario WHERE id = '$id' LIMIT 1";
    $sql_exec = $mysqli->query($sql) or die($mysqli->error);
    $usuario = $sql_exec->fetch_assoc();
    if(password_verify($senha,$usuario['Senha'])){
        $troca = "UPDATE usuario SET senha='$novasenha' WHERE id='$id'";
        $result = $mysqli->query($troca);
        header('location:sair.php');
    }else{
        session_start();
        $_SESSION['teste']=1;
        header('location:trocasenha.php');
    }
}
 }else{
    header('location: index.php');
 }
?>