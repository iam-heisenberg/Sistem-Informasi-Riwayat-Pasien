<?php
    include 'koneksi.php'; 
    $idKelas=$_GET['id_kelasObat'];
    $id = $_GET['id'];
    $nama = $_GET['nama_obat']; 
    $sediaan = $_GET['sediaan_obat']; 
    $kategori =$_GET['kategori_obat']; 
    $kategori_convert = implode(", ", $kategori); 
    $jenis = $_GET['jenis_obat']; 
    $jenis_convert = implode(", ", $jenis); 
    $harga_beli = $_GET['harga_beli']; 
    $harga_jual = $_GET['harga_jual']; 
    $stock = $_GET['stock_obat'];
    $catatan = $_GET['catatan'];


    mysqli_query($koneksi, "update kelas_obat set kategori_obat ='$kategori_convert', jenis_obat='$jenis_convert' where id_kelasObat='$idKelas' ");
    $query = "UPDATE obat SET nama_obat='$nama',sediaan_obaat='$sediaan',harga_beli='$harga_beli',harga_jual='$harga_jual',stock_obat='$stock',catatan='$catatan' WHERE nama_obat='$id'";
    if (mysqli_query($koneksi,$query)) {
        # credirect ke page index
        header("location:../../view/resepsionis/list_obat_depan.php"); 
       }
       else{
        echo "ERROR, data gagal diupdate". mysql_error();
       }
    // echo $query;
?>