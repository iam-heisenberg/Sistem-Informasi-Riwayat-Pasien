<?php 
	include 'koneksi.php';

	$nama = $_POST['nama_obat']; 
	$kategori= $_POST['kategori_obat']; 
	$jenis = $_POST['jenis_obat']; 
	$beli = $_POST['harga_beli'];
	$jual = $_POST['harga_jual']; 
	$stock = $_POST['stock_obat']; 
	
	if(empty($_POST['catatan'])){
		$catatan = "-";
	} else {
		$catatan = $_POST['catatan']; 
	}

	if(empty($_POST['sediaan_obat'])){
		$sediaan = "-";
	} else {
		$sediaan = $_POST['sediaan_obat']; 
	}

	$waktu = date('dHi');
	$id_kelasObat=$stock.$waktu;
	$kategori_convert= implode(", ", $kategori);
	$jenis_convert = implode(", ", $jenis);

	mysqli_query($koneksi, "insert into kelas_obat values('$id_kelasObat', '$kategori_convert', '$jenis_convert')");
	mysqli_query($koneksi, "insert into obat values('$nama','$sediaan','$beli','$jual','$stock','$catatan','1','$id_kelasObat','0')");
	header("location:../../view/resepsionis/registrasi_obat_depan.php");
?>