<?php 
    include 'koneksi.php'; 

    if(isset($_POST['tambah_riwayat'])){    
        $id_pasien=$_POST['nama_pasien']; 
        $tanggalID=date('dHi');
        $id_obatDikasih=$id_pasien.$tanggalID; 
        $tanggal=$_POST['tanggal_masuk'];   
        $dikasih=$_POST['obat_dikasih'];
        
        if(empty($_POST['rujukan'])){
            $rujukan="-";
        } else{
            $rujukan=$_POST['rujukan'];
        }

        if(empty($_POST['berat_badan'])){
            $berat_badan="-";
        } else{
            $berat_badan=$_POST['rujukan'];
        }

        if(empty($_POST['umur_pasien'])){
            $umur="-";
        } else{
            $umur=$_POST['umur_pasien'];
        }

        if(empty($_POST['subjek'])){
            $subjek="-";
        } else{
            $subjek=$_POST['subjek'];
        }

        if(empty($_POST['objek'])){
            $objek="-";
        } else{
            $objek=$_POST['objek'];
        }

        if(empty($_POST['assestment'])){
            $asesestment="-";
        } else{
            $asesestment=$_POST['assestment'];
        }

        if(empty($_POST['planing'])){
            $planing="-";
        } else{
            $planing=$_POST['planing'];
        }

        $hitungArray=count($_POST['obat_dikasih']);
        for($i=0;$i<$hitungArray;$i++){
            $obat=$_POST['obat_dikasih']; 
            $convert_obat=implode(", ", $obat);
        }

        mysqli_query($koneksi,"insert into obat_untuk_pasien values('$id_obatDikasih','$convert_obat')");
        mysqli_query($koneksi, "insert into riwayat_pasien values('', '$id_pasien', '$tanggal', '$berat_badan', '$umur', '$subjek', '$objek', '$asesestment','$planing', '$id_obatDikasih', 1,'$rujukan')");
        header("location:../../view/dokter/tambah_riwayatPasien_dokter.php");
    }

?>