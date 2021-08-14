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
 
	<link rel="stylesheet" type="text/css" href="styling_listPasien_depan.css?<?=filemtime('styling_listPasien_depan.css');?>">
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
		<div class="aestheticc_kotak"></div>
		
		<div class="header">
			<a href="pasien_depan.php"><button class="rounded back_button"><i class="fas fa-arrow-left"></i></button></a>
		
			<div class="rounded judul">
				<p class="text_header_style">List Daftar Pasien</p>	
			</div>
		</div>

	
			<form action="list_pasien_depan.php" method="post" class="bungkus_cari">
				<div class="rounded dasar_cari">
					<input type="text" required name="cari" id="cari" placeholder="Cari Nama Pasien atau ID Pasien " class="rounded cari">
				</div>

				<div class="rounded dasar_logoSearch">
					<button class=" rounded logo_cari" type="submit"><i class="fas fa-search"></i></button>
				</div>
			</form>

		<div class="rounded tabel_dasar">

		<?php
			if(isset($_POST['cari'])){
				?>
				<form action="list_pasien_depan.php" method="post">
					<button type="submit" class="btn btn-primary reset" >Reset</button>
				</form>

		<?php		
			}
		?>

			<table class="table table-hover style_tabel">
				<thead class="tabel">
					<tr>
						<th scope="col">ID Pasien</th>
						<th scope="col">No KTP</th>
						<th scope="col">Nama</th>
						<th scope="col">Jenis Kelamin</th>
						<th scope="col">Tanggal Lahir</th>
						<th scope="col">Alamat</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					include '../../controller/resepsionis/koneksi.php'; 

					$batas=15;
					$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
					$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

					$kembali = $halaman - 1;
					$selanjutnya = $halaman + 1;

					$list_pasien = mysqli_query($koneksi,"select * from pasien");
					$jumlah_data=mysqli_num_rows($list_pasien); 
					$total=ceil($jumlah_data/$batas); 
					$nomor=$halaman+1;

					if(isset($_POST['cari'])){
						$cari = $_POST['cari']; 
						$list_tampilPasien=mysqli_query($koneksi,"SELECT * FROM pasien WHERE nama_pasien LIKE '%$cari%'");
					}else{
						$list_tampilPasien= mysqli_query($koneksi,"select * from pasien where mode = 1 limit $halaman_awal, $batas");
					}
					while ($list = mysqli_fetch_array($list_tampilPasien)) {
						?>

						<tr>
							<th scope="row"><?php echo $list['id_pasien'];?></th>
							<td><?php echo $list['ktp_pasien'];?></td>
							<td><?php echo $list['nama_pasien'];?></td>
							<td><?php echo $list['kelamin_pasien'];?></td>
							<td><?php echo $list['tgl_lahir_pasien'];?></td>
							<td><?php echo $list['alamat_pasien'];?></td>
							<td  style="width:15%" >
								<a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $list['id_pasien'];?>"><i class="fas fa-edit"></i></a>
								<a href="../../controller/resepsionis/controller_hapus_pasien.php?id=<?php echo $list['id_pasien']; ?>"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>
							</td>
						</tr>

						<tr>
	
							<div class="modal fade" id="myModal<?php echo $list['id_pasien'];?>" role="dialog">
								<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
									<div class="modal-content" >
										<div class="modal-body">
											<div class="header_modal">
												<p class="tulisan_header">Update Data Pasien</p> 
											</div>
											
											<div class="enkapsulasi">
											<form class="needs-validation" method="GET" action="../../controller/resepsionis/controller_update_pasien.php" style="margin-top: 15px;" >
												<?php
													include '../../controller/resepsionis/koneksi.php';
													$id = $list['id_pasien']; 
													$query_edit = mysqli_query($koneksi,"select * from pasien WHERE id_pasien='$id'");
													while ($list = mysqli_fetch_array($query_edit)) {  
												?>

													<div class="form-row">
														<div class="form-group col">
															<input type="hidden" name="id" id="id" value="<?php echo $list["id_pasien"]?>">
															<label for="nama">Nama : </label>
															<input type="text" name="nama" id="nama" value="<?php echo $list['nama_pasien']?>" class="form-control" required>
															
														</div>
														<div class="form-group col">
															<label for="tgl_lahir">Tanggal Lahir (dd-mm-yyyy) : </label>
															<input type="text" name="tgl_lahir" id="tgl_lahir" value="<?php echo $list['tgl_lahir_pasien']?>" class="form-control" required>
														</div>
													</div>

													<div class="form-row">
														<div class="form-group col">
															<label for="kelamin">Kelamin :</label>
															<select id="kelamin" class="form-control" name="kelamin" required="">
																<option selected><?php echo $list['kelamin_pasien']?></option>
																<option value="Laki - Laki">Laki - Laki</option>
																<option value="Perempuan">Perempuan</option>
															</select>
														</div>
														<div class="form-group col">
															<label for="alamat">Alamat :</label>
															<input type="text" name="alamat" id="alamat" value="<?php echo $list['alamat_pasien']?>" class="form-control" required>
														</div>
													</div>

													<div class="form-row">
														<div class="form-group col">
															<label for="ktp">KTP :</label>
															<input type="text" name="ktp_pasien" id="ktp_pasien" value="<?php echo $list['ktp_pasien']?>" class="form-control" required>
															
														</div>
													</div>

													<button type="submit" class="btn btn-primary" style="margin-top	: 10px;">Simpan</button>

													 <!-- <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top: 10px;"><i class="fas fa-times-circle" style="color: white; font-size: 26px;"></i></button> -->
													<?php
														}
													?>
											</form>
											</div>
						
											<!-- script type="text/javascript">
												(function() {
													  'use strict';
													  window.addEventListener('load', function() {
													    // Fetch all the forms we want to apply custom Bootstrap validation styles to
													    var forms = document.getElementsByClassName('needs-validation');
													    // Loop over them and prevent submission
													    var validation = Array.prototype.filter.call(forms, function(form) {
													      form.addEventListener('submit', function(event) {
													        if (form.checkValidity() === false) {
													          event.preventDefault();
													          event.stopPropagation();
													        }
													        form.classList.add('was-validated');
													      }, false);
													    });
													  }, false);
													})();
											</script> -->

										</div>
									</div>
								</div>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<?php
			if(isset($_POST['cari'])){
							
			} else{
			?>
			<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$kembali'"; } ?>> <i class="fa fa-chevron-left" aria-hidden="true" style="color:black"></i> </a>
				</li>
				<?php 
				for($x=1;$x<=$total;$x++){
					?> 
					<li class="page-item"><a  style="color:black"  class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total) { echo "href='?halaman=$selanjutnya'"; } ?>><i class="fa fa-chevron-right" aria-hidden="true" style="color:black"></i></a>
				</li>
			</ul>
			</nav>
			<?php	
			}
			?>
			
		</div>
		<div class="kosong"></div>
	</div>

									
</body>
</html>