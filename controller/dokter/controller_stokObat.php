<?php 
    include 'koneksi.php'; 
    $id=$_POST['id_obat']; 
    $stockAmbil=mysqli_query($koneksi, "select stock_obat from obat where status=1 and nama_obat='$id'");
    $stock=mysqli_fetch_assoc($stockAmbil);
    $nilaiMasuk=$_POST['jumlahObat'];

    if(isset($_POST['tambahObat'])){
        $total=$stock['stock_obat']+$nilaiMasuk;
    }

    else if(isset($_POST['kurangObat'])){
        $total=$stock['stock_obat']-$nilaiMasuk;
    }

    mysqli_query($koneksi, "UPDATE obat SET stock_obat='$total' WHERE nama_obat='$id' and status=1");
    header("location:../../view/dokter/inventory_obat_dokter.php");
?>