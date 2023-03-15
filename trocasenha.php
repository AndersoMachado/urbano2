<?php 
session_start();

if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
    if(empty($_SESSION['teste'])){
    $id=$_GET['id'];
    include_once('conexao.php');
     $sqlselect = "SELECT * from usuario WHERE id=$id";
     $result=$mysqli->query($sqlselect);
     if($result->num_rows>0){
     while($dados = mysqli_fetch_assoc($result)){
      $email = $dados['Email'];
    }if($_SESSION['email']!= $email){
      header('location: logout.php');
    }
  }
} else{
    header('location:perfil.php');
}
         
        }
        else{
            header('location:index.php');
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="salvarsenha.php" method="POST" class="fomulario">
        <div class="form-group">
          <label><h3>senha atual</h3></label>
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha atual" >
        </div>  
      <div class="form-group">
          <label><h3>nova senha</h3></label>
          <input type="password" class="form-control" id="novasenha" name="novasenha" placeholder="Nova senha">
        </div>
          <li><button type="submit" name="enviar" value="<?php echo $id?>" class="btn btn-primary">Atualizar</button></li>
        </form>
</body>
</html>