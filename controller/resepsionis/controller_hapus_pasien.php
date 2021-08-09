<?php
	include'koneksi.php'; 

	$id = $_GET['id']; 


	mysqli_query($koneksi,"update pasien set mode=0 where id_pasien='$id'"); 

	header("location:../../view/resepsionis/list_pasien_depan.php");

?>