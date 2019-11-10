<?php
if(!isset($_SESSION["username"])){
	echo "<h1>Bu Sayfaya Girmeye Yetkiniz Yok</h1>";
	header("Refresh: 2; url=index.php");
	exit;
}
session_start();
ob_start();
//print_r($takimlarDizisi2);
$skorTablosu = $db->query("SELECT * FROM skortablosu20182019",PDO::FETCH_ASSOC)->fetchAll();

$takimIsim = $db->query("SELECT * FROM takim",PDO::FETCH_ASSOC)->fetchAll();

function quickSort($arr)
{
	$count = count($arr);

	if ($count < 2) {
		return $arr;
	}

	$leftArray = $rightArray = array();
	$middle = $arr[0];

	for($i = 1; $i < $count ; $i++){
		if($middle->puan < $arr[$i]->puan){
			$leftArray[] = $arr[$i];
		}elseif($middle->puan == $arr[$i]->puan) {
			if($middle->avaraj < $arr[$i]->avaraj){
				$leftArray[] = $arr[$i];
			}else{
				$rightArray[] = $arr[$i];
			}
		}else{
			$rightArray[] = $arr[$i];
		}	
	}

	$leftArray = quickSort($leftArray);
	$rightArray = quickSort($rightArray);

	return array_merge($leftArray, array($middle), $rightArray);
}

$takimlarDizisi = quickSort($takimlarDizisi);
$takimlarDizisi2 = quickSort($takimlarDizisi2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="scoreTable.css">
	<title>Document</title>
</head>
<body>
	<div class="row">
		<div class="col">
		<div class="ptable" style="">
		<h1 class="headin">Skor Tablosu</h1>
						  <table>
							  <tr class="col">
								  <th>#</th>
								  <th>Team</th>
								  <th>O</th>
								  <th>G</th>
								  <th>B</th>
								  <th>M</th>
								  <th>A</th>
								  <th>Y</th>
								  <th>AV</th>
								  <th>P</th>
							  </tr>

							  <?php 
							  $sira = 0;
							  for($i = 0 ; $i <=22;$i++)
							  { ?>
							  <tr class=<?php 
							  if($i <= 3){ echo "wpos";}else{ echo "pos";} ?>>
							  	<?php 
									  $id = $skorTablosu[$i]['takimId'];
									  if($takimlarDizisi[$i]->oynananmac != 0){
									  $sira++;
								  ?>
								  <td><?php echo $sira ?></td>
								  <td><?php echo $takimlarDizisi[$i]->takimAdi ?></td>
								  <td><?php echo $takimlarDizisi[$i]->oynananmac ?></td>
								  <td><?php echo $takimlarDizisi[$i]->galibiyet ?></td>
								  <td><?php echo $takimlarDizisi[$i]->beraberlik ?></td>
								  <td><?php echo $takimlarDizisi[$i]->maglubiyet ?></td>
								  <td><?php echo $takimlarDizisi[$i]->atilangol ?></td>
								  <td><?php echo $takimlarDizisi[$i]->yenilengol ?></td>
								  <td><?php echo $takimlarDizisi[$i]->avaraj ?></td>
								  <td><?php echo $takimlarDizisi[$i]->puan ?></td>
									  <?php 
									} 
								} ?>
				</table>
			  </div>
		</div>
		<div class="col">
		<div class="ptable">
		<h1 class="headin">Skor Tablosu</h1>
						  <table>
							  <tr class="col">
								  <th>#</th>
								  <th>Team</th>
								  <th>O</th>
								  <th>G</th>
								  <th>B</th>
								  <th>M</th>
								  <th>A</th>
								  <th>Y</th>
								  <th>AV</th>
								  <th>P</th>
							  </tr>

							  <?php 
							  $sira = 0;
							  for($i = 0 ; $i <=22;$i++)
							  { ?>
							  <tr class=<?php 
							  if($i <= 3){ echo "wpos";}else{ echo "pos";} ?>>
								  <?php 
								  //print_r($takimlarDizisi2);
									  $id = $skorTablosu[$i]['takimId'];
									  if($takimlarDizisi2[$i]->oynananmac != 0){
									  $sira++;
								  ?>
								  <td><?php echo $sira ?></td>
								  <td><?php echo $takimlarDizisi2[$i]->takimAdi ?></td>
								  <td><?php echo $takimlarDizisi2[$i]->oynananmac ?></td>
								  <td><?php echo $takimlarDizisi2[$i]->galibiyet ?></td>
								  <td><?php echo $takimlarDizisi2[$i]->beraberlik ?></td>
								  <td><?php echo $takimlarDizisi2[$i]->maglubiyet ?></td>
								  <td><?php echo $takimlarDizisi2[$i]->atilangol ?></td>
								  <td><?php echo $takimlarDizisi2[$i]->yenilengol ?></td>
								  <td><?php echo $takimlarDizisi2[$i]->avaraj ?></td>
								  <td><?php echo $takimlarDizisi2[$i]->puan ?></td>
									  <?php 
									} 
								} ?>
				</table>
			  </div>
		</div>
	</div>
	

	
</body>
</html>