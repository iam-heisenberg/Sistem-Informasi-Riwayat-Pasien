<?php
	include 'koneksi.php';

	$kategori = $_POST['kategori_obat'];
	echo $kategori;
	
	mysqli_query($koneksi,"insert into kategori_obat values('$kategori')");
	header("location:../../view/resepsionis/kelola_kategori_obat.php")
	?>