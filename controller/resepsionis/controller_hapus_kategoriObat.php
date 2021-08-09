<?php
	include'koneksi.php'; 

	$id = $_GET['id']; 

	echo $id;

	mysqli_query($koneksi,"delete from kategori_obat where kategori_obat='$id'"); 

	header("location:../../view/resepsionis/kelola_kategori_obat.php");

?>