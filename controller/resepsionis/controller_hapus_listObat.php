<?php 
    include 'koneksi.php';

	$id = $_GET['id']; 


	mysqli_query($koneksi,"update obat set status=0 where nama_obat='$id'"); 

	header("location:../../view/resepsionis/list_obat_depan.php");

?>