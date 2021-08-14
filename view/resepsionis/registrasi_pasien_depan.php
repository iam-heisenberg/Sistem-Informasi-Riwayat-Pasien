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
 
    <link rel="stylesheet" type="text/css" href="styling_registrasi_pasien_depan.css?<?=filemtime('styling_registrasi_pasien_depan.css');?>">
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

	<div class="isi_Form">
		<div class="aestheticc_kotak"></div>


		<div class="bungkus">
			<div class="header">
				<a href="pasien_depan.php"><button class="rounded back_button"><i class="fas fa-arrow-left"></i></button></a>
			
				<div class="rounded judul">
					<p class="text_header_style">Registrasi Daftar Pasien</p>	
				</div>
			</div>

		<form class="needs-validation form_gaya" require method="POST" action="../../controller/resepsionis/controller_tambah_pasien.php">
			<div class="form-row">
				<div class="form-group col">
					<label for="nama">Nama : </label>
					<input type="text" name="nama" id="nama" placeholder="Masukan Nama Pasien" class="form-control" required>
					 <div class="invalid-feedback">
				        Tolong masukan nama pasien
				     </div>
				</div>
				<div class="form-group col">
					<label for="tgl_lahir">Tanggal Lahir (dd-mm-yyyy) : </label>
					<input type="text" name="tgl_lahir" id="tgl_lahir" placeholder="Masukan Tanggal lahir Pasien (dd-mm-yyyy)" class="form-control datepicker datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker"required>
					<div class="invalid-feedback">
				     </div>

				</div>

				<script>
                    $(document).ready(function(){
                        setDatePicker()
                        setDateRangePicker(".startdate", ".enddate")
                        setMonthPicker()
                        setYearPicker()
                        setYearRangePicker(".startyear", ".endyear")
                    })
                </script>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="kelamin">Kelamin :</label>
					<select id="kelamin" class="form-control" name="kelamin" required="">
						<option selected disabled value="">Pilih Jenis Kelamin</option>
						<option value="Laki - Laki">Laki - Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
					<div class="invalid-feedback">
				        Tolong masukan kelamin pasien
				     </div>
				</div>
				<div class="form-group col">
					<label for="alamat">Alamat :</label>
					<input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat Pasien" class="form-control" required="">
					<div class="invalid-feedback" >
				        Tolong masukan alamat pasien
				     </div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="ktp">KTP :</label>
					<input type="text" name="ktp_pasien" id="ktp_pasien" placeholder="Masukan Nomor KTP pasien" class="form-control" required="">
					<div class="invalid-feedback">
				        Tolong masukan KTP pasien
				     </div>
				</div>
				
			</div>

			<button type="submit" class="btn" style="background-color: #FF642E"><i class="fas fa-save" style="color: white;"></i></button>
		</form>
		</div>
		

		<script type="text/javascript">
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

	</div>
</body>
</html>