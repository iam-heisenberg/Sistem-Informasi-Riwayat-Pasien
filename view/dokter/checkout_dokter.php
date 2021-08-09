<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: ../../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script src="../../js/select2.min.js"></script>
    <script src="../../js/select2.full.js"></script>
    <script defer src="../../js/all.js"></script>
    <link rel="stylesheet" href="../../css/all.css"/>
    <link href="../../css/select2.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="styling_checkout_dokter.css?<?=filemtime('styling_checkout_dokter.css');?>">
    <title>Checkout</title>
</head>
<body>
    <div class="aesthethicKotak"></div>
    <div class="kosong"></div>
    
    <div class="enkapsulasi">
        <div class="isiKonten">
            <div class="headerBackground">
                <p class="judulHeader">Checkout Pasien</p>
                    <?php 
                        include "../../controller/dokter/koneksi.php";
                        $id=$_GET['id'];
                        $Nama=mysqli_query($koneksi,"SELECT nama_pasien from pasien WHERE id_pasien=$id AND mode=1"); 
                        $tampilNama=mysqli_fetch_assoc($Nama); 
                    ?>
                    <p class="namaPasien"> <?php echo $tampilNama['nama_pasien'] ?></p>
            </div>

            <div class="cari">
                <input type="text" name="searchBar" id="searchBar" onkeyup="search_obat()" placeholder="Cari obat" class="searchBar">
                <p><i class="fa fa-search cari_logo" aria-hidden="true"></i></p>
            </div>


            <form action="kasir_dokter.php" method="post">
                <button type="submit" class="button_kirim">Lanjut</button>
                <table>
                    <?php 
                        include "../../controller/dokter/koneksi.php";
                        $obat=mysqli_query($koneksi,"SELECT * from obat WHERE status=1 AND stock_obat>0 ");
                        $obatTidakAda=mysqli_query($koneksi,"SELECT * from obat WHERE status=2 AND stock_obat=0");
                        $obatTidakAdaTampil=mysqli_fetch_array($obatTidakAda);
                        $id=$_GET['id'];
                        $tanggalID=date('dHi');
                        $tanggalMasuk= date("d-m-Y");
                        $jamID=date('his');
                        $id_obatDikasih=$id.$tanggalID; 
                        $berat_badan=$_POST['berat_badan']; 
                        $umur=$_POST['umur_pasien']; 
                        $subjek=$_POST['subjek']; 
                        $objek=$_POST['objek']; 
                        $asesestment=$_POST['assestment']; 
                        $planing=$_POST['planing']; 
                        if(empty($_POST['rujukan'])){
                            $rujukan="-";
                        } else{
                            $rujukan=$_POST['rujukan'];
                        }
                        
                        if((mysqli_num_rows($obat)>0) or (mysqli_num_rows($obatTidakAda)>0)){
                            while ($tampilObat=mysqli_fetch_array($obat)){
                                ?>
                                    <td>
                                        <input id="<?php echo $tampilObat['nama_obat'] ?>" type="checkbox" name="obatDikasih[]" value="<?php echo $tampilObat['nama_obat'] ?>"/>
                                        <label for="<?php echo $tampilObat['nama_obat'] ?>" class="listObat"> <?php echo $tampilObat['nama_obat'];?></label>
                                    </td>
            
                                <?php 
                            }?>
                            <td>
                                        <input id="<?php echo $obatTidakAdaTampil['nama_obat'] ?>" type="checkbox" name="obatDikasih[]" value="<?php echo $obatTidakAdaTampil['nama_obat'] ?>"/>
                                        <label for="<?php echo $obatTidakAdaTampil['nama_obat'] ?>" class="listObat"> <?php echo $obatTidakAdaTampil['nama_obat'];?></label>
                            </td> 
                        <?php } 
                        else { ?>
                            <td>
                                <p>Oopsie, tidak ada obat disini</p>
                            </td>
                        <?php }?>
                        
        
                </table>
                <input type="hidden" name="id_pasien" id="id_pasien" value="<?php echo $id?>">
                <input type="hidden" name="tanggal_masuk" id="tanggal_masuk" value="<?php echo $tanggalMasuk?>">
                <input type="hidden" name="berat_badan" id="berat_badan" value="<?php echo $berat_badan?>">
                <input type="hidden" name="umur_pasien" id="umur_pasien" value="<?php echo $umur?>">
                <input type="hidden" name="subjek" id="subjek" value="<?php echo $subjek?>">
                <input type="hidden" name="objek" id="objek" value="<?php echo $objek?>">
                <input type="hidden" name="assestment" id="assestment" value="<?php echo $asesestment?>">
                <input type="hidden" name="planing" id="planing" value="<?php echo $planing?>">
                <input type="hidden" name="rujukan" id="rujukan" value="<?php echo $rujukan?>">
                <input type="hidden" name="id_obatDikasih" id="id_obatDikasih" value="<?php echo $id_obatDikasih?>">
            </form>

            <div class="penyangga"></div>
        </div>
    </div>
    <div class="kosong1"></div>

    <script>
                function search_obat() {
                    let input = document.getElementById('searchBar').value
                    input=input.toLowerCase();
                    let x = document.getElementsByClassName('listObat');
                    
                    for (i = 0; i < x.length; i++) { 
                        if (!x[i].innerHTML.toLowerCase().includes(input)) {
                            x[i].style.display="none";
                        }
                        else {
                            x[i].style.display="list-item";                 
                        }
                    }
                }
            </script>
</body>
</html>