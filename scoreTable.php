<?php 
$skorTablosu = $db->query("SELECT * FROM skortablosu20192020",PDO::FETCH_ASSOC)->fetchAll();
//print_r($skorTablosu);

$takimIsim = $db->query("SELECT * FROM takim",PDO::FETCH_ASSOC)->fetchAll();
//print_r($takimIsim);
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
	<div class="ptable" >
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
							  //echo $skorTablosu[$i]['takimId'];
							  //echo $takimIsim['id'];
							  for($i = 0 ; $i <=17;$i++)
							  { ?>
							  <tr class=<?php 
							  if($i <= 3){ echo "wpos";}else{ echo "pos";} ?>>
							  	<?php 
							  		$id = $skorTablosu[$i]['takimId'];
									  $takimIsim = $db->query("SELECT takimAdi FROM takim WHERE id=$id",PDO::FETCH_ASSOC)->fetchAll();
									  //print_r($takimIsim);
								  ?>
								  <td><?php echo ($i) + 1 ?></td>
								  <td><?php echo $takimIsim[0]['takimAdi']?></td>
								  <td><?php echo $skorTablosu[$i]['oynananmac']?></td>
								  <td><?php echo $skorTablosu[$i]['galibiyet']?></td>
								  <td><?php echo $skorTablosu[$i]['beraberlik']?></td>
								  <td><?php echo $skorTablosu[$i]['maglubiyet']?></td>
								  <td><?php echo $skorTablosu[$i]['atilangol']?></td>
								  <td><?php echo $skorTablosu[$i]['yenilengol']?></td>
								  <td><?php echo $skorTablosu[$i]['avaraj']?></td>
								  <td><?php echo $skorTablosu[$i]['puan']?></td>
							<?php } ?>
				</table>
			  </div>
</body>
</html>