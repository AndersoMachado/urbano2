<?php 
include_once('conexao.php');

    if(isset($_POST['enviar']))
    {
        $id=$_POST['enviar'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $sqlupdate=" UPDATE usuario SET nome='$nome', email='$email'WHERE id='$id'";
        $result = $mysqli->query($sqlupdate);
        session_start();
        session_destroy();
        header('location:index.php');
    }
    if(isset($_POST['update2']))
    {
        if(isset($_POST['id'])){
        $id=$_POST['id'];
        $nome_cie=$_POST['nome_cie'];
        $nome_popu=$_POST['nome_popu'];
        $grupo=$_POST['grupo'];
        $autoria=$_POST['autoria'];
        $data=$_POST['data'];
        $descricao=$_POST['descricao'];

        $sqlupdate=" UPDATE arquivos SET Autoria='$autoria', Data='$data', Nome_cientifico='$nome_cie', Nome_popular='$nome_popu', grupo='$grupo', descricao='$descricao' WHERE id='$id'";

        $result = $mysqli->query($sqlupdate);
        header('location:perfil.php');
    }else{
        header('location:perfil.php');
    }
    }
?>