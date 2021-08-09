<?php
    include 'koneksi.php'; 
	$id = $_POST['id']; 
    $jenis_baru = $_POST['jenis_obat'];
    $query = "UPDATE jenis_obat SET jenis_obat='$jenis_baru' WHERE jenis_obat='$id'";

    if (mysqli_query($koneksi,$query)) {
        # credirect ke page index
        header("location:../../view/resepsionis/kelola_jenis_obat_2.php"); 
       }
       else{
        echo "ERROR, data gagal diupdate".mysql_error();
       }
?>