<?php   
session_start();
if(isset($_FILES['arquivo'])){
  $arquivo = $_FILES['arquivo'];
 
 include('conexao.php');
  if($arquivo['error']){
    header('location: enviar_img.php');
  }
  $pasta = "arquivos/";
  $nomedoarquivo = $arquivo['name'];
  $novonomedoarquivo = uniqid();
  $extensao = strtolower(pathinfo($nomedoarquivo, PATHINFO_EXTENSION));

  if($extensao != "jpg" && $extensao !="png"){
    header('location: enviar_img.php');
  }
  $endereco =  $pasta . $novonomedoarquivo . "." . $extensao;
  $data = $_POST['data'];
  $descricao = $_POST['descricao'];
  $telefone = $_POST['Telefone'];
  $telefone2 = $_POST['Telefone2'];
  $email = $_POST['email'];
  $email2 = $_POST['email2'];
  $enderecorua = $_POST['Endereco'];
  $latitude = $_POST['Latitude'];
  $longitude= $_POST['Longitude'];
  $nomelocal = $_POST['Nome'];
  
  $sucesso = move_uploaded_file($arquivo["tmp_name"], $pasta . $novonomedoarquivo . "." . $extensao);
  if($sucesso){
    $iduser = $_SESSION['iduser'];
    $sql = "SELECT * FROM usuario WHERE id='$iduser' LIMIT 1";
    $exec_sql = $mysqli->query($sql) or die($mysqli->error);
    $usuario = $exec_sql->fetch_assoc();
    $id = $usuario['id'];   
    $nome= $usuario['Nome'];
    $email = $usuario['Email'];
    $mysqli->query("INSERT INTO arquivos (nome, endereco, iduser) VALUES('$nomedoarquivo','$endereco', '$id')") or die($mysqli->error);
    $volt=1;
    if($volt==1){ 
        $extract_id_img = "SELECT * FROM arquivos WHERE iduser = '$id'";
        $exec_id = $mysqli->query($extract_id_img) or die($mysqli->error);
        $img = $exec_id->fetch_assoc();
        $idimg = $img['id'];
        $mysqli->query("INSERT INTO dados_arquivos (Data, Descricao, Responsavel, IDIMG,  IDUSER) VALUES('$data','$descricao','$nome','$idimg', '$id')") or die($mysqli->error);
        $cont = 1;
        if($cont==1){
            $mysqli->query("INSERT INTO contato (IDIMG, Telefone, Telefone2, Email, Email2) VALUES('$idimg', '$telefone', '$telefone2', '$email', '$email2')") or die($mysqli->error);
            $maps = 1;
            if($maps==1){
            $mysqli->query("INSERT INTO maps (endereco, latitude, longitude, nome, IDIMG) VALUES('$enderecorua', '$latitude', '$longitude', '$nomelocal', '$idimg')") or die($mysqli->error);
            }
        }
        }
    header('location:index.php');
  }else{
    
  }
}
?>