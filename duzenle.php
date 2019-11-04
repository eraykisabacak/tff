<?php

require_once('baglan.php');

$macid = (isset($_GET['macid']) && $_GET['macid'] > 0) ? $_GET['macid'] : -1;
//print_r($macid);
if($macid != -1){
  $dersler = $db->query("SELECT * FROM mac WHERE id='$macid'",PDO::FETCH_ASSOC)->fetchAll();
  //print_r($dersler[0]);
  $evSahibiId = $dersler[0][evSahibiTakimId];
  //print_r($evSahibiId);
  $deplansmanId = $dersler[0][deplansmanTakimId];

  $evSahibiTakim =  $db->query("SELECT * FROM takim WHERE takim.id = $evSahibiId",PDO::FETCH_ASSOC)->fetchAll();
  $deplansmanTakim =  $db->query("SELECT * FROM takim WHERE takim.id = $deplansmanId",PDO::FETCH_ASSOC)->fetchAll();

  print_r($evSahibiTakim);
  print_r($deplansmanTakim);
    
}
else{
  header("Refresh: 1; url=main.php?hafta=1&sezon=1920"); 
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"  
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <title>Document</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-sm bg-danger navbar-light mb-3">
        <div class="container center">
          <ul class="navbar-nav center">
            <li class="nav-item active">
              <a class="nav-link" href="#"><img width="30%" height="30%" src="Başlıksız-1.png" alt="">
            </li>
          </ul>
        </div>
        </nav>

        <div class="container text-center">
          <div class="card">
            <h1 class="text-center"></h1> 
          </div>  
        </div>
  </body>
</html>
