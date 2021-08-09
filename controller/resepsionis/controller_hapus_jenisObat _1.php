<?php
	include'koneksi.php'; 

	$id = $_GET['id']; 

	echo $id;

	mysqli_query($koneksi,"delete from jenis_obat where jenis_obat='$id'"); 

	header("location:../../view/resepsionis/kelola_jenis_obat_2.php");

?>