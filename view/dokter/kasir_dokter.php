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
    <script src="../../js/jautocalc.js"></script>
	<script type="text/javascript">
		
		$(function() {

			function autoCalcSetup() {
				$('form#cart').jAutoCalc('destroy');
				$('form#cart tr.line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
				$('form#cart').jAutoCalc({decimalPlaces: 2});
			}
			autoCalcSetup();

		});
	</script>
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
                            $id=$_POST['id_pasien'];
                            $Nama=mysqli_query($koneksi,"SELECT nama_pasien from pasien WHERE id_pasien=$id AND mode=1"); 
                            $tampilNama=mysqli_fetch_assoc($Nama); 
                        ?>
                    <p class="namaPasien"> <?php echo $tampilNama['nama_pasien'] ?></p>
            </div>

            <div class="backgroundResep">
                <p class="namaPasien" style="margin-top:3vh; padding-top:2vh">Daftar obat pasien</p>

                <form id="cart" class="tabelEnding" action="../../controller/dokter/controller_riwayatPasien.php" method="post">
                    <table name="cart" class="tabelEnding">
                    <tr>
                        <td  style="width:53.5%">Nama Obat</td>
                        <td style="width:13%">Harga Obat</td>
                        <td style="width:10%">Jumlah Obat</td>
                        <td style="width:10%">Jumlah dikurangi?</td>
                    </tr>
                       
                    <?php
                        include "../../controller/dokter/koneksi.php";
                        $tanggalID=date('dHi');
                        $tanggalMasuk= date("d-m-Y");
                        $jamMasuk= date("his");
                        $id_obatDikasih=$id.$jamMasuk; 
                        $obatDikasih=$_POST['obatDikasih']; 
                        $tanggalMasuk=$_POST['tanggal_masuk'];
                        $berat_badan=$_POST['berat_badan']; 
                        $umur=$_POST['umur_pasien']; 
                        $subjek=$_POST['subjek']; 
                        $objek=$_POST['objek']; 
                        $asesestment=$_POST['assestment']; 
                        $planing=$_POST['planing'];
                        $hitung = count($obatDikasih); 
                

                        if(empty($_POST['rujukan'])){
                            $rujukan="-";
                        } else{
                            $rujukan=$_POST['rujukan'];
                        }

                        for($i=0;$i<$hitung;$i++){
                            $id_obat_sekarang=$obatDikasih[$i];
                            $obat=mysqli_query($koneksi,"SELECT nama_obat, harga_jual, stock_obat FROM obat WHERE nama_obat='$id_obat_sekarang'");
                            while($obatTampil=mysqli_fetch_array($obat)){?>
                                <tr class="line_items">
                                    <td style="width:53.5%"><input type="text" value="<?php echo $obatTampil['nama_obat']?>" style="width:100%" disabled ></td>
                                    <td style="width:13%"><input type="text" name="HargaObat" value="<?php echo $obatTampil['harga_jual'] ?>"style="width:100%" disabled></>
                                    <td style="width:10%"><input type="number" name="qty" value="0" style="width:100%" max="<?php echo $obatTampil['stock_obat'] ?>"></td>
                                    <td style="width:10%"><input type="number" name="dikasih[]" value="0" style="width:100%" max="<?php echo $obatTampil['stock_obat'] ?>"></td>
                                    <td class="helper">Stock: <?php echo $obatTampil['stock_obat'] ?></td>

                                    <td><input type="hidden" name="id_obat[]" value="<?php echo $obatTampil['nama_obat'];?>"></td>   
                                    <td><input type="hidden" name="price" value="<?php echo $obatTampil['harga_jual']?>"></td>
                                    <td><input type="hidden" name="item_total" value="" jAutoCalc="{qty} * {price}"></td>
                                </tr>

                                <?php  $kalimatObat[$i]= $obatTampil['nama_obat']; ?>
                            <?php }?>
                        <?php }?> 
                        <?php $convert_obat=implode(", ", $kalimatObat); ?>
                                <tr class="line_items">
                                    <td style="width:70%"><input type="text" value="Masukan biaya jasa dokter" name="jasaDokter" disabled style="width:100%"></td>
                                    <td style="width:19%"><input type="number" name="price" id="price" style="width:100%"></td> 
                                    <td><input type="hidden" name="qty" value="1" style="width:100%"></>
                                    <td><input type="hidden" name="item_total" value="" jAutoCalc="{qty} * {price}"></td>
                                </tr>

                                <tr>
                                    <td>Total biaya</td>
                                    <td>: Rp.<input type="text" name="sub_total" value="" class="sum_total" jAutoCalc="SUM({item_total})"></td>
                                </tr>

                                <tr>
                                    <td>

                                        <input type="hidden" name="nama_pasien" id="nama_pasien" value="<?php echo $id;?>">
                                        <input type="hidden" name="tanggal_masuk" id="tanggal_masuk" value="<?php echo $tanggalMasuk;?>">
                                        <input type="hidden" name="berat_badan" id="berat_badan" value="<?php echo $id;?>">
                                        <input type="hidden" name="umur_pasien" id="umur_pasien" value="<?php echo $umur;?>">
                                        <input type="hidden" name="subjek" id="subjek" value="<?php echo $subjek;?>">
                                        <input type="hidden" name="objek" id="objek" value="<?php echo $objek;?>">
                                        <input type="hidden" name="assestment" id="assestment" value="<?php echo $asesestment;?>">
                                        <input type="hidden" name="planing" id="planing" value="<?php echo $planing;?>">
                                        <input type="hidden" name="id_obatDikasih" id="id_obatDikasih" value="<?php echo $id_obatDikasih;?>">
                                        <input type="hidden" name="rujukan" id="rujukan" value="<?php echo $rujukan;?>">
                                        <input type="hidden" name="convertObat" id="convertObat" value="<?php echo $convert_obat;?>">
                                    
                                    </td>
                                </tr>
                               
	                </table>
                    <div class="penyangga" style="height:3vh"></div>

            </div>
                <button type="submit" class="button_kirim" name="tambah_riwayat">Simpan</button>
                <div class="penyangga" style="height:3vh"></div>
        </form>
        </div>
        
    </div>

    
   
   
   
    <div class="kosong1"></div>
    
</body>
</html>