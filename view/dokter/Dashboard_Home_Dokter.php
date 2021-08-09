<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script defer src="../../js/all.js"></script> 
    <link rel="stylesheet" href="../../css/all.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styling_dashboardHome_dokter.css?<?=filemtime('styling_dashboardHome_dokter.css');?>">
    <title>Riwayat Pasien</title>

</head>
<body>
    <div class="sideNavBar">
    <div class="sideNav">
        <center> <img src="../../resource/kedokteran_logo.png" class="logoDokter"> </center>

        <div class="item_sidemenu1">
			<a class="item"  href="Dashboard_Home_Dokter.php" style="display: flex;">	
				<i class="fa fa-home" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 32px">Home</p>
			</a>
		</div>


        <div class="item_sidemenu">
			<a class="item"  href="antrian_pasien_dokter.php" style="display: flex;">	
				<i class="fas fa-user-clock" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 27px">Antrian Pasien</p>
			</a>
		</div>

        <div class="item_sidemenu">
			<a class="item"  href="riwayat_pasien_dokter.php" style="display: flex;">	
				<i class="fa fa-file-alt" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 40px">Riwayat Pasien</p>
			</a>
		</div>

        <div class="item_sidemenu">
			<a class="item"  href="inventory_obat_dokter.php" style="display: flex;">	
				<i class="fas fa-prescription-bottle-alt" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 40px">Inventory</p>
			</a>
		</div>

        <div class="item_sidemenu">
			<a class="item"  href="../../switch.php" style="display: flex;">	
				<i class="fas fa-sign-out-alt" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 32px">Switch</p>
			</a>
		</div>
    
    
    
    </div>
    </div>

    <div class="isiKonten">
        <div class="clock" id="clock">
            <span class="clock-time" id="clock-time"></span>
            <span class="clock-ampm" id="clock-ampm"></span>
        </div>

        <p class="tulisanHome" style="margin-top:-4.5vw">Selamat datang,</p><break> 
        <p class="tulisanHome" style="font-family:robotoRegular">Di Aplikasi Riwayat Pasien </p>

        <div class="shortcut_text" >
  				<p style="font-family: modecoLightItalic; color: #d9d9d9">Quick Shortcut</p>
  				<div class="garis_lurus_halamanDepan"></div>
  		</div>

       <div class="itemShortcut">
           <a href="riwayat_pasien_dokter.php" class="menu">
                <div class="card test">
                    <img class="card-img-top" src="../../resource/riwayat_dokter.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title ">Riwayat Pasien</h4>
                        <p class="card-text">Menu shortcut untuk menampilan data </p>
                    </div>
                </div>
           </a>

           <a href="antrian_pasien_dokter.php" class="menu">
                <div class="card test">
                    <img class="card-img-top" src="../../resource/antrian_dokter.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title ">Antrian Pasien</h4>
                        <p class="card-text">Shortcut untuk antrian pasien saat ini</p>
                    </div>
                </div>
           </a>

            
       </div>
    </div>
    <script type="text/javascript" src="../../js/clock.js"></script>
</body>
</html>