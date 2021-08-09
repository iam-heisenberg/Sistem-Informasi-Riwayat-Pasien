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
	
    <link rel="stylesheet" type="text/css" href="styling_registrasi_obat_depan.css?<?=filemtime('styling_registrasi_obat_depan.css');?>">


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

	<div class="isi_Form">
		<div class="aestheticc_kotak"></div>

		<div class="bungkus">
			<div class="header">
				<a href="inventory_depan.php"><button class="rounded back_button"><i class="fas fa-arrow-left"></i></button></a>
			
				<div class="rounded judul">
					<p class="text_header_style">Registrasi Inventory Obat</p>
				</div>

				
			</div>

		<form class="needs-validation form_gaya" require method="POST" action="../../controller/resepsionis/controller_tambah_inventoryObat.php">
			
			<div class="form-row">
				<div class="form-group col">
					<label for="nama_obat">Nama Obat : </label>
					<input type="text" name="nama_obat" id="nama_obat" placeholder="Masukan Nama Obat" class="form-control" required="">
					<div class="invalid-feedback">
				        Tolong masukan nama obat
				     </div>
				</div>
				<div class="form-group col">
					<label for="Sediaan Obat">Sediaan Obat : </label>
					<input type="text" name="sediaan_obat" id="sediaan_obat" placeholder="Masukan Sediaan Obat" class="form-control">
					<div class="invalid-feedback">
				        Tolong masukan sediaan obat
				     </div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="kategori_obat">Kategori Obat</label>
					<select name="kategori_obat[]" id="kategori_obat" class="form-control" multiple="true" required="">
						
						<?php
							include '../../controller/resepsionis/koneksi.php'; 
							$list_kategori_obat = mysqli_query($koneksi,"select * from kategori_obat"); 
							while ($list = mysqli_fetch_array($list_kategori_obat)) {
						?>
						<option value="<?php echo $list['kategori_obat'] ?>"> <?php echo $list['kategori_obat'];?></option>
						
						<?php
							}
						?>
					</select>
					

				</div>


				<script type="text/javascript">
					$(document).ready(function(){
						$('#kategori_obat').select2()
							.on('select2:open', () => {
        						$(".select2-results:not(:has(a))").append('<center> <a href="kelola_kategori_obat.php" style="text-decoration:none" class="btn_dropdown">Kelola kategori obat</a></center>');
						})
					})
					
					$(document).ready(function() {
						$('#kategori_obat').select2({
						
							language: {
				             noResults: function() {
						            return `Kategori obat ini tidak ada`;
				            }
				         },
				           escapeMarkup: function (markup) {
				            return markup;
				        }
					});
																	
					});
				</script>


				<div class="form-group col">
					<label for="jenis_obat">Jenis Obat</label>
					<select id="jenis_obat" name="jenis_obat[]" class="form-control"  multiple="true" required="">	

						<?php
							include '../../controller/resepsionis/koneksi.php'; 
							$list_jenis_obat = mysqli_query($koneksi,"select * from jenis_obat"); 
							while ($list = mysqli_fetch_array($list_jenis_obat)) {
						?>

						<option value="<?php echo $list['jenis_obat'] ?>"> <?php echo $list['jenis_obat'];?></option> 
						<?php 
							}
						?>
					</select>

					<div class="invalid-feedback">
				        Tolong masukan kategori obat
				     </div>
				</div>
			</div>

			<script type="text/javascript">
					$(document).ready(function(){
						$('#jenis_obat').select2()
							.on('select2:open', () => {
        						$(".select2-results:not(:has(a))").append('<center> <a href="kelola_jenis_obat.php" style="text-decoration:none" class="btn_dropdown">Kelola jenis obat</a></center>');
						})
					})

					$(document).ready(function() {
						$('#jenis_obat').select2({
						
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


			<div class="form-row">
				<div class="form-group col">
					<label for="harga_beli">Harga Beli</label>
					<input type="number" required name="harga_beli" id="harga_beli" placeholder="Masukan Harga Beli Obat" class="form-control">
				</div>
				<div class="form-group col">
					<label for="harga_jual">Harga Jual</label>
					<input type="number" required name="harga_jual" id="harga_jual" placeholder="Masukan Harga Beli Obat" class="form-control">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-3">
					<label for="stock_obat">Stock Obat</label>
					<input type="number" required name="stock_obat" id="stock_obat" placeholder="Masukan Stock Obat" class="form-control">
				</div>

				<div class="form-group col">
					<label for="catatan">Catatan (Jika Ada)</label>
					<input type="text" name="catatan" id="catatan" placeholder="Masukan Catatan Untuk Obat" class="form-control">
				</div>
			</div>

			<button type="submit" class="btn" style="background-color:  #3D8C95"><i class="fas fa-save" style="color: white;"></i></button>
		</form>
			
		</div>


		<div class="modal fade" id="modalObat" role="dialog" >
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body">
						
						<div class="header_modal">
							<p class="tulisan_header">TAMBAH KATEGORI OBAT</p> 
						</div>

						<form class="form_tambah needs-validation" novalidate="" action="../../controller/resepsionis/controller_tambah_kategoriObat.php" method="POST">
							<div class="form-group">
								<label for="kategori_obat">Kategori Obat</label>
								<input type="text" class="form-control" name="kategori_obat" id="kate" placeholder="Masukan kategori obat baru" required="" >
								<div class="invalid-feedback">
									<h1 style="font-size: 15px;"> Tolong masukan kategori obat yang baru </h1>	
								</div>	
							</div>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</form>

						
					</div>
				</div>		
			</div>		
		</div>


		<div class="modal fade" id="modalJenisObat" role="dialog" >
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">

					<div class="modal-body">
						<div class="header_modal">
							<p class="tulisan_header">TAMBAH JENIS OBAT</p> 
						</div>

						<form class="form_tambah needs-validation" novalidate=""  action="../../controller/resepsionis/controller_tambah_jenisObat.php" method="POST">
							<div class="form-group adds_on">
								<label for="jenis_obat">Jenis obat</label>
								<input type="text" class="form-control" name="jenis_obat" id="jenis_obat" placeholder="Masukan jenis obat baru" required="">
								<div class="invalid-feedback">
									<h1 style="font-size: 15px;">Tolong Masukan jenis obat yang baru</h1>
								</div>	
							</div>

							<button class="btn btn-primary">Simpan</button>
						</form>

						
					</div>
				</div>		
			</div>		
		</div>
	</div>


	<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
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