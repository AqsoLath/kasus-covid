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

	<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="style9.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">



	<link rel="preconnect" href="https://fonts.gstatic.com">

	<link href="https://fonts.googleapis.com/css2?family=Patua+One&family=Prompt&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@600&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab+Highlight:wght@700&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Zilla+Slab+Highlight:wght@700&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<!-- aos -->

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<!-- font awesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light  fixed-top navbar-gw">
  <div class="container">
    <a class="navbar-brand" href="#">Peduli <span>COVID</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link mx-3" href="#">Kasus</a>
        <a class="nav-link mx-3" href="#pencegahan">Pencegahan</a>
        <a class="nav-link mx-3" href="#gejala">Gejala</a>
      </div>
    </div>
  </div>
</nav>

	<!-- <a href="refresh.php" class="error-button refresh">Refresh</a> -->

<div class="container">
	<div class="kasus-all " id="kasus">
		<div class="indonesia">
			<h1>Kasus <span>Covid-19</span> Indonesia</h1>
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
			<img src="image/virus.png" class="virus1">
			<img src="image/virus.png" class="virus2">
			<img src="image/virus.png" class="virus3">
			<img src="image/virus.png" class="virus4">
			<img src="image/virus.png" class="virus5">
			<!-- <img src="image/tameng.png" class="tameng"> -->
		</div>

		<h1 class="judul-daerah">Kasus <span>Covid-19</span> Daerah</h1>
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
					<input type="submit" name="submit" value="Lihat" id="submit">
				</form>

				<div class="dummy-data" id="dummy">
					<div class="data data">
						<div class="kasus positif kasus-daerah">
						 	<h3> Positif  </h3>
							<h4> 0 </h4>
						 </div>
						 <div class="kasus meninggal kasus-daerah">
						 	<h3> Meninggal </h3>
							<h4> 0 </h4>
						 </div>
						 <div class="kasus sembuh kasus-daerah">
						 	<h3> Sembuh </h3> 
							<h4> 0 </h4>
						 </div>	
					</div>
				</div>
				<?php if (isset($_POST['submit'])): ?>
					<?php 
					echo "<script>
						const dummy = document.getElementById('dummy');

						dummy.style.display = 'none';
					</script>";
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
				<div class="col-lg-6 d-flex align-self-center flex-column">
					<h3>Memakai Masker</h3>
					<p>
					Memakai masker adalah hal yang penting untuk mengendalikan penyebaran virus corona, termasuk di dalam rumah. Tinjauan CDC memperjelas bahwa penggunaan masker, menjaga jarak secara fisik, menghindari keramaian, dan mencuci tangan membantu mengendalikan penyebaran virus jahat ini.
					</p>
				</div>
			</div>
			<div class="row mt-3"  data-aos="zoom-in-up" data-aos-duration="1000">
				<div class="col-lg-6"><img src="image/jarak.png" class="mx-auto d-block"></div>
				<div class="col-lg-6 d-flex align-self-center flex-column">
					<h3>Menjaga Jarak</h3>
					<p>
					Untuk menghentikan penyebaran virus corona yang terjadi saat ini, masyarakat telah diinstruksikan untuk melakukan physical distancing atau menjaga jarak antar manusia dengan cara tinggal di rumah, menghindari keramaian, dan menahan diri untuk tidak melakukan kontak langsung dengan orang lain.
					</p>
				</div>
			</div>
			<div class="row mt-3"  data-aos="zoom-in-up" data-aos-duration="1000">
				<div class="col-lg-6"><img src="image/tangan.jpg" class="mx-auto d-block"></div>
				<div class="col-lg-6 d-flex align-self-center flex-column">
					<h3>Mencuci Tangan</h3>
					<p>
					Kuman penyakit sangat mudah ditularkan melalui tangan.Pada saat makan kuman dengan cepat masuk ke dalam tubuh, yang bisa menimbulkan penyakit. Tangan kadang terlihat bersih secara kasat mata namun tetap mengandung kuman.Sabun dapat membersihkan kotoran dan merontokkan kuman. Tanpa sabun, kotoran dan kuman masih tertinggal di tangan.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="gejala" >
		<div class="tanda-gejala" id="gejala"></div>
		<h2 class="mt-5 mb-4" data-aos="fade-up" data-aos-duration="500">Gejala - Gejala <span>Covid-19</span></h2>
		
			<div class="row my-3">
				<div class="col-lg-4 d-flex gejala-card" data-aos="zoom-out" data-aos-duration="1000">
					<img src="image/batuk-kartun.jpg" class="d-block mx-auto">
					<h4>Batuk</h4>
				</div>
				<div class="col-lg-4 d-flex gejala-card" data-aos="zoom-out" data-aos-duration="1000">
					<img src="image/demam-kartun.jpg" class="d-block mx-auto">
					<h4>Demam</h4>
				</div>
				<div class="col-lg-4 d-flex gejala-card" data-aos="zoom-out" data-aos-duration="1000">
					<img src="image/lelah-kartun.jpg" class="d-block mx-auto">
					<h4>Lelah</h4>
				</div>
			</div>	
			<div class="row">
				<div class="col-lg-4 d-flex gejala-card" data-aos="zoom-out">
					<img src="image/pusing-kartun.jpg" class="d-block mx-auto"data-aos-duration="1000"data-aos-duration="1000">
					<h4>Sakit Kepala</h4>
				</div>
				<div class="col-lg-4 d-flex gejala-card" data-aos="zoom-out"data-aos-duration="1000"data-aos-duration="1000">
					<img src="image/diare-kartun.jpg" class="d-block mx-auto">
					<h4>Diare</h4>
				</div>
				<div class="col-lg-4 d-flex gejala-card" data-aos="zoom-out" data-aos-duration="1000">
					<img src="image/sesak-kartun.jpg" class="d-block mx-auto">
					<h4>Sesak Napas</h4>
				</div>
			</div>	
	</div>
	<div class="telepon">
		<h2 class="text-center">No Telepon Cepat Tanggap <span>Covid-19</span></h2>
		<div class="row">
			<div class="col-lg-6">
				<h3 class="text-center">
					Call Center Kota Bekasi
				</h3>
				<p class="text-center"> <i class="fa  fa-phone-square fa-lg" aria-hidden="true"></i >0813-1683-1813 </p>
				<p class="text-center"> <i class="fa  fa-phone-square fa-lg" aria-hidden="true"></i >0812-9448-0776 </p>
				
			</div>
			<div class="col-lg-6">
				<h3 class="text-center">
					Call Center PMI
				</h3>
				<p class="text-center"> <i class="fa  fa-phone-square fa-lg" aria-hidden="true"></i >(021) 88960247</p>
				
				
			</div>
		</div>
	</div>
</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<h6 class="footer-judul">About Us</h6>
					<p>Website ini dibuat sebagai project magang kelompok dari Siswa/i kelas XI TKJ 4 SMKN 3 KOTA BEKASI yang berisikan data-data, cara pencegahan, dan gejala-gejala terkait Covid-19. Yang dimana data-data tersebut diharapkan dapat berguna bagi masyarakat.</p>
				</div>	
				<div class="col-lg-3 kontak">
					<h6 class="footer-judul">Contact Us</h6>
					<ul>
						<li>
							<a href="https://www.instagram.com/aqsolath/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i>Aqsha Lathif</a>
						</li>
						<li>
							<a href="https://www.instagram.com/alisktch/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i>Ariyo Alinugroho</a>
						</li>
						<li>
							<a href="https://www.instagram.com/auliamaulida1612/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i>Aulia Maulida</a>
						</li>
						<li>
							<a href="https://www.instagram.com/madis_15/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i>Adi Saputra</a>
						</li>
					</ul>
				</div>
			</div>
			<hr>
			<h6 class="copyright">Copyright <i class=" fa fa-copyright" aria-hidden="true"></i>2021</h6>
		</div>
	</footer>





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

<script type="text/javascript">
	const submit = document.getElementById('submit');

	submit.addEventListener('click', function () {
    	dummy.style.display = "none";
    })
</script>

</body>
</html>
