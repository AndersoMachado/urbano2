<?php 
   session_start();
    if(isset($_POST['enviar']) && isset($_POST['email']) && isset($_POST['senha']))
    {
        include("conexao.php");
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $test = "SELECT * FROM usuario WHERE email = '$email' LIMIT 1";
        
        $exec_test = $mysqli->query($test) or die($mysqli->error);
        
        $usuario = $exec_test->fetch_assoc();
        if(password_verify($senha ,$usuario['Senha'])){
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = 1;
            $_SESSION['iduser']= $usuario['id'];
            header('location: index.php');
        }
        else
        {
            echo'deu errado';
            $_SESSION['erro']=1;
            
            
        }
    }
?>
    
</body>
</html>