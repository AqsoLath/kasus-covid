<?php 
// error_function(8191, "ada error");

// var_dump(error_get_last());


$data = file_get_contents("https://api.kawalcorona.com/indonesia");

// $data = file_get_contents("indonesia.json");

$data2 = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");

// $data2 = file_get_contents("daerah.json");



$korona = json_decode($data, true);

$provinsi = json_decode($data2, true);

// var_dump($provinsi[10]["attributes"]);
// var_dump($korona) ;
// var_dump($provinsi[1]);
// var_dump($provinsi[7]);

// if (null !== error_get_last()) {
	// var_dump("berhasil");
	// header("Location: latihan1.php");
// }

// <button onClick="window.location.reload();">Refresh Page</button>

 ?>

<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>kasus korona</title>

	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>

	<a href="refresh.php" class="error-button refresh">Refresh</a>

<div class="container">
	<div class="indonesia">
		<h1>Kasus Covid19 Indonesia</h1>
		<div class="data">
			<div class="kasus positif">
				<h3>Positif </h3> 
				<h4><?php echo($korona[0]["positif"]) ?> </h4>
			</div>
			<div class="kasus meninggal">
				<h3>Meninggal </h3>
				<h4> <?php echo($korona[0]["meninggal"]) ?> </h4>
			</div>
			<div class="kasus sembuh">
				<h3>Sembuh </h3> 
				<h4><?php echo($korona[0]["sembuh"]) ?> </h4>
			</div>
		</div>
	</div>

	<h1 class="judul-daerah">Kasus Covid19 Daerah</h1>
	<div class="daerah" >
			<form action="" method="post" class="form-provinsi">
				<label for="provinsi">Pilih Provinsi: </label>
				<div class="longkap"></div>
				<select id="provinsi" name="kode">

					<?php
					$i = 0;
					 foreach ($provinsi as $p): ?>
						
						
						<?php $i++ ?>
					<?php endforeach ?>
					<?php for ($i=0; $i < 34; $i++) :?> 
						<option value="<?php echo $i ?>"> <?php echo $provinsi[$i]["attributes"]["Provinsi"]; ?> </option>
					<?php endfor ?>
					
				</select>
				<input type="submit" name="submit" value="Lihat">
			</form>

			<?php if (isset($_POST['submit'])): ?>
				<?php 
				 $int = (is_numeric($_POST['kode']) ? (int)$_POST['kode'] : 0);
				  ?>
				<h2> Provinsi   <?php echo $provinsi[$int]["attributes"]["Provinsi"] ; ?> </h2>
				<div class="data data">
					<div class="kasus positif kasus-daerah">
					 	<h3> Positif  </h3>
						<h4> <?php echo $provinsi[$int]["attributes"]["Kasus_Posi"] ; ?> </h4>
					 </div>
					 <div class="kasus meninggal kasus-daerah">
					 	<h3> Meninggal </h3>
						<h4>  <?php echo $provinsi[$int]["attributes"]["Kasus_Meni"] ; ?> </h4>
					 </div>
					 <div class="kasus sembuh kasus-daerah">
					 	<h3> Sembuh </h3> 
						<h4> <?php echo $provinsi[$int]["attributes"]["Kasus_Semb"] ; ?></h4>
					 </div>	
				</div>
			<?php endif ?>
	</div>
</div>




<?php 

if (null !== error_get_last()) : ?>

	<!-- <button ></button> -->
	<div class="container">
		<div class="error">
			<div class="box-error">
				<h6>Ada Masalah</h6>
				<a href="refresh.php" class="error-button">REFRESH</a>
			</div>
		</div>
	</div>
	
	
	<!-- header("Location: refresh.php"); -->

<?php endif ?>
</body>
</html>
