<?php 
session_start();
echo $_SESSION['email'];
echo $_SESSION['senha']; 
$iduser = $_SESSION['iduser'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        include_once('conexao.php');
        $listar = "SELECT * FROM arquivos WHERE iduser ='$iduser' LIMIT 1"; //Inicio da listagem da tabela arquivos
        $exec_listar = $mysqli->query($listar) or die($mysqli->error);
        $listarimg = $exec_listar->fetch_assoc();
        $idimg = $listarimg['id'];
        $img = $listarimg['endereco'];
        $nomeimg = $listarimg['nome'];
        //Acabou a listagem da tabela arquivos
        $listardados = "SELECT * FROM dados_arquivos WHERE IDIMG='$idimg' LIMIT 1";//Inicio da listagem da tabela dados_arquivos
        $exec_dados = $mysqli->query($listardados) or die($mysqli->error);
        $dadosimg = $exec_dados->fetch_assoc();
        $data = $dadosimg['Data'];
        $descricao = $dadosimg['Descricao'];
        $responsavel = $dadosimg['Responsavel'];
        //acabou a listagem da tabela dados_arquivos
        $Listarcontatos = "SELECT * FROM contato WHERE IDIMG = '$idimg' LIMIT 1";//inicio da listagem da tabela contato
        $exec_contatos = $mysqli->query($Listarcontatos) or die ($mysqli->error);
        $contatos = $exec_contatos->fetch_assoc();
        $telefone = $contatos['Telefone'];
        $telefone2 = $contatos['Telefone2'];
        echo '<img src='.$img.' alt='.$nomeimg.'>';
        echo 'Data: '.$data.' <br> Descrição: '.$descricao.'<br>Responsável: '.$responsavel.'<br> Telefone :'.$telefone.'<br> Telefone 2: '.$telefone2;

    ?>
</body>

</html>