<?php 
session_start();

if(isset($_POST['enviaranonimo'])){
    echo "anonimo";
    if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];
       
       include('conexao.php');
        if($arquivo['error']){
          header('location: anonima.php');
        }
        $pasta = "arquivos/";
        $nomedoarquivo = $arquivo['name'];
        $novonomedoarquivo = uniqid();
        $extensao = strtolower(pathinfo($nomedoarquivo, PATHINFO_EXTENSION));
      
        if($extensao != "jpg" && $extensao !="png"){
          header('location: anonima.php');
      }
        $endereco =  $pasta . $novonomedoarquivo . "." . $extensao;
        $data = $_POST['data'];
        $nome = $_POST['Nome'];
        $descricao = $_POST['descricao'];
        $enderecorua = $_POST['Endereco'];
        $latitude = $_POST['Latitude'];
        $longitude= $_POST['Longitude'];
        
        $sucesso = move_uploaded_file($arquivo["tmp_name"], $pasta . $novonomedoarquivo . "." . $extensao);
        if($sucesso){
          $mysqli->query("INSERT INTO anonima (Nomearquivo, Endereco, Data, Descricao, Enderecorua, Latitude, Longitude, Nome) VALUES('$nomedoarquivo','$endereco','$data','$descricao', '$enderecorua', '$latitude', '$longitude', '$nome')") or die($mysqli->error);
          header('location:index.php');
        }
          
       
      }
}
?>