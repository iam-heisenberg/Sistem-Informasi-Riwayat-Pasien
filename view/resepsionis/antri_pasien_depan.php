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

	<link rel="stylesheet" type="text/css" href="styling_antriPasien_depan.css?<?=filemtime('styling_antriPasien_depan.css');?>">
    <title>Antri Pasien</title>
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
			<a class="item" href="inventory_depan.php"  class="item_item_sidemenu" style="display: flex;">
				<i class="fas fa-prescription-bottle-alt " style="font-size: 26px;margin-left: 15px;margin-top: 5px"></i>
				<p  style="font-family: futuraBold; font-size: 25px; margin-left: 15px">Inventory</p>
			</a>
		</div>

		<div class="item_sidemenu">
			<a class="item" href="#"  class="item_item_sidemenu " style="display: flex; height: 40px;width: 170px;">
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

	<div class="isi">
		<p class="daftar">Daftar</p> <break>
		<p class="antrian">Antrian</p>

		<div class="antrianPasien">
			<button type="button" class="btn btn-primary btn-lg btn_warna" data-toggle="modal" data-target="#modelId">Daftar Pasien </button>

			<div class="enkapsulasi">
				<table class="table table-hover tabel_antri">
					<thead class="thead headerTabel">
						<tr>
							<th>No</th>
							<th>Nama Pasien</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include '../../controller/resepsionis/koneksi.php';
							$no=1;
							$list_antrian=mysqli_query($koneksi,'select pasien.nama_pasien, antrian.id_antrian, antrian.id_pasien, antrian.jam_datang from antrian inner join pasien on antrian.id_pasien = pasien.id_pasien where modes=1 ORDER BY antrian.jam_datang desc');
							if(mysqli_num_rows($list_antrian)>0){
								while($list=mysqli_fetch_array($list_antrian)){?>
								<tr>
									<td scope="row" style="width:7%"><?php echo $no++?></td>
									<td style="width:60%">
										<?php echo $list['nama_pasien'];
										?>
									</td>
									<td>
										<form action="../../controller/resepsionis/controller_antri_pasien.php?id=<?php echo $list['id_antrian']; ?>" method="post">
											<input type="hidden" name="idPasien" value="<?php echo $list['id_pasien'];?>">
											<button type="submit" class="btn btn-primary" name="masuk">Masuk</button>		
											<button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
										</form>
										
									</td>
								</tr>
						<?php
							} } else { ?>
								<tr>
									<td style="width:7%"></td>
									<td style="width:60%">Tidak ada antrian yang terdaftar</td>
									<td></td>
								</tr>
							<?php } ?>
							
					</tbody>
				</table>
			</div>
				
		</div>

	</div>

	<!-- Modal -->
	<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="dasar">
						<p class="tulisanJudul">Daftar Pasien</p>
					</div>

					<div class="konten">
						<form action="../../controller/resepsionis/controller_antri_pasien.php" method="post">
							<div class="form-group texs">
							  <select class="form-control antrian_pasien" name="antrian_pasien" id="antrian_pasien">
								<?php
									include '../../controller/resepsionis/koneksi.php'; 
									$list_pasien = mysqli_query($koneksi,"select * from pasien where mode=1 and antri_mode=0 or antri_mode=2 "); 
									while ($list = mysqli_fetch_array($list_pasien)) {
								?>
									<option value="" disabled selected ></option>
									<option value="<?php echo $list['id_pasien'] ?>"> <?php echo $list['nama_pasien'];?></option>

								<?php } ?>
							  </select>

							  <script type="text/javascript">
								$(document).ready(function() {
									$('.antrian_pasien').select2({
										allowClear: true,
											placeholder: 'Masukan nama pasien',    
												language: {
													noResults: function() {
													return `<a href="registrasi_pasien_depan.php" class="btn btn-primary noResult">Data pasien tidak ada, klik tombol ini untuk mendaftar pasien baru!</a>`;
													}
												},
											
												escapeMarkup: function (markup) {
													return markup;
												}
									});
								});
								</script>
							</div>
							<button type="submit" class="btn btn-primary tombolSubmit" name="submit"><i class="fa fa-arrow-right" aria-hidden="true" style="color:white"></i></button>
							
						</form>
					</div>
				</div>
		</div>
	</div>

    
    
</body>
</html>