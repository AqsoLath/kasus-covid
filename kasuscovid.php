<?php 

$data = file_get_contents("https://api.kawalcorona.com/indonesia");

$data2 = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");

$korona = json_decode($data, true);

$provinsi = json_decode($data2, true);

// var_dump($korona) ;
// var_dump($provinsi[1]);
// var_dump($provinsi[7]);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>kasus korona</title>
</head>
<body>

<h1>Kasus Covid19 Indonesia</h1>

<h1>positif : <?php echo($korona[0]["positif"]) ?></h1>
<h1>meninggoy : <?php echo($korona[0]["meninggal"]) ?></h1>
<h1>sembuh : <?php echo($korona[0]["sembuh"]) ?></h1>



<div class="container" style="display: flex; margin-top: 100px;">
	
	<div class="container1">
		<h1>Kasus Covid19 Daerah</h1>
		<form action="" method="post">
			<input type="text" min="0" step="1" name="kode" placeholder="Masukkan kode daerah">
			<input type="submit" name="submit">
		</form>

		<?php if (isset($_POST['submit'])): ?>

			<?php 
			 $int = (is_numeric($_POST['kode']) ? (int)$_POST['kode'] : 0);
			 // var_dump($int); ?>
			<h1> provinsi :  <?php echo $provinsi[$int]["attributes"]["Provinsi"] ; ?> </h1>
			<h2> Positif :  <?php echo $provinsi[$int]["attributes"]["Kasus_Posi"] ; ?> </h2>
			<h2> Meninggal :  <?php echo $provinsi[$int]["attributes"]["Kasus_Meni"] ; ?> </h2>
			<h2> Sembuh :  <?php echo $provinsi[$int]["attributes"]["Kasus_Semb"] ; ?> </h2>
		<?php endif ?>
	</div>

	<div class="container2">
		<ol start="0">
			<?php for ($i=0; $i < 34 ; $i++) { ?>
				<li><?php echo $provinsi[$i]["attributes"]["Provinsi"]; ?></li>
			<?php } ?>
			
		</ol>
	</div>
</div>

</body>
</html>
