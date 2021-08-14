<?php
 ini_set('error_reporting', 0);
 ini_set('display_errors', 0);
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Riwayat Pasien</title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script defer src="../../js/all.js"></script> 
    <link rel="stylesheet" href="../../css/all.css"/>
 
	<link rel="stylesheet" type="text/css" href="styling_pasien_depan.css?<?=filemtime('styling_pasien_depan.css');?>">
    <!-- <link rel="stylesheet" type="text/css" href="styling_pasien_depan.css"/> -->
</head>
<body>
		<div class="sidemenu" >
			<div>
				<img src="../../resource/kedokteran_logo.png" class="logo_dokter">
			</div>
			
			<div class="item_sidemenu" style="margin-top: 50%;">
				<a class="item" href="Dashboard_Home_depan.php" style="display: flex;">
					<i class="fas fa-home" style="font-size: 26px;margin-left: 15px;margin-top: 5px"></i>
					<p style="font-family: futuraBold; font-size: 25px; margin-left: 20px">Home</p>
				</a>
			</div>
		
			
			<div class="item_sidemenu">
				<a class="item"  href="pasien_depan.php" style="display: flex;height: 40px;width: 170px;">	
					<i class="fas fa-users" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
					<p style="font-family: futuraBold; font-size: 25px; margin-left: 20px">Pasien</p>
				</a>
			</div>

			
			<div class="item_sidemenu">
				<a class="item" href="inventory_depan.php"  class="item_item_sidemenu" style="display: flex;">
					<i class="fas fa-prescription-bottle-alt " style="font-size: 26px;margin-left: 15px;margin-top: 5px"></i>
					<p  style="font-family: futuraBold; font-size: 25px; margin-left: 15px">Inventory</p>
				</a>
			</div>
			<div class="item_sidemenu">
			<a class="item" href="antri_pasien_depan.php"  class="item_item_sidemenu " style="display: flex;">
				<i class="fas fa-user-clock" style="font-size: 26px;margin-left: 15px;margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 20px" >Antri</p>
			</a>
		</div>


			<div class="item_sidemenu">
				<a class="item" href="../../switch.php"  class="item_item_sidemenu " style="display: flex;">
					<i class="fas fa-sign-out-alt" style="font-size: 26px;margin-left: 15px;margin-top: 5px"></i>
					<p style="font-family: futuraBold; font-size: 25px; margin-left: 20px" >Switch</p>
				</a>
			</div>
		</div>

	<div class="isi_konten">

		<p class="tulisan_judul">Data</p>
		<p class="tulisan_judul" style="margin-top: -70px;">Pasien</p>

		<form action="list_pasien_depan.php" method="post" class="form_cari">
	  			<input type="text" name="cari" required id="cari" placeholder="Masukan Nama atau ID Pasien" class="input_box">
	  			<button class="button_box"><i class="fas fa-arrow-right"></i></button>		
	  	</form>


	  	<div class="item_opsi">
	  		<a href="registrasi_pasien_depan.php" style="text-decoration:none">
	  			<div class="card tombol">
	  				<img class="card-img-top" src="../../resource/plus_pasien.jpg" alt="Card image cap">
	  				<div class="card-body">
	   					<h6 class="card-title text_card">Form Pasien</h6>
	   					<p class="card-text" style="text-align: center; font-size: 14px; margin-top:10px;  ">Formulir pendaftaran pasien baru </p>
	  				</div>
				</div>
	  		</a>


			<a href="list_pasien_depan.php"style="text-decoration:none">
				<div class="card tombol" style="margin-left: 2vw;">
  				<img class="card-img-top" src="../../resource/list_pasien.jpg" alt="Card image cap">
  				<div class="card-body">
   					<h6 class="card-title text_card">List Pasien</h6>
   					<p class="card-text" style="text-align: center; font-size: 14px ; margin-top:10px;  ">Menampilkan seluruh daftar pasien </p>
  				</div>
			</div>	

			</a>
	  	</div>


	  	
	</div>




</body>
</html>