<?php 
session_start();
include_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css"/>
    <script src="./slider.js" defer></script>
    <script src="./maps.js" defer></script>
    <script src="./modal.js" defer></script>
    <script src="./menu.js" defer></script>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
</head>
<body>
    <header>
      <nav class="nav-bar">
        <div class="logo">
          <img src="./imagens/Adicionar_foto__4_-removebg-preview.png" alt="">
        </div>
        <div class="nav-list">
          <ul>
          <?php 
            if((isset($_SESSION['email'])== true) and(isset($_SESSION['senha'])==true)){
                $verify= "SELECT * FROM usuario WHERE email= '$_SESSION[email]' LIMIT 1";
                $mod = $mysqli->query($verify);
                while($test = mysqli_fetch_assoc($mod)){
                $pref = $test['prefeitura'];
                    if($test['Moderador']==1){
                        $_SESSION['moderador']=$test['Moderador'];
                        echo'<li class="nav-item"><a class="nav-link" href="verificação.php">Verificação</a></li>';
                    }}
                }?> 
            <li class="nav-item"><a class="nav-link" href="atendidos.php">Atendidos</a></li>
            <li class="nav-item"><a class="nav-link" href="denuncias.php">Denúncias</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contato</a></li> 
            <?php 
            if(isset($_SESSION['email'])){
                echo'<li class="nav-item"><a href="perfil.php" role="button"> <i class="fa-solid fa-user" style="font-size:30px; color:red; background-color:transparent; border: none; cursor:pointer;"></i></a></li>';
            } 
            else{
                echo'<li class="nav-item" ><a  class="nav-link"href="login.php">Login</a></li>';
            }
            ?>
          </ul>
          </div>
  
        <div class="icone-menu-mobile">
            <button onclick="menuShow()"><img class="icon" src="./imagens/menu_white_36dp.svg" alt=""></button>
        </div>
        
      </nav>
      <div class="mobile-menu">
        <ul>
        <?php 
            if((isset($_SESSION['email'])== true) and(isset($_SESSION['senha'])==true)){
                $verify= "SELECT * FROM usuario WHERE email= '$_SESSION[email]' LIMIT 1";
                $mod = $mysqli->query($verify);
                while($test = mysqli_fetch_assoc($mod)){
                $pref = $test['prefeitura'];
                    if($test['Moderador']==1){
                        $_SESSION['moderador']=$test['Moderador'];
                        echo'<li class="nav-item"><a class="nav-link" href="verificação.php">Verificação</a></li>';
                    }}
                }?> 
            <li class="nav-item"><a class="nav-link" href="atendidos.php">Atendidos</a></li>
            <li class="nav-item"><a class="nav-link" href="denuncias.php">Denúncias</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contato</a></li> 
            <?php 
            if(isset($_SESSION['email'])){
                echo'<li class="nav-item"><a href="perfil.php" role="button"> <i class="fa-solid fa-user" style="font-size:30px; color:red; background-color:transparent; border: none; cursor:pointer;"></i></a></li>';
            } 
            else{
                echo'<li class="nav-item"><a  href="login.php">Login</a></li>';
            }
            ?>
          </ul>
          </div>
    </header>
        
  <div class="grid-inicio">
    <div class="grid-logo">
            <img src="./imagens/Adicionar_foto__4_-removebg-preview.png" alt="">
    </div>
    <div class="grid-bt">
      <button><a href="enviar_img.php">ENVIAR DENÚNCIA</a></button>
    </div>
  </div>
  <style>
        .posicao{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    
      .corpo{
        height: 500px;
        width: 85%;
        margin-top: 2%;
      }
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        border-radius: 5px;
        
      }
      /* Optional: Makes the sample page fill the window. */

      @media (max-width:600px) {
        .corpo{
        height: 300px;
        width: 100%;
      }
      }
    </style>
    <section class="posicao">
        <div class="corpo">
            <div id="map"></div>
        </div>
    </section>
    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-25.426302687720288, -49.17738589323379),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('RESULTADO.PHP', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
    </script>
     <?php 
        
        $sql= "SELECT * FROM arquivos WHERE verificado = 1 ORDER BY id LIMIT 3";
        $result = $mysqli->query($sql);
        ?> <section class="flex">
        
           <?php
               
                   $id = 0;
                   while($img_dados = mysqli_fetch_assoc($result)){
                    $id += 1;
                    $button = "'dialog$id'";
                    echo'<div>';
                     echo'<button onClick="buttonClick('.$button.');"><img class="galeria"src='.$img_dados['endereco'].' alt=""></button> 
                     <dialog id="dialog'.$id.'"><div class="headmodal"><img src='.$img_dados['endereco']. ' alt=""> <button onClick="buttonCloseModal('.$button.');" class="fecha"><i class="fa-solid fa-xmark"></i></button></div> <div class="map" id="map"></div>';
                     $sqldados= "SELECT * FROM dados_arquivos where IDIMG = $img_dados[id]";
                     $result1 = $mysqli->query($sqldados);
                     while($img_dados1 = mysqli_fetch_assoc($result1)){
                         echo $img_dados1['Descricao'].'<br>';
                         echo $img_dados1['Responsavel'].'<br>';
                         echo $img_dados1['Data'].'<br>';
                         $sqlcontato= "SELECT * FROM contato where IDIMG = $img_dados[id]";
                         $resultcontato = $mysqli->query($sqlcontato);
                         while($img_contato = mysqli_fetch_assoc($resultcontato)){
                        echo $img_contato['Telefone'].'<br>';
                        echo $img_contato['Telefone2'].'<br>';
                        echo $img_contato['Email'].'<br>';
                        echo $img_contato['Email2'].'<br>';
                         }
                        
                     }
                     if(isset($_SESSION['moderador'])==1){
                      echo'<form action="testeverificado.php" method="post">
                          <label for="reavaliar">Reavaliar</label>
                          <input type="radio" name="reavaliar" id="reavaliar" value="0">
                          <br>
                          <textarea name="mensagem" cols="30" rows="5" placeholder="Informe o porque da reavaliação, o que deve ser alterado e a forma correta"></textarea>
                          <button type="submit" name="enviar" value="'.$img_dados['id'].'"class="btn btn-primary">enviar </button>
                          </form> ';
                         
                   }
                   if(isset($pref)==1){
                    echo'<form action="testeatendido.php" method="post">
                        <label for="atendido">Atendido</label>
                        <input type="radio" name="atendido" id="atendido" value="1">
                        <br>
                        <textarea name="mensagem" cols="30" rows="5" placeholder="Informe um pouco sobre como a denúncia foi atendida"></textarea>
                        <button type="submit" name="enviar" value="'.$img_dados['id'].'"class="btn btn-primary">enviar </button>
                        </form> ';
                       
                 }
                   
                     '</dialog>';
                     echo'</div>';
                  }
                     ?>
                     </section>
          
                     
</body>
</html>