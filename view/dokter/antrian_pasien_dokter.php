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
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script src="../../js/select2.min.js"></script>
    <script src="../../js/select2.full.js"></script>
    <script defer src="../../js/all.js"></script>
    <link rel="stylesheet" href="../../css/all.css"/>
    <link href="../../css/select2.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="styling_antrian_dokter.css?<?=filemtime('styling_antrian_dokter.css');?>">
    <title>Antrian Pasien</title>

    <script>
        $(document).ready(function(){
           setInterval(() => {
               $("#nextPasien").load("load-antrian.php");
           }, 1000);
        });


    </script>
</head>
<body>
    <div class="sideBar">
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
        <div class="boxKosong"></div>

        <div class="headerKumpulan">
           
            <div class="judulHeader">
                Antrian Pasien
            </div>
        </div>

        <div class="kontenSebenarnya" id="kontenSebenarnya">
            <div class="nextPasien" id="nextPasien">
                <p class="judulNext">
                    Pasien Saat Ini
                </p>

                <table class="tabelAntrian" id="tabelAntrian">
                    <tbody>
                <?php 
                    include '../../controller/dokter/koneksi.php'; 
                    $antrian = mysqli_query($koneksi,"SELECT antrian.*, pasien.nama_pasien, pasien.id_pasien FROM antrian INNER JOIN pasien ON antrian.id_pasien = pasien.id_pasien  WHERE modes=2 limit 1 "); 
                    if(mysqli_num_rows($antrian)>0){
                        while($tampilAntrian = mysqli_fetch_array($antrian)){ ?>
                              <tr>
                                <td style="width:40%">  
                                    <?php echo $tampilAntrian['nama_pasien'];?>
                                    <a class="tombol" href="detail_riwayatPasien_dokter.php?id=<?php echo $tampilAntrian['id_pasien'];?>&idAntri=<?php echo $tampilAntrian['id_antrian'];?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </td>  
                            </tr>

                               
                            <?php }} else  {?>
                        <tr>
                           <td>Tidak ada pasien yang akan masuk</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>




                <p class="judulNext"  style="margin-top:2vw;">
                    Daftar antrian pasien
                </p>

                <table class="tabelAntrian" id="tabelAntrian">
                    <tbody>
                <?php
                    $no=1; 
                    include '../../controller/dokter/koneksi.php'; 
                    $antrian = mysqli_query($koneksi,"SELECT antrian.*, pasien.nama_pasien FROM antrian INNER JOIN pasien ON antrian.id_pasien = pasien.id_pasien WHERE modes=1"); 
                    if(mysqli_num_rows($antrian)>0){
                        while($tampilAntrian = mysqli_fetch_array($antrian)){ ?>
                            <tr>
                                <td><?php echo $no++ .".";?></td>
                                <td><?php echo $tampilAntrian['nama_pasien'];?></td>    
                            </tr>
                                <?php }} else {?>
                            <tr>
                                <td>Tidak ada antrian saat ini</td>
                            </tr>
                                <?php } ?>
                    </tbody>
             </table>

                <div class="kosongan"></div>
            </div>
        </div>
   
   
   </div>
    
</body>
</html>