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
    <link rel="stylesheet" type="text/css" href="styling_detailRiwayat_dokter.css?<?=filemtime('styling_detailRiwayat_dokter.css');?>">
    <title>Tambah Riwayat Pasien</title>

</head>
<body>
<div class="sideNavBar">
<div class="sideNav">
        <center> <img src="../../resource/kedokteran_logo.png" class="logoDokter"> </center>

        <div class="item_sidemenu1">
			<a class="item"  href="Dashboard_Home_Dokter.php" style="display: flex;">	
				<i class="fa fa-home" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 32px">Home</p>
			</a>
		</div>


        <div class="item_sidemenu">
			<a class="item"  href="antrian_pasien_dokter.php" style="display: flex;">	
				<i class="fas fa-user-clock" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 27px">Antrian Pasien</p>
			</a>
		</div>

        <div class="item_sidemenu">
			<a class="item"  href="riwayat_pasien_dokter.php" style="display: flex;">	
				<i class="fa fa-file-alt" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 40px">Riwayat Pasien</p>
			</a>
		</div>

        <div class="item_sidemenu">
			<a class="item"  href="inventory_obat_dokter.php" style="display: flex;">	
				<i class="fas fa-prescription-bottle-alt" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 40px">Inventory</p>
			</a>
		</div>

        <div class="item_sidemenu">
			<a class="item"  href="../../switch.php" style="display: flex;">	
				<i class="fas fa-sign-out-alt" style="font-size: 26px;margin-left: 15px; margin-top: 5px"></i>
				<p style="font-family: futuraBold; font-size: 25px; margin-left: 32px">Switch</p>
			</a>
		</div>
    
    
    
    </div>
        <?php 
        $id = $_GET['id']; 
        ?>
    </div>

    <div class="isiKonten">
        <div class="boxKosong"></div>
        
        <div class="headerKumpulan">

        <?php if (isset($_GET['idAntri'])){ 
            // $id = $_GET['id']; 
            // $idAntri = $_GET['idAntri'];
            // include "../../controller/dokter/koneksi.php";
            // mysqli_query($koneksi,"update pasien set antri_mode=3 where id_pasien='$id'");
            // mysqli_query($koneksi,"update antrian set modes=3 where id_antrian='$idAntri'"); 
            ?>
            <div class="tombolKembali">
                <a href="antrian_pasien_dokter.php"><i class="fa fa-arrow-left logo_kembali" aria-hidden="true"></i></a>
            </div>

            <div class="judulHeader">
                Detail Riwayat Pasien
            </div>

        <?php } else { ?>
            <div class="tombolKembali">
                <a href="list_riwayatPasien_dokter.php"><i class="fa fa-arrow-left logo_kembali" aria-hidden="true"></i></a>
            </div>

            <div class="judulHeader">
                Detail Riwayat Pasien
            </div>

            <div class="printRiwayat">
                <a href="printRiwayat.php?id=<?php echo $id;?>" class="btn btn-primary tombolnya"><i class="fa fa-print" aria-hidden="true"></i></a>
            </div> 
        <?php }?>
        </div>

                   <!-- INI FORM TAMBAH RIWAYATNYA -->
                   <?php $id = $_GET['id']; ?>
    
    <div class="detailPasien"  id="tempatForm" style="display:none;">
    <p class="judulSeksi" style="margin-top:1vh;">Form Riwayat Pasien</p>
    <form action="checkout_dokter.php?id=<?php echo $id;?>" style="margin-top:1vh" method="post" autocomplate="off">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                      <label for="berat_badan">Berat Badan</label>
                      <input type="number" name="berat_badan" id="berat_badan" class="form-control" placeholder="Masukan berat badan pasien" aria-describedby="helpId">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group"> 
                      <label for="umur_pasien">Umur pasien</label>
                      <input type="number" name="umur_pasien" id="umur_pasien" class="form-control" placeholder="Masukan umur pasien" aria-describedby="helpId">
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="subjek"></label>
                          <label for="subjek">Subjek</label>
                          <textarea  class="form-control" name="subjek" id="subjek" rows="3" placeholder="Masukan deskripsi subjek"></textarea>
                        </div>
                    </div>
                </div>
        

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                      <label for="objek">Object</label>
                      <textarea  class="form-control" name="objek" id="objek" rows="3" placeholder="Masukan deskripsi object"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                      <label for="assestment">Asessestment</label>
                      <textarea  class="form-control" name="assestment" id="assestment" rows="3" placeholder="Mmsukan deskripsi assestment"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                      <label for="planing">Planing</label>
                      <textarea  class="form-control" name="planing" id="objek" rows="3" placeholder="Masukan deskripsi planning"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group">
             <label for="rujukan">Rujukan Rumah Sakit</label>
             <input type="text" class="form-control" name="rujukan" id="rujukan" placeholder="Masukan rujukan rumah sakit disini">
           </div>

        
            <button type="submit" class="btn btn-primary" style="margin-bottom:1vh" name="tambah_riwayat_antri" id="tambah_riwayat_antri">Simpan</button>
        </form>                         
    </div>

    <?php if (isset($_GET['idAntri'])){?>
        <button class="btn btn-primary formTombol" id="tombol" onclick="fungsiForm()" >Tambah riwayat pasien baru</button>
    <?php }?>
    <script>
        function fungsiForm(){
            var x = document.getElementById("tempatForm");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            document.getElementById("tombol").style.display = "none";
        }
        
    </script>  

        <div class="detailPasien">
            <p class="judulSeksi">Biodata Pasien</p>
            <table class="tabel">
                <!-- ini untuk nampilin biodatanya aja ya  -->
                <?php 
                    include '../../controller/dokter/koneksi.php'; 
                    $id = $_GET['id']; 
                    $biodata = mysqli_query($koneksi, "select * from pasien where id_pasien=$id");
                    while ($biodata_tampil = mysqli_fetch_array($biodata)){
                ?>
                    <tr>
                      
                        <td class="objek">ID Pasien</td>
                        <td class="deskripsi">: <?php echo $biodata_tampil['id_pasien'];?></td>
                    </tr>

                    <tr>
                        <td class="objek">KTP Pasien</td>
                        <td class="deskripsi">: <?php echo $biodata_tampil['ktp_pasien'];?></td>
                    </tr>

                    <tr>
                        <td class="objek">Nama</td>
                        <td class="deskripsi">: <?php echo $biodata_tampil['nama_pasien'];?></td>
                    </tr>

                    <tr>
                        <td class="objek">Jenis Kelamin</td>
                        <td class="deskripsi">: <?php echo $biodata_tampil['kelamin_pasien'];?></td>
                    </tr>

                    <tr>
                        <td class="objek">Tanggal Lahir</td>
                        <td class="deskripsi">: <?php echo $biodata_tampil['tgl_lahir_pasien'];?></td>
                    </tr>

                    <tr>
                        <td class="objek">Alamat Pasien</td>
                        <td class="deskripsi">: <?php echo $biodata_tampil['alamat_pasien'];?></td>
                    </tr>

                    <tr>
                        <td class="objek">Jenis Kelamin</td>
                        <td class="deskripsi">: <?php echo $biodata_tampil['kelamin_pasien'];?></td>
                    </tr>
                <?php } ?>
                </table>
            </div>

   
    
  
        <?php 
            include '../../controller/dokter/koneksi.php';
            $riwayat_pasien = mysqli_query($koneksi, "select * from riwayat_pasien where id_pasien=$id and mode=1 ORDER BY id_rekamMedis desc");
            $no=mysqli_num_rows($riwayat_pasien);
            while ($riwayat_pasienTampil = mysqli_fetch_array($riwayat_pasien)){
        ?>
            <div class="detailPasien">
                <p class="judulSeksi">Riwayat Pasien #<?php echo $no-- ?></p>
                <div class="bungkus_tombol">
                <?php if (isset($_GET['idAntri'])){ } else{ ?>
                <button name="editRiwayat" data-toggle="modal" data-target="#modelId<?php echo $riwayat_pasienTampil['id_rekamMedis'];?>" class="btn btn-primary btn-sm tombol_background" ><i class="fas fa-pen"></i></button>
                    <form action="../../controller/dokter/controller_riwayatPasien.php?id=<?php echo $riwayat_pasienTampil['id_rekamMedis'];?>" method="post">
                        <input type="hidden" name="id_pasien" id="id_pasien" value="<?php echo $id?>">
                        <button name="hapus_riwayat_bijian" id="hapus_riwayat_bijian" class="btn btn-primary btn-sm tombol_background" type="submit" style="margin-left:0.2vw"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                    <?php } ?>
                
                </div>
               
                <table class="tabel">
                    <tr>
                        <td class="objek">ID Dokumen Riwayat Pasien </td>
                        <td class="deskripsi">: <?php echo $riwayat_pasienTampil['id_rekamMedis'];?></td>
                    </tr>

                    <tr>
                        <td class="objek">Tanggal Kunjungan Pasien</td>
                        <td class="deskripsi">: <?php echo $riwayat_pasienTampil['tanggal_kunjungan'];?></td>
                    </tr>
                    
                    <tr>
                        <td class="objek">Berat Badan</td>
                        <td class="deskripsi">: <?php echo $riwayat_pasienTampil['berat_badan'];?> Kg</td>
                    </tr>


                    <tr>
                        <td class="objek">Umur</td>
                        <td class="deskripsi">: <?php echo $riwayat_pasienTampil['umur'];?> Tahun</td>
                    </tr>

                    <tr>
                        <td class="objek">Subjek</td>
                        <td class="deskripsi">: <?php echo $riwayat_pasienTampil['subject'];?></td>
                    </tr>
                    
                    <tr>
                        <td class="objek">Object</td>
                        <td class="deskripsi">: <?php echo $riwayat_pasienTampil['object'];?></td>
                    </tr>

                    <tr>
                        <td class="objek">Assessment</td>
                        <td class="deskripsi">: <?php echo $riwayat_pasienTampil['assestment'];?></td>
                    </tr>

                    <tr>
                        <td class="objek">Planning</td>
                        <td class="deskripsi">: <?php echo $riwayat_pasienTampil['planing'];?></td>
                    </tr>
                    
                    <tr><td><div style="height:1vh; width:100%"></div></td></tr>
                    
                    <tr>
                        <td class="objek">Obat yang Diberikan</td>
                        <td class="deskripsi">
                    <?php 
                        $id_rekam=$riwayat_pasienTampil["id_rekamMedis"];
                        $obat_test = mysqli_query($koneksi,"select obat_untuk_pasien.kumpulan_obat from riwayat_pasien inner join obat_untuk_pasien on riwayat_pasien.id_obatDikasih = obat_untuk_pasien.id_obatDikasih where id_rekamMedis=$id_rekam");
                        $obat_tamil = mysqli_fetch_assoc($obat_test);
                        $obatDikasih_bijian = explode(", ", $obat_tamil['kumpulan_obat']);
                        for($i=0;$i<count($obatDikasih_bijian);$i++){
                    ?>
                        <li><?php echo $obatDikasih_bijian[$i] ?></li>
                        <?php }?>
                        </td>
                    </tr>
                    
                    <tr><td><div style="height:1vh; width:100%"></div></td></tr>
                    
                    <tr>
                            <td class="objek">Rujukan rumah sakit</td>
                            <td class="deskripsi">: <?php echo $riwayat_pasienTampil['rujukan'];?></td>
                    </>


                </table>
            </div>
           

            <!-- Modal -->
            <div class="modal fade" id="modelId<?php echo $riwayat_pasienTampil['id_rekamMedis'];?>" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modalKosong">Edit</div>
                            <div class="modalForm">
                                <form action="../../controller/dokter/controller_riwayatPasien.php?id=<?php echo $riwayat_pasienTampil['id_rekamMedis'];?>" method="post">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                                <?php 
                                                    $tanggal = $riwayat_pasienTampil['tanggal_kunjungan'];
                                                ?>
                                                <input disabled autocomplete="off" value="<?php echo $tanggal ?>" type="text" name="tanggal_masuk" id="tanggal_masuk"  required  class="form-control datepicker datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker"  autocomplate="off"/>
                                                <input type="hidden" name="id_obatDikasih" id="id_obatDikasih" value="<?php echo $riwayat_pasienTampil['id_obatDikasih'];?>">
                                                <input type="hidden" name="id_rekamMedis" id="id_rekamMedis" value="<?php echo $riwayat_pasienTampil['id_rekamMedis'];?>">
                                                <input type="hidden" name="id_pasien" id="id_pasien" value="<?php echo $riwayat_pasienTampil['id_pasien'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label for="berat_badan">Berat Badan</label>
                                            <input type="number" name="berat_badan" id="berat_badan" class="form-control" value="<?php echo $riwayat_pasienTampil["berat_badan"] ?>" aria-describedby="helpId">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group"> 
                                            <label for="umur_pasien">Umur pasien</label>
                                            <input type="number" name="umur_pasien" id="umur_pasien" class="form-control" value="<?php echo $riwayat_pasienTampil['umur'];?>" aria-describedby="helpId">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="subjek"></label>
                                                <label for="subjek">Subjek</label>
                                                <textarea class="form-control" name="subjek" id="subjek" rows="3"><?php echo $riwayat_pasienTampil['subject'];?> </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label for="objek">Object</label>
                                            <textarea class="form-control" name="objek" id="objek" rows="3"><?php echo $riwayat_pasienTampil['object'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label for="assestment">Asessestment</label>
                                            <textarea class="form-control" name="assestment" id="assestment" rows="3"><?php echo $riwayat_pasienTampil['assestment'] ?> </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label for="planing">Planing</label>
                                            <textarea class="form-control" name="planing" id="planing" rows="3"><?php echo $riwayat_pasienTampil['planing'];?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <label for="obatDikasih">Obat yang diberikan</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <select class="form-control obatDikasih" name="obatDikasih[]" id="obatDikasih<?php echo $riwayat_pasienTampil['id_rekamMedis'];?>" multiple="multiple"  required style="width:100%">
                                                    <?php
                                                        include 'koneksi.php'; 
                                                        $ambil_list_obat = mysqli_query($koneksi, "SELECT * FROM obat where status=1 or status=2"); 
                                                        
                                                        $id_riwayat = $riwayat_pasienTampil["id_rekamMedis"]; 
                                                        $ambil_obatDikasih = mysqli_query($koneksi, "SELECT obat_untuk_pasien.kumpulan_obat FROM riwayat_pasien INNER JOIN obat_untuk_pasien on riwayat_pasien.id_obatDikasih = obat_untuk_pasien.id_obatDikasih WHERE id_rekamMedis = $id_riwayat");
                                                        $data_obadDikasih = mysqli_fetch_array($ambil_obatDikasih);
                                                        $obatDikasih_bijian = explode(", ", $data_obadDikasih['kumpulan_obat']);
                                                        for($i=0; $i<count($obatDikasih_bijian) ; $i++){
                                                    ?>
                                                        <option selected=""><?php echo $obatDikasih_bijian[$i];?></option>
                                                        
                                                    <?php }?>
                                                    <option value="" disabled>------------------------------</option>
                                                    <?php 
                                                        while ($list_obat = mysqli_fetch_array($ambil_list_obat)){
                                                    ?>
                                                        <option value="<?php echo $list_obat['nama_obat'];?>"><?php echo $list_obat['nama_obat'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
							    		$(document).ready(function() {
											$('#obatDikasih<?php echo $riwayat_pasienTampil['id_rekamMedis'];?>').select2({
											        language: {
							 		                    noResults: function() {
												            return "Kategori ini tidak ada "
											            }
    										        },
											    escapeMarkup: function (markup) {
											        return markup;
											    }
	    									});
    									});
									</script>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="rujukan">Rujukan pasien</label>
                                            <input type="text" name="rujukan" id="rujukan" class="form-control" value="<?php echo $riwayat_pasienTampil['rujukan']?>">
                                        </div>
                                    </div>

                                    <div style="margin-top:2%"></div>
                                    <button type="submit" class="btn btn-primary" name="update" id="update">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>


        <div class="kosong"></div>

        
</body>
</html>