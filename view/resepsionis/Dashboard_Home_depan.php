<?php
 ini_set('error_reporting', 0);
 ini_set('display_errors', 0);
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html >
<head>
    <title>Aplikasi Riwayat Pasien</title>

    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script defer src="../../js/all.js"></script> 
    <link rel="stylesheet" href="../../css/all.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" type="text/css" href="styling_Dashboard_depan.css?<?=filemtime('styling_Dashboard_depan.css');?>">
   
    
</head>

<body>
	<div class="sidemenu" >
		<div>
			<img src="../../resource/kedokteran_logo.png" class="logo_dokter">
		</div>
		
		<div class="item_sidemenu" style="margin-top: 50%;">
			<a class="item" href="Dashboard_Home_depan.php" style="display: flex; height: 40px;width: 170px;">
				<i class="fas fa-home" style="font-size: 26px;margin-left: 15px;margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 20px">Home</p>
			</a>
		</div>
	
		
		<div class="item_sidemenu">
			<a class="item"  href="pasien_depan.php" style="display: flex;">	
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

	<div style="position: absolute; left: 20%; width: 80%;">
		
		<div class="clock" style="position: absolute;" id="clock">
    		<span class="clock-time" id="clock-time"></span>
   			<span class="clock-ampm" id="clock-ampm"></span>	


			<p class="tulisan_welcome" >Selamat datang, </p> 
  			<p class="tulisan_welcome" style="margin-top: -45px; font-family: robotoRegular"> Di Aplikasi Riwayat Pasien</p>

  			<form action="list_pasien_depan.php" method="post" class="form_cari">
	  			<input type="text" name="cari" required id="cari" placeholder="Masukan Nama atau ID Pasien" style="width: 90%; border-radius:1000px; height: 100%; padding-left: 20px ; font-family: robotoRegular; border-style: none;" >
	  	   		<button type="submit" style="border-radius: 1000px; width: 50px;height: 100%; margin-left: 10px; background-color: white; border-style: none;" ><i class="fas fa-arrow-right" style="font-size: 17px"></i></button>		
	  		</form>

	  		<div class="shortcut_text" >
  				<p style="font-family: modecoLightItalic; color: #d9d9d9">Quick Shortcut</p>
  				<div class="garis_lurus_halamanDepan"></div>
  			</div>


	  		<div class="quick_shortcut" style="display: flex;">
	  			<a href="registrasi_pasien_depan.php" class="card_button"> 
					  <div class="card kartu_shortcut" >
					  <img class="card-img-top " src="../../resource/pasien_plus.jpg" alt="Card image cap">
					  <div class="card-body">
						    <p class="card-title card_text_title">REGISTRASI PASIEN</p>
						    <p class="subJudul">Jika pasien belum terdaftar bisa menekan shortcut ini</p>
						</div>
				</div></a>

				<a href="antri_pasien_depan.php" class="card_button">
				<div class="card kartu_shortcut">
					  <img class="card-img-top" src="../../resource/antri2.jpg" alt="Card image cap" >
					  <div class="card-body">
						    <p class="card-title card_text_title">REGISTRASI ANTRIAN </p>
							<p class="subJudul">Untuk membuat nomor antrian pasien</p>
						</div>
				</div></a>

				<a href="list_obat_depan.php" class="card_button">
				<div class="card kartu_shortcut">
					  <img class="card-img-top" src="../../resource/obat.jpg" alt="Card image cap">
					  <div class="card-body">
							<p class="card-title card_text_title">PENCATATAN OBAT</p>
						 	<p class="subJudul">Semua tentang obat obatan yang telah tersimpan</p>
						</div>	
				</div>
	  		</div></a>
  	
  		</div>
  		<script type="text/javascript" src="../../js/clock.js"></script>
	</div>
</body>
</html>