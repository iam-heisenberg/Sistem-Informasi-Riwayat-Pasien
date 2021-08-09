<?php
	include 'koneksi.php'; 
	$id = $_GET['id']; 
	$nama = $_GET['nama'];
	$tgl_lahir = $_GET['tgl_lahir']; 
	$gender = $_GET['kelamin']; 
	$alamat = $_GET['alamat']; 
	$ktp = $_GET['ktp_pasien'];


	//query update
	$query = "UPDATE pasien SET nama_pasien='$nama' , tgl_lahir_pasien='$tgl_lahir' , kelamin_pasien='$gender' , alamat_pasien='$alamat' , ktp_pasien='$ktp' WHERE id_pasien='$id' ";

	if (mysqli_query($koneksi,$query)) {
	 # credirect ke page index
	 header("location:../../view/resepsionis/list_pasien_depan.php"); 
	}
	else{
	 echo "ERROR, data gagal diupdate". mysql_error();
	}

?>