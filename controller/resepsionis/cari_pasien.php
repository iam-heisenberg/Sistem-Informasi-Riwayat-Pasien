<?php 
    include 'koneksi.php';
    $cari = $_POST['cari']; 
    $hasil_cari=mysqli_query($koneksi,"SELECT * FROM pasien WHERE nama_pasien LIKE '%$cari%'");
    
?>