<?php 
    $idpost = $_GET['id'];
    include_once('conexao.php');
    $adiciona = "INSERT INTO pontos (idimg) VALUES ('$idpost')";
    $adicionaapoio = $mysqli->query($adiciona);
    if($adicionaapoio){
        echo"<script>window.history.back();</script>";
    }else{
        echo "erro ao curtir";
    }
    header("location:denuncias.php");
?>