<?php
    include 'koneksi.php'; 
	$id = $_POST['id']; 
    $kategori_baru = $_POST['kategori_obat'];
    $query = "UPDATE kategori_obat SET kategori_obat='$kategori_baru' WHERE kategori_obat='$id'";

    if (mysqli_query($koneksi,$query)) {
        # credirect ke page index
        header("location:../../view/resepsionis/kelola_kategori_obat.php"); 
       }
       else{
        echo "ERROR, data gagal diupdate". mysql_error();
       }


?>