<?php
	include 'koneksi.php';

	$jenis = $_POST['jenis_obat'];

	
	mysqli_query($koneksi,"insert into jenis_obat values('$jenis')");
	header("location:../../view/resepsionis/kelola_jenis_obat_2.php");
	?>