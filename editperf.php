<?php 
session_start();
if(isset($_SESSION['email'])&& isset($_SESSION['senha'])){
if(!empty($_GET['id'])){
  include_once('conexao.php');

  $id=$_GET['id'];

  $sqlselect = "SELECT * from usuario WHERE id=$id";

  $result=$mysqli->query($sqlselect);

  if($result->num_rows>0){
    while($dados = mysqli_fetch_assoc($result)){
      $nome = $dados['Nome'];
      $email = $dados['Email'];
    }if($_SESSION['email']!= $email){
      
    }

  }
  else{
    header('location: index.php');
  }
}
} else{
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
<form action="salvarperfil.php" method="POST" class="fomulario">
        <div class="form-group">
          <label><h3>Nome</h3></label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome?>"placeholder="nome de usuário" >
        </div>  
      <div class="form-group">
          <label><h3>Endereço de email</h3></label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $email?>" placeholder="Seu email">
        </div>
          <div class="form-group">
            <button input type="reset" class="btn btn-danger">Limpar</button>
          </div>      
          <li><button type="submit" name="enviar" value="<?php echo $id?>" class="btn btn-primary">Atualizar</button></li>
          <br>
        </form>
      </div>
  </div>
</body>
</html>