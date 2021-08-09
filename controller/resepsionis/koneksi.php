<?php
	$koneksi = mysqli_connect("localhost","root","","db_riwayat_pasien"); 
	if (mysqli_connect_errno()) {
		# code...
		echo "Koneksi database eror : ". mysqli_connect_error();
	}
?>