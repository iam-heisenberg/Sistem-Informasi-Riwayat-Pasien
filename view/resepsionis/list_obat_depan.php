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
	<script src="../../js/select2.min.js"></script>
    <script defer src="../../js/all.js"></script> 
    <link rel="stylesheet" href="../../css/all.css"/>
    <link href="../../css/select2.min.css" rel="stylesheet" />
 
	<link rel="stylesheet" type="text/css" href="styling_listObat_depan.css?<?=filemtime('styling_listObat_depan.css');?>">
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
				<a class="item"  href="pasien_depan.php" style="display: flex;">	
					<i class="fas fa-users" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
					<p style="font-family: futuraBold; font-size: 25px; margin-left: 20px">Pasien</p>
				</a>
			</div>

			
			<div class="item_sidemenu">
				<a class="item" href="inventory_depan.php"  class="item_item_sidemenu" style="display: flex; height: 40px;width: 170px;">
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
		<div class="bungkus">
			<div class="header">
				<a href="inventory_depan.php"><button class="rounded back_button"><i class="fas fa-arrow-left"></i></button></a>
			
				<div class="rounded judul">
					<p class="text_header_style">List Inventory Obat</p>
				</div>
			</div>
		</div>

		<form action="list_obat_depan.php" method="post" class="bungkus_cari">
				<div class="rounded dasar_cari">
					<input type="text" name="cari" required id="cari" placeholder="Cari Nama Obat atau ID Obat " class="rounded cari">
				</div>

				<div class="rounded dasar_logoSearch">
					<button class=" rounded logo_cari" type="submit"><i class="fas fa-search"></i></button>
				</div>
			</form>

		<div class="dasar_table">

		<?php
			if(isset($_POST['cari'])){
				?>
				<form action="list_obat_depan.php" method="post">
					<button type="submit" class="btn btn-primary reset" >Reset</button>
				</form>

		<?php		
			}
		?>
			<table class="table table-hover">
				<thead class="tabel">
					<tr>
						<th scope="col">ID Obat</th>
						<th scope="col">Nama Obat</th>
						<th scope="col">Stock Obat</th>
						<th scope="col">Aksi</th>
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
						$no=1;

						$list_obat = mysqli_query($koneksi,"select * from obat where status=1");
						$jumlah_data=mysqli_num_rows($list_obat); 
						$total_halaman=ceil($jumlah_data/$batas);

						if(isset($_POST['cari'])){
							$cari = $_POST['cari']; 
							$list_tampilObat=mysqli_query($koneksi,"select obat.*, kelas_obat.* from obat inner join kelas_obat on obat.kelas_obat=kelas_obat.id_kelasObat where status=1 and nama_obat LIKE '%$cari%'");
						} else{
							$list_tampilObat = mysqli_query($koneksi,"select obat.*, kelas_obat.* from obat inner join kelas_obat on obat.kelas_obat=kelas_obat.id_kelasObat where status=1 limit $halaman_awal, $batas");
						}
						while ($list = mysqli_fetch_array($list_tampilObat)) {
					?>

					<tr>
						<th scope="row"><?php echo $no;?></th>
						<td style="width: 40vw;"><?php echo $list['nama_obat'];?></td>
						<td><?php echo $list['stock_obat'];?></td>
						<td style="width: 15vw;">
							<a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail<?php echo $list['nama_obat'];?>"><i class="far fa-eye"></i></a>

							<a href="#" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUpdate<?php echo $list['nama_obat'];?>"><i class="fas fa-edit"></i></a>

							<a href="../../controller/resepsionis/controller_hapus_listObat.php?id=<?php echo $list['nama_obat'];?>" type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></a>

						</td>
					</tr>

					<div class="modal fade" id="modalDetail<?php echo $list['nama_obat'];?>" role="dialog">
							<div class="modal-dialog modal-dialog-centered modal" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<div class="judul_modal">
											<p class="tulisan_judul_modal">Detail Obat</p>
										</div>

										<div class="isi_modal" style="margin-bottom: .5vw;">
											<div class="tabel_custom">
												<?php
												include '../../controller/resepsionis/koneksi.php';
												$id = $list['nama_obat'];
												$query_select_obat = mysqli_query($koneksi,"select obat.*, kelas_obat.* from obat inner join kelas_obat on obat.kelas_obat=kelas_obat.id_kelasObat where nama_obat ='$id'"); 
												$list = mysqli_fetch_array($query_select_obat);
												?>

												<div class="baris" style="margin-top: 1vw;">
													<div class="kolom">
														Nama obat 
													</div>

													<div class="kolom">
														<?php echo $list['nama_obat'];?>
													</div>
												</div>
												<center><div class="separator"></div></center>
												<div class="baris">
													<div class="kolom">
														Sediaan Obat  
													</div>

													<div class="kolom">
														<?php echo $list['sediaan_obaat'];?>
													</div>
												</div>
												<center><div class="separator"></div></center>
												<div class="baris">
													<div class="kolom">
														Kategori Obat 
													</div>

													<div class="kolom">
														<?php echo $list['kategori_obat'];?>
													</div>
												</div>
												<center><div class="separator"></div></center>
												<div class="baris">
													<div class="kolom">
														jenis Obat 
													</div>

													<div class="kolom">
														<?php echo $list['jenis_obat'];?>
													</div>
												</div>
												<center><div class="separator"></div></center>
												<div class="baris">
													<div class="kolom">
														Harga Beli Obat 
													</div>

													<div class="kolom">
														<?php echo $list['harga_beli'];?>
													</div>
												</div>
												<center><div class="separator"></div></center>
												<div class="baris">
													<div class="kolom">
														Harga jual Obat 
													</div>

													<div class="kolom">
														<?php echo $list['harga_jual'];?>
													</div>
												</div>
												<center><div class="separator"></div></center>
												<div class="baris">
													<div class="kolom">
														Stock Obat 
													</div>

													<div class="kolom">
														<?php echo $list['stock_obat'];?>
													</div>
												</div>
												<center><div class="separator"></div></center>
												<div class="baris" style="margin-bottom: 1vw;">
													<div class="kolom">
														Catatan 
													</div>

													<div class="kolom">
														<?php echo $list['catatan'];?>
													</div>
												</div>

												
											</div>
										</div>
									</div>
								</div>
							</div>	
					</div>

					<div class="modal fade" id="modalUpdate<?php echo $list['nama_obat'];?>" role="dialog">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<div class="judul_modal">
										<p class="tulisan_judul_modal">UPDATE OBAT</p>
									</div>
									
									<div class="isi_modal">
										<div class="bungkus_form">
											<form class="needs-validation" method="GET" action="../../controller/resepsionis/controller_update_listObat.php">
												<?php
													include '../../controller/resepsionis/koneksi.php';
													$id = $list['nama_obat'];
													$query_select_obat = mysqli_query($koneksi,"select obat.*, kelas_obat.* from obat inner join kelas_obat on obat.kelas_obat=kelas_obat.id_kelasObat where nama_obat ='$id'"); 
													$list = mysqli_fetch_array($query_select_obat);
												
												?>

												<div class="form-row">
													<div class="form-group col">
														<input type="hidden" name="id" id="id" value="<?php echo $list['nama_obat'];?>">
														<input type="hidden" name="id_kelasObat" id="id_kelasObat" value="<?php echo $list['id_kelasObat'];?>">		
														<label for="nama_obat">Nama Obat</label>
														<input type="text" class="form-control" name="nama_obat" id="nama_obat" value="<?php echo $list['nama_obat'];?>" required>
														<div class="invalid-feedback">
															test
														</div>
					
													</div>

													<div class="form-group col">
														<label for="sediaan_obat">Sediaan Obat</label>
														<input type="text" class="form-control" name="sediaan_obat" id="sediaan_obat" value="<?php echo $list['sediaan_obaat']?>" required>
														<div class="invalid-feedback">
															Validation message
														</div>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col">
														<label for="kategori_obat">Kategori Obat</label> <br>
														<select name="kategori_obat[]"  class="form-control" style="width:100% " id="kategori<?php echo $no?>" multiple="true" required>
															<?php
																include 'koneksi.php'; 
																$list_kategori_obat = mysqli_query($koneksi,"select * from kategori_obat");
																$lis = mysqli_fetch_array($list_kategori_obat); 
																$id = $list['nama_obat'];
																$ambil_jenis = mysqli_query($koneksi,"select obat.*, kelas_obat.* from obat inner join kelas_obat on obat.kelas_obat=kelas_obat.id_kelasObat where nama_obat='$id'"); 
																$data_jenis = mysqli_fetch_array($ambil_jenis);
																$jenis_bijian = explode(", ", $data_jenis['kategori_obat']);
																for ($i=0; $i < count($jenis_bijian) ; $i++) { 
															?>
															
															<option selected=""><?php echo $jenis_bijian[$i];?></option>
															
															<?php
																}
															?>
														
														<option disabled>------------------------------</option>
															<?php 
																while ($lis = mysqli_fetch_array($list_kategori_obat)) {
															?>
																<option value="<?php echo $lis['kategori_obat']?>" required> <?php echo $lis['kategori_obat'];?></option>
															<?php
															}
															?>
														</select>

														<script type="text/javascript">
																$(document).ready(function(){
																	$('#kategori<?php echo $no?>').select2()
																	.on('select2:open', () => {
        																$(".select2-results:not(:has(a))").append('<center> <a href="kelola_kategori_obat_2.php" style="text-decoration:none" class="btn_dropdown">Kelola kategori obat</a></center>');
																	})

																})

																$(document).ready(function() {
																	$('#kategori<?php echo $no?>').select2({
																		placeholder:"<?php echo $list['kategori_obat']?>",
																		 language: {
																             noResults: function() {

																            return "Kategori ini tidak ada "
																            }
																         },
																           escapeMarkup: function (markup) {
																            return markup;
																        }

																	});
																});
															</script>

													</div>
												</div>

	
												
													<div class="form-row">
														<div class="form-group col">
															<label for="jenis<?php echo $list['id_obat'];?>">Jenis Obat</label><br>
															<select name="jenis_obat[]" style="width: 100%;" type="text" id="jenis<?php echo $no?>" class="form-control" multiple="true" required>
															<?php
																include '../../controller/resepsionis/koneksi.php'; 
																$list_kategori_obat = mysqli_query($koneksi,"select * from jenis_obat");
																$lis = mysqli_fetch_array($list_kategori_obat); 
																$id = $list['nama_obat'];
																$ambil_jenis = mysqli_query($koneksi,"select obat.*, kelas_obat.* from obat inner join kelas_obat on obat.kelas_obat=kelas_obat.id_kelasObat where nama_obat='$id'"); 
																$data_jenis = mysqli_fetch_array($ambil_jenis);
																$jenis_bijian = explode(", ", $data_jenis['jenis_obat']);
																for ($i=0; $i < count($jenis_bijian) ; $i++) { 
															?>
															<option selected=""><?php echo $jenis_bijian[$i];?></option>
															<?php
																}
															?> 

															<option value="" disabled>------------------------------</option>
												
															<?php
																while ($lis= mysqli_fetch_array($list_kategori_obat)) {
															?>
															
															<option value="<?php echo $lis['jenis_obat']?>"> <?php echo $lis['jenis_obat'];?></option>

															
															<?php
															}
															?>
															</select>

														<script type="text/javascript">
																$(document).ready(function(){
																	$('#jenis<?php echo $no?>')
																	.select2()
																		.on('select2:open', () => {
																			$(".select2-results:not(:has(a))").append('<center><a href="kelola_jenis_obat_2.php" style="text-decoration:none" class="btn_dropdown" >Kelola jenis obat</a></center>');
																	})
																})

																$(document).ready(function() {
																	$('#jenis<?php echo $no?>').select2({
																		 language: {
																             noResults: function() {

																            return `Jenis obat ini tidak ada`;
																            }
																         },
																           escapeMarkup: function (markup) {
																            return markup;
																        }

																	});
																	
																});
															</script>
														</div>
													</div>

													<div class="form-row">
														<div class="form-group col">
															<label for="harga_beli">Harga Beli</label>
															<input type="number" name="harga_beli" id="harga_beli" value="<?php echo $list['harga_beli'];?>"  class="form-control" required>
														</div>

														<div class="form-group col">
															<label for="harga_jual">Harga Jual</label>
															<input type="number" name="harga_jual" id="harga_jual" value="<?php echo $list['harga_jual'];?>"  class="form-control" required>
														</div>
													</div>

													<div class="form-row">
														<div class="form-group col-2">
															<label for="stock_obat">Stock Obat</label>
															<input type="number" name="stock_obat" id="stock_obat" value="<?php echo $list['stock_obat'];?>"  class="form-control" required>
														</div>

														<div class="form-group col">
															<label for="catatan">Catatan</label>
															<input type="text" name="catatan" id="catatan" value="<?php echo $list['catatan'];?>"  class="form-control" required>
														</div>
													</div>	
																		
													<button type="submit" class="btn btn-primary">Simpan</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>						
					<?php 
						$no++;}
					 ?>
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

	<script>
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
</script>
						


</body>
</html>