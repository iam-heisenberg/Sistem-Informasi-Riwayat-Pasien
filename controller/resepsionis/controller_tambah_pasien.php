<?php
	include 'koneksi.php';

	$nama = $_POST['nama'];
	$tgl_lahir = $_POST['tgl_lahir']; 
	$gender = $_POST['kelamin']; 
	$alamat = $_POST['alamat']; 
	$ktp = $_POST['ktp_pasien'];


	mysqli_query($koneksi,"insert into pasien values('$nama','$ktp','$gender','$tgl_lahir','$alamat','',1,0)");

	header("location:../../view/resepsionis/registrasi_pasien_depan.php");

?>