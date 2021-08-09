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
    <link rel="stylesheet" type="text/css" href="styling_riwayatPasien_dokter.css?<?=filemtime('styling_riwayatPasien_dokter.css');?>">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
    <script defer src="../../js/all.js"></script> 
    <link rel="stylesheet" href="../../css/all.css"/>
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
        <p class="header1">Riwayat</p> <break>
		<p class="header2">Pasien</p>

       <form action="#" class="bungkus_text">
            <div class="bungkus_cari">
                <input type="text" name="cari_riwayat" id="cari_riwayat" placeholder="Cari riwayat pasien" class="cari_riwayat">
            </div>

            <div class="submit">
                <button type="submit" class="tombol_submit"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>
       </form>

       
        <div class="card_pilihan">
            <a href="tambah_riwayatPasien_dokter.php   " class="enkapsulasiA">
                <div class="card kartu_pilihan">
                    <img class="card-img-top" src="../../resource/tambah_riwayat.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Tambah</h4>
                        <p class="card-text">Tambah riwayat pasien jika diperlukan</p>
                    </div>
                </div>
            </a>
          
            <a href="list_riwayatPasien_dokter.php" class="enkapsulasiA">
                <div class="card kartu_pilihan" style="margin-left:2.5vw">
                    <img class="card-img-top" src="../../resource/liat_riwayat.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">List</h4>
                        <p class="card-text">Menampilkan seluruh data riwayat pasien</p>
                    </div>
                </div>
            </a>
        </div>
    
    </div>
</body>
</html>