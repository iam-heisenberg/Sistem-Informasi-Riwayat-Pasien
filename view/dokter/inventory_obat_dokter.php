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
    <link rel="stylesheet" type="text/css" href="styling_inventoryObat_dokter.css?<?=filemtime('styling_inventoryObat_dokter.css');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Obat</title>
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
        <div class="headerAesthethic"></div>

        <div class="judulHeader">
            <p class="judulTulisan">Inventory Obat</p>
        </div>
        <form action="inventory_obat_dokter.php" method="post" class="bungkus_cari">
				<div class="rounded dasar_cari">
					<input type="text" name="cari" id="cari" placeholder="Cari Nama Obat atau ID Obat " class="rounded cari">
				</div>

				<div class="rounded dasar_logoSearch">
					<button class=" rounded logo_cari" type="submit"><i class="fas fa-search"></i></button>
				</div>
		</form>
        
        <div class="tabelObat">
        <?php
			if(isset($_POST['cari'])){
				?>
				<form action="inventory_obat_dokter.php" method="post">
					<button type="submit" class="btn btn-primary reset" >Reset</button>
				</form>
		<?php		
			}
		?>
            
            <table class="table table-hover table-borderless">
                <thead style="background-color: #3D8C95; color: white;">
                    <tr>
                        <th style="width:7%">No</th>
                        <th>Nama Obat</th>
                        <th style="width:15%">Stock</th>
                        <th style="width:15%">Harga Jual</th>
                        <th style="width:10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
						include '../../controller/resepsionis/koneksi.php';
						
						$batas=15; 
						$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1; 
						$halaman_awal = ($halaman>1) ? ($halaman * $batas)-$batas:0; 

						$kembali = $halaman - 1; 
						$selanjutnya = $halaman + 1; 

						$list_obat = mysqli_query($koneksi,"select * from obat where status=1");
						$jumlah_data=mysqli_num_rows($list_obat); 
						$total_halaman=ceil($jumlah_data/$batas);
                        $no=1;

						if(isset($_POST['cari'])){
							$cari = $_POST['cari']; 
							$list_tampilObat=mysqli_query($koneksi,"select * from obat where status=1 and nama_obat LIKE '%$cari%'");
						} else{
							$list_tampilObat = mysqli_query($koneksi,"select * from obat where status=1 limit $halaman_awal, $batas");
						}
						while ($list = mysqli_fetch_array($list_tampilObat)) {
					?>
                    <tr>
                        <td scope="row"><?php echo $no++ ?></td>
                        <td><?php echo $list['nama_obat'] ?></td>
                        <td><?php echo $list['stock_obat'] ?></td>
                        <td><?php echo $list['harga_jual'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelId<?php echo $list['nama_obat'];?>">
                                Edit Stock
                            </button>
                        </td>
                    </tr>


                        <div class="modal fade" id="modelId<?php echo $list['nama_obat'];?>" role="dialog" >
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="headerModal">
                                            UPDATE STOCK
                                        </div>

                                        <div class="formUpdate">
                                            <form action="../../controller/dokter/controller_stokObat.php" method="post">
                                                <div class="row">
                                                    <div class="col" style="wdith:90%; border:none">
                                                        <label class="form-control"><?php echo $list['nama_obat'];?></label>
                                                    </div>

                                                    <div class="col-3" style="wdith:10%">
                                                        <input type="number"
                                                            class="form-control" name="jumlahObat" id="jumlahObat" aria-describedby="helpId" placeholder="<?php echo $list['stock_obat'];?>" required>
                                                        <input type="hidden" name="id_obat" id="id_obat" value="<?php echo $list['nama_obat'];?>">
                                                    
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <button type="submit" class="form-control btn btn-primary" name="tambahObat" id="tambahObat">Tambah</button>
                                                    </div>

                                                    <div class="col">
                                                        <button type="submit" class=" form-control btn btn-primary" name="kurangObat" id="kurangObat">Kurang</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
                
            </table>

            <?php
				if(isset($_POST['cari'])){
					?>
						
			<?php		
				} else{
					?>
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

			<?php
				}
			?>
			
		</div>	
		<div class="kosong"></div>
        </div>
        
    </div>

    <!-- Button trigger modal -->
  
    
    

</body>
</html>