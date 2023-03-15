<?php
    session_start();
    include('conexao.php');
    if(isset($_POST['enviar']) && isset($_POST['verificado']))
    {
        $verify=($_POST['verificado']);
        $id = ($_POST['enviar']);
        if($_POST['verificado']== 1){
        $mysqli->query("UPDATE arquivos SET Verificado = 1  WHERE id= '$id'")  or die($mysqli->error);
        header('location: index.php');
        }
         if(($_POST['verificado'])==2){
             $mysqli->query("DELETE FROM arquivos WHERE id= '$id'")  or die($mysqli->error);
             header('location: verificação.php');
             }
         
         
        
    }
    if(isset($_POST['enviar']) && isset($_POST['reavaliar']) && isset($_POST['mensagem'])){
        $msg = $_POST['mensagem'];
        $id = ($_POST['enviar']);
        $sql ="SELECT * FROM arquivos WHERE id ='$id'";
        $result = $mysqli->query($sql);
        while($dados = mysqli_fetch_assoc($result)){
           $iduser = $dados['iduser'];
           $animal = $dados['Nome_popular'];
           $msg2= $msg.' <br> foto do animal: '.$animal;
        }
        if($_POST['reavaliar']== 0){
                    $mysqli->query("UPDATE arquivos SET verificado = 0  WHERE id= '$id'")  or die($mysqli->error);
                    // $mysqli->query("UPDATE usuario SET mensagem ='$msg2' where id='$iduser'");
                    }
                    header('location: verificação.php');
    }else{
        header('location:index.php');
    }
    header('location index.php');
   
    ?>   