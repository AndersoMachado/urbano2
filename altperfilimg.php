<?php 
session_start();
if(isset($_SESSION['email'])&& isset($_SESSION['senha'])){
if(!empty($_GET['id'])){
  include_once('conexao.php');

  $id=$_GET['id'];

  $sqlselect = "SELECT * from dados_arquivos WHERE IDIMG=$id";

  $result=$mysqli->query($sqlselect);

  if($result->num_rows>0){
    while($dados = mysqli_fetch_assoc($result)){
      $responsavel = $dados['Responsavel'];
      $data= $dados['Data'];
      $desc = $dados['Descricao'];
    }
    $selectcont = "SELECT * FROM contato WHERE IDIMG=$id";
    $resultcont = $mysqli->query($selectcont);
    if($resultcont->num_rows>0)
    while($dadoscont = mysqli_fetch_assoc($resultcont)){
        $telefone= $dadoscont['Telefone'];
        $telefone2= $dadoscont['Telefone2'];
        $email= $dadoscont['Email'];
        $email2= $dadoscont['Email2'];
      }
    $selectmaps = "SELECT * FROM maps WHERE IDIMG=$id";
    $resultmaps = $mysqli->query($selectmaps);
    if($resultmaps->num_rows>0)
    while($dadosmaps = mysqli_fetch_assoc($resultmaps)){
        $endereco= $dadosmaps['endereco'];
        $latitude= $dadosmaps['latitude'];
        $longitude= $dadosmaps['longitude'];
        $nome= $dadosmaps['nome'];
        echo $nome, $email, $desc;
      }
  }
  }
  else{
    header('location: index.php');
  }
}
else{header('location: index.php');}
?>