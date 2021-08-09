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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styling_sideNAvigation_dokter.css?<?=filemtime('styling_sideNAvigation_dokter.css');?>">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script defer src="../../js/all.js"></script> 
    <link rel="stylesheet" href="../../css/all.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
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
   
</body>
</html>