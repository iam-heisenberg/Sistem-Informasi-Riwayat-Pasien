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
    <script defer src="../../js/all.js"></script>
    <link rel="stylesheet" href="../../css/all.css"/>
    <link href="../../css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="styling_listRiwayatPasien_dokter.css?<?=filemtime('styling_listRiwayatPasien_dokter.css');?>">
    <title>List Riwayat Pasien</title>
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
        <div class="boxKosong"></div>
        
        <div class="headerKumpulan">
            <div class="tombolKembali">
                <a href="riwayat_pasien_dokter.php"><i class="fa fa-arrow-left logo_kembali" aria-hidden="true"></i></a>
            </div>

            <div class="judulHeader">
                List Riwayat Pasien
            </div>
        </div>

        <div class="dasarCari">
            <form action="list_riwayatPasien_dokter.php" method="post" class="styleForm">
                <input type="text" class="cari" placeholder="Cari nama pasien" name="textCari" id="textCari">  
                <div class="tombol_cari"><button type="submit" name="cari" id="cari" class="searchIni"><i class="fa fa-search" aria-hidden="true"></i></button></div>
        </div>

        <div class="dasarTabel"> 
            <?php
                if(isset($_POST['cari'])){
                    ?>
                    <form action="inventory_obat_dokter.php" method="post">
                        <button type="submit" class="btn btn-primary reset" >Reset</button>
                    </form>

            <?php		
                }
            ?>
            <table class="table table-hover">
                <thead class="myThead">
                    <tr>
                        <th style="width:10%">No</th>
                        <th style="width:20%">ID Pasien</th>
                        <th style="width:50%">Nama Pasien</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                            $no=1;
                            include '../../controller/dokter/koneksi.php';
                            $batas=15; 
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1; 
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas)-$batas:0; 

                            $kembali = $halaman - 1; 
                            $selanjutnya = $halaman + 1; 

                            $list_riwayat = mysqli_query($koneksi,"select * from pasien where mode=1");
                            $jumlah_data=mysqli_num_rows($list_riwayat); 
                            $total_halaman=ceil($jumlah_data/$batas);
                            if(isset($_POST['cari'])){
                                $textDiCari=$_POST['textCari'];
                                $list_tampilRiwayat=mysqli_query($koneksi,"select id_pasien, nama_pasien from pasien where mode=1 and nama_pasien like '%$textDiCari%'");
                            }else{
                                $list_tampilRiwayat = mysqli_query($koneksi,"select id_pasien, nama_pasien from pasien where mode=1 limit $halaman_awal, $batas"); 
                            }
                            while ($list=mysqli_fetch_array($list_tampilRiwayat)){
                        ?>
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $list['id_pasien'] ?></td>
                        <td><?php echo $list["nama_pasien"]?></td>
                        <td style="display:flex">
                            <a href="detail_riwayatPasien_dokter.php?id=<?php echo $list['id_pasien']; ?>" class="btn btn-primary" style="margin-right:2%">Detail</a>
                            <a href="../../controller/dokter/controller_riwayatPasien.php?id_delet=<?php echo $list['id_pasien']; ?>" class="btn btn-danger" style="margin-right:2%">hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
			<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$kembali'"; } ?>> <i class="fa fa-chevron-left" aria-hidden="true" style="color:black"></i> </a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a  style="color:black"  class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$selanjutnya'"; } ?>><i class="fa fa-chevron-right" aria-hidden="true" style="color:black"></i></a>
				</li>
			</ul>
		</nav>
		
		</div>	
		<div class="kosong"></div>
    
        </div>

    </div>
</body>
</html>