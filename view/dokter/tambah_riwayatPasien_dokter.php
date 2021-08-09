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
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
	<script src="../../js/select2.min.js"></script>
    <script defer src="../../js/all.js"></script>
    <script type="text/javascript" src="../../js/moment.min.js"></script>
    <script type="text/javascript" src="../../js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../../js/tanggal.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
    <link rel="stylesheet" href="../../css/all.css"/>
    <link rel="stylesheet" href="../../css/tempusdominus-bootstrap-4.min.css">
    <link href="../../css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="styling_tambahPasien_dokter.css?<?=filemtime('styling_tambahPasien_dokter.css');?>">
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
    </div>

    <div class="isiKonten">
        <div class="boxKosong"></div>
        <div class="headerKumpulan">
            <div class="tombolKembali">
                <a href="riwayat_pasien_dokter.php"><i class="fa fa-arrow-left logo_kembali" aria-hidden="true"></i></a>
            </div>

            <div class="judulHeader">
                Tambah Riwayat Pasien
            </div>
        </div>

        <!-- ini formnya    -->
        <div class="dasarForm">
            <form action="../../controller/dokter/controller_riwayatPasien.php" method="post" autocomplate="off">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                          <label for="nama_pasien">Nama Pasien</label>
                          <select class="form-control" name="nama_pasien" id="nama_pasien" required="" >
								<?php
									include '../../controller/dokter/koneksi.php'; 
									$list_pasien = mysqli_query($koneksi,"select id_pasien, nama_pasien from pasien where mode=1"); 
									while ($list = mysqli_fetch_array($list_pasien)) {
								?>
                                    <option value=""></option>
									<option value="<?php echo $list['id_pasien'] ?>"> <?php echo $list['nama_pasien'];?></option>
								<?php } ?>
                                
							  </select>

							  <script type="text/javascript">
								$(document).ready(function() {
									$('#nama_pasien').select2({
										width:'resolve',
                                        allowClear: true,
											placeholder: 'Masukan obat yang diberikan',    
												language: {
													noResults: function() {
													return `Pasien belum terdaftar di sistem `;
													}
												},
											
												escapeMarkup: function (markup) {
													return markup;
												}
									});
								});
								</script>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input autocomplete="off" type="text" name="tanggal_masuk" id="tanggal_masuk"  required  class="form-control datepicker datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker" placeholder="Masukan tanggal masuk pegawai" autocomplate="off"/>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function(){
                        setDatePicker()
                        setDateRangePicker(".startdate", ".enddate")
                        setMonthPicker()
                        setYearPicker()
                        setYearRangePicker(".startyear", ".endyear")
                    })
                </script>

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
                              <textarea class="form-control" name="subjek" id="subjek" rows="3" placeholder="Masukan deskripsi subjek"></textarea>
                            </div>
                        </div>
                    </div>
            

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                          <label for="objek">Object</label>
                          <textarea class="form-control" name="objek" id="objek" rows="3" placeholder="Masukan deskripsi object"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                          <label for="assestment">Asessestment</label>
                          <textarea class="form-control" name="assestment" id="assestment" rows="3" placeholder="Masukan deskripsi assestment"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                          <label for="planing">Planning</label>
                          <textarea class="form-control" name="planing" id="planing" rows="3" placeholder="Masukan deskripsi planning"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="kategori_obat">Obat dikasih</label>
                            <select name="obat_dikasih[]" id="obat_dikasih" class="form-control" multiple="true" required>
                                
                                <?php
                                    include '../../controller/resepsionis/koneksi.php'; 
                                    $list_givesObat = mysqli_query($koneksi,"select nama_obat from obat where status=1 or status=2"); 
                                    while ($list = mysqli_fetch_array($list_givesObat)) {
                                ?>

                                <option value="<?php echo $list['nama_obat'] ?>"> <?php echo $list['nama_obat'];?></option>
                                
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
					

				<script type="text/javascript">
					$(document).ready(function() {
						$('#obat_dikasih').select2({
							width:'resolve',
                                allowClear: true,
								placeholder: 'Masukan obat yang diberikan',    
								language: {
										noResults: function() {
										return `Tidak ada obat ini, silahkan ketik "Tidak" jika tidak ada obat/resep sendiri`;
												}
								},
											
								escapeMarkup: function (markup) {
								    return markup;
								}
					        });											
					});
				</script>

               <div class="form-group">
                 <label for="rujukan">Rujukan Rumah Sakit</label>
                 <input type="text" class="form-control" name="rujukan" id="rujukan" placeholder="Masukan rujukan rumah sakit disini">
               </div>

            
                <button type="submit" class="btn btn-primary" name="tambah_riwayat" id="tambah_riwayat">Simpan</button>
            </form>
        </div>

        <div class="kosong"></div>
    </div>
</body>
</html>