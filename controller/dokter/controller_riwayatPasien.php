<?php 
    include 'koneksi.php'; 
    
    if(isset($_POST['tambah_riwayat'])){    
        $id_pasien=$_POST['nama_pasien']; 
        $tanggalID=date('dHi');
        $tanggal=$_POST['tanggal_masuk']; 
        $berat_badan=$_POST['berat_badan']; 
        $umur=$_POST['umur_pasien']; 
        $subjek=$_POST['subjek']; 
        $objek=$_POST['objek']; 
        $asesestment=$_POST['assestment']; 
        $planing=$_POST['planing']; 
        $dikasih=$_POST['dikasih'];
        $idObat=$_POST['id_obat'];
        
        
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


        if(isset($_POST['id_obatDikasih_C'])){
            $id_obatDikasih=$_POST['id_obatDikasih_C'];

        }else{
            $id_obatDikasih=$id_pasien.$tanggalID; 
        }

        if(isset($_POST['convertObatC'])){
            $convert_obat=$_POST['convertObatC'];
        }else{
            $obat=$_POST['obat_dikasih']; 
            $convert_obat=implode(", ", $obat);
        }

        $hitungArray=count($_POST['dikasih']);

        for($i=0;$i<$hitungArray;$i++){
            $stock=mysqli_query($koneksi,"SELECT *, stock_obat-$dikasih[$i] AS total From obat WHERE nama_obat='$idObat[$i]'");
            $hasilStock=mysqli_fetch_array($stock);
            $convertStock=$hasilStock['total'];
            mysqli_query($koneksi,"update obat set stock_obat=$convertStock where nama_obat='$idObat[$i]'"); 
            echo $hasilStock['total'];
            echo "stop";
        }

        mysqli_query($koneksi,"insert into obat_untuk_pasien values('$id_obatDikasih','$convert_obat')");
        mysqli_query($koneksi, "insert into riwayat_pasien values('', '$id_pasien', '$tanggal', '$berat_badan', '$umur', '$subjek', '$objek', '$asesestment','$planing', '$id_obatDikasih', 1,'$rujukan')");
        
        if(isset($_POST['pisahIF'])){
            
            mysqli_query($koneksi,"update pasien set antri_mode=0 where id_pasien='$id_pasien'"); 
            mysqli_query($koneksi,"update antrian set modes=0 where id_pasien='$id_pasien'");
        

            header("location:../../view/dokter/antrian_pasien_dokter.php"); 
        }else{
            header("location:../../view/dokter/tambah_riwayatPasien_dokter.php");
        } 
    }

    else if(isset($_POST['hapus_riwayat_bijian'])){
        $id=$_GET['id'];
        $id_balik=$_POST['id_pasien'];
        echo "update riwayat_pasien set mode=0 where id_rekamMedis='$id'";
        mysqli_query($koneksi,"update riwayat_pasien set mode=0 where id_rekamMedis='$id'"); 
        header("location:../../view/dokter/detail_riwayatPasien_dokter.php?id=$id_balik");
        
    }

    else if(isset($_GET['id_delet'])){
        $id=$_GET['id_delet'];
        mysqli_query($koneksi,"update pasien set mode=0 where id_pasien='$id'"); 
        header("location:../../view/dokter/list_riwayatPasien_dokter.php");
        
    }

    else if (isset($_POST['update'])){
        $id_obatDikasih=$_POST['id_obatDikasih']; 
        $id_rekamMedis=$_POST['id_rekamMedis'];
        $id_pasien=$_POST['id_pasien'];
        
        $rujukan = $_POST['rujukan'];
        $berat_badan=$_POST['berat_badan']; 
        $umur=$_POST['umur_pasien']; 
        $subjek=$_POST['subjek']; 
        $objek=$_POST['objek']; 
        $asesestment=$_POST['assestment']; 
        $planing=$_POST['planing']; 
        $obat=$_POST['obatDikasih']; 
        $convert_obat=implode(", ", $obat);



        mysqli_query($koneksi, "UPDATE obat_untuk_pasien SET kumpulan_obat='$convert_obat' WHERE id_obatDikasih=$id_obatDikasih"); 
        mysqli_query($koneksi, "UPDATE riwayat_pasien SET berat_badan='$berat_badan', umur='$umur', subject='$subjek', object='$objek', assestment='$asesestment', planing='$planing', rujukan='$rujukan' WHERE id_rekamMedis='$id_rekamMedis' ");
        header("location:../../view/dokter/detail_riwayatPasien_dokter.php?id=$id_pasien");
    }

?>