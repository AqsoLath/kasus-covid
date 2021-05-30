<?php 

// $data = file_get_contents("https://api.kawalcorona.com/indonesia");

$data = file_get_contents("indonesia.json");

$data2 = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");

// $data2 = file_get_contents("daerah.json");

$korona = json_decode($data, true);

$provinsi = json_decode($data2, true);
// var_dump($provinsi[10]["attributes"]);
// var_dump($korona) ;
// var_dump($provinsi[1]);
// var_dump($provinsi[7]);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>kasus korona</title>

	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

<div class="container">
	<div class="indonesia">
		<h1>Kasus Covid19 Indonesia</h1>
		<div class="data-indonesia">
			<div class="kasus-indonesia">
				<h2>positif </h2> 
				<h3><?php echo($korona[0]["positif"]) ?> </h3>
			</div>
			<div class="kasus-indonesia">
				<h2>meninggoy </h2>
				<h3> <?php echo($korona[0]["meninggal"]) ?> </h3>
			</div>
			<div class="kasus-indonesia">
				<h2>sembuh </h2> 
				<h3><?php echo($korona[0]["sembuh"]) ?> </h3>
			</div>
		</div>
	</div>


	<h1 class="judul-daerah">Kasus Covid19 Daerah</h1>
	<div class="daerah" >
		
		<div class="container1">
			<form action="" method="post">
				<!-- <input type="text" min="0" step="1" name="kode" placeholder="Masukkan kode daerah"> -->
				<label for="provinsi">Pilih Provinsi: </label>
				<select id="provinsi" name="kode">

					<?php
					$i = 0;
					 foreach ($provinsi as $p): ?>
						<?php var_dump($p[$i]["attributes"]["Kode_Prov"]); ?>
						
						<?php $i++ ?>
					<?php endforeach ?>
					<?php for ($i=0; $i < 34; $i++) :?> 
						<option value="<?php echo $i ?>"> <?php echo $provinsi[$i]["attributes"]["Provinsi"]; ?> </option>
					<?php endfor ?>
					
				</select>
				<input type="submit" name="submit">
			</form>

			<?php if (isset($_POST['submit'])): ?>

				<?php 
				 $int = (is_numeric($_POST['kode']) ? (int)$_POST['kode'] : 0);
				 // var_dump($int); ?>
				<h2> provinsi :  <?php echo $provinsi[$int]["attributes"]["Provinsi"] ; ?> </h2>
				<h3> Positif :  <?php echo $provinsi[$int]["attributes"]["Kasus_Posi"] ; ?> </h3>
				<h3> Meninggal :  <?php echo $provinsi[$int]["attributes"]["Kasus_Meni"] ; ?> </h3>
				<h3> Sembuh :  <?php echo $provinsi[$int]["attributes"]["Kasus_Semb"] ; ?> </h3>
			<?php endif ?>
		</div>
	</div>
</div>
</body>
</html>
