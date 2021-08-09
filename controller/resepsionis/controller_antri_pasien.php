<?php
    include 'koneksi.php'; 
    if(isset($_POST['submit'])){
        $idPasien=$_POST['antrian_pasien'];
        $antri= date("hsi");
        mysqli_query($koneksi,"update pasien set antri_mode=1 where id_pasien=$idPasien"); 
        mysqli_query($koneksi,"insert into antrian values ('',$idPasien,1,$antri)");
        header("location:../../view/resepsionis/antri_pasien_depan.php");
    }

    if(isset($_POST['masuk'])){
        $id=$_GET['id'];
        
        $idPasien=$_POST['idPasien'];
        mysqli_query($koneksi,"update pasien set antri_mode=2 where id_pasien='$idPasien'"); 
        mysqli_query($koneksi,"update antrian set modes=2 where id_antrian='$id'"); 
        header("location:../../view/resepsionis/antri_pasien_depan.php");
    } 
    
    if(isset($_POST['hapus'])){
        $id=$_GET['id'];
        $idPasien=$_POST['idPasien'];
        mysqli_query($koneksi,"update pasien set antri_mode=0 where id_pasien='$idPasien'"); 
        mysqli_query($koneksi,"update antrian set modes=0 where id_antrian='$id'"); 
        header("location:../../view/resepsionis/antri_pasien_depan.php");
    }

?>