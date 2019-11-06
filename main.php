<?php
require_once('baglan.php');
$hafta = isset($_GET['hafta']) && isset($_GET['sezon']) && 
  ($_GET['hafta'] > 0) && ($_GET['hafta'] < 35) ? $_GET['hafta'] : 1;

$sezon = ($_GET['sezon'] == "1819" || $_GET['sezon'] == "1920") && 
    isset($_GET['sezon']) && isset($_GET['hafta']) ? $_GET['sezon'] : 1920;

$dersler = $db->query("SELECT * FROM mac WHERE sezon='$sezon' AND hafta='$hafta'",PDO::FETCH_ASSOC)->fetchAll();
//print_r($dersler);

if($dersler){
    $evSahibiTakim =  $db->query("SELECT takim.takimAdi,
                                  mac.evSahibiTakimId,mac.evSahibiGol,takim.takimLogo 
                                  FROM takim,mac WHERE sezon='$sezon' AND mac.evSahibiTakimId=takim.id AND mac.hafta='$hafta' ",PDO::FETCH_ASSOC)->fetchAll();
   // print_r($evSahibiTakim);

    $deplansmanTakim =  $db->query("SELECT takim.takimAdi,
                                  mac.deplansmanTakimId,mac.deplansmanGol,takim.takimLogo 
                                  FROM takim,mac WHERE sezon='$sezon' AND mac.deplansmanTakimId=takim.id AND mac.hafta='$hafta'",PDO::FETCH_ASSOC)->fetchAll();
    //print_r($deplansmanTakim);

}else{
  echo "Herhangi bir maç bulunmuyor";
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
  <body class="main">
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
      <?php for($sayi = 1; $sayi <= 17; $sayi++) { ?>
        <a href="http://localhost/TFF/main.php?hafta=<?php echo $sayi ?>&sezon=<?php echo $sezon ?>" class="btn btn-primary mb-3"><?php echo $sayi ?></a>
      <?php } ?>
      <br>
      <?php for($sayi = 18; $sayi <= 34; $sayi++) { ?>
        <a href="http://localhost/TFF/main.php?hafta=<?php echo $sayi ?>&sezon=<?php echo $sezon ?>" class="btn btn-primary mb-3">
        <?php echo $sayi ?>
      </a>
      <?php } ?>
    </div>
    <div class="card">
      <h1 class="text-center"><?php echo $hafta ?>.HAFTA - Sezon <?php $ilk =mb_substr($sezon,0,2); $son =mb_substr($sezon,2,4);  echo "20".$ilk."-"."20".(string)$son  ?></h1>
      <a href="http://localhost/TFF/karsilastir.php?hafta=<?php echo $hafta ?>" class="btn btn-primary btn-block">Önceki Sezon İle Karşılaştır</a>
      <?php if($dersler){ for($i = 0; $i < count($dersler);$i++){ ?>
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col">
              <img width="75px" height="75px" class="rounded-circle float-left" src="<?php echo $evSahibiTakim[$i]['takimLogo'] ?>" alt="">
              <h3 class="text-center" style="display:flex;justify-content:center;padding:17px"><?php echo $evSahibiTakim[$i]['takimAdi'] ?></h3>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col">
                    <h1 class="text-center" style="display:flex;justify-content:center;padding:10px"><?php echo $evSahibiTakim[$i]['evSahibiGol'] ?></h1>
                </div>
                <div class="col">
                  <h3 class="text-center" style="display:flex;justify-content:center;padding:18px">VS</h3>
                  <a href="http://localhost/TFF/duzenle.php?macid=<?php echo $dersler[$i][id] ?>" class="btn btn-warning text-center ml-4" style="width: 115px;">Düzenle</a>
                </div>
                <div class="col">
                    <h1 class="text-center" style="display:flex;justify-content:center;padding:10px"><?php echo $deplansmanTakim[$i]['deplansmanGol'] ?></h1>
                </div>
              </div>
            </div>
            <div class="col">
                <img width="75px" height="75px" class="rounded-circle float-right" src="<?php echo $deplansmanTakim[$i]['takimLogo'] ?>" alt="">
                <h3 style="display:flex;justify-content:center;padding:17px"><?php echo $deplansmanTakim[$i]['takimAdi']?></h3>
            </div>
          </div>
        </div> 
      </div>
        <?php } }else{ ?><h1 class="container text-center">Bulunamadı</h1> <?php } ?>           
    </div>
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet"> 

    <?php require('scoreTable.html') ?>
  </body>
</html>