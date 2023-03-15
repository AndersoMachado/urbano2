<?php
    session_start();
    include('conexao.php');
    if(isset($_POST['enviar']) && isset($_POST['atendido']))
    {
        $id = ($_POST['enviar']);
        if($_POST['atendido']== 1){
        $mysqli->query("UPDATE arquivos SET Atendido = 1  WHERE id= '$id'")  or die($mysqli->error);
        header('location:index.php');
        }
    }
    else{
            header('location:index.php');
        }
    header('location index.php');
   
?>   