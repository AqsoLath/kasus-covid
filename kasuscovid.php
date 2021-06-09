<?php 
// error_function(8191, "ada error");

// var_dump(error_get_last());


// $data = file_get_contents("https://api.kawalcorona.com/indonesia");

$data = file_get_contents("indonesia.json");

// $data2 = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");

$data2 = file_get_contents("daerah.json");



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

	<link rel="stylesheet" type="text/css" href="style5.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">



	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link href="https://fonts.googleapis.com/css2?family=Patua+One&family=Prompt&display=swap" rel="stylesheet">

	<!-- aos -->

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light  fixed-top navbar-gw">
  <div class="container">
    <a class="navbar-brand" href="#">HEHE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link mx-3" href="#">Kasus</a>
        <a class="nav-link mx-3" href="#pencegahan">Pencegahan</a>
        <a class="nav-link mx-3" href="#">Gejala</a>
      </div>
    </div>
  </div>
</nav>

	<!-- <a href="refresh.php" class="error-button refresh">Refresh</a> -->

<div class="container">
	<div class="kasus-all " id="kasus">
		<div class="indonesia">
			<h1>Kasus Covid-19 Indonesia</h1>
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

		<h1 class="judul-daerah">Kasus Covid-19 Daerah</h1>
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
						<?php for ($i=0; $i < 1; $i++) :?> 
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
	<div class="pencegahan mt-5">
		<div class="tanda-pencegahan" id="pencegahan"></div>
		<h2 class="mb-3">Langkah Pencegahan</h2>
		<div class="pencegahan-box">
			<div class="row mt-3 "  data-aos="zoom-in-up" data-aos-duration="1000">
				<div class="col-lg-6"><img src="image/masker.png" class="mx-auto d-block"></div>
				<div class="col-lg-6">
					<h3>Memakai Masker</h3>
					<p>
					Memakai masker adalah hal yang penting untuk mengendalikan penyebaran virus corona, termasuk di dalam rumah. Tinjauan CDC memperjelas bahwa penggunaan masker, menjaga jarak secara fisik, menghindari keramaian, dan mencuci tangan membantu mengendalikan penyebaran virus jahat ini.
					</p>
				</div>
			</div>
			<div class="row mt-3"  data-aos="zoom-in-up" data-aos-duration="1000">
				<div class="col-lg-6"><img src="image/jarak.png" class="mx-auto d-block"></div>
				<div class="col-lg-6">
					<h3>Menjaga Jarak</h3>
					<p>
					Untuk menghentikan penyebaran virus corona yang terjadi saat ini, masyarakat telah diinstruksikan untuk melakukan physical distancing atau menjaga jarak antar manusia dengan cara tinggal di rumah, menghindari keramaian, dan menahan diri untuk tidak melakukan kontak langsung dengan orang lain.
					</p>
				</div>
			</div>
			<div class="row mt-3"  data-aos="zoom-in-up" data-aos-duration="1000">
				<div class="col-lg-6"><img src="image/tangan.jpg" class="mx-auto d-block"></div>
				<div class="col-lg-6">
					<h3>Mencuci Tangan</h3>
					<p>
					Kuman penyakit sangat mudah ditularkan melalui tangan.Pada saat makan kuman dengan cepat masuk ke dalam tubuh, yang bisa menimbulkan penyakit. Tangan kadang terlihat bersih secara kasat mata namun tetap mengandung kuman.Sabun dapat membersihkan kotoran dan merontokkan kuman. Tanpa sabun, kotoran dan kuman masih tertinggal di tangan.
					</p>
				</div>
			</div>
		</div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
