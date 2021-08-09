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
    <script defer src="../../js/all.js"></script> 
    <link rel="stylesheet" href=../../"css/all.css"/>
 
    <link rel="stylesheet" type="text/css" href="styling_kelola_kategoriObat.css?<?=filemtime('styling_kelola_kategoriObat.css');?>">

    <title>Kelola Kategori Obat</title>
</head>
<body>

<div class="bungkus">
    <div class="kotak_aesthethic"></div>
    <div class="header">
        <div class="col-1 kembali">
           <center><a name="kembali" id="kembali" class="kiri_isinya" href="list_obat_depan.php" role="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i> </a></center>
        </div>

        <div class="col header_tampang">
            <p class="tulisan_judul">Kelola Kategori Obat</p>
        </div>
        <div class="col-2">
        <button type="button" class="btn btn-primary" style="height:5vh; width:6.7vw;; box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);  " data-toggle="modal" data-target="#modalTambah">
            Tambah
        </button>
        </div>
    </div>

    <div class="isi_body">
        <div class="dasar_tabel">
            <table class="table gaya_tabel">
                <thead class="thead-light">
                    <tr>
                        <th>Kategori Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include '../../controller/resepsionis/koneksi.php';
                        $list_jenis_obat = mysqli_query($koneksi,"select * from kategori_obat"); 
                        while ($list = mysqli_fetch_array($list_jenis_obat)) {
                    ?>
                    <tr>
                        <td style="width:75%" ><?php echo $list["kategori_obat"] ?></td>
                        <td>
                        <button type="button" class="btn btn-success bg_button" data-toggle="modal" data-target="#modalEdit<?php echo $list['kategori_obat'];?>">
                            <i class="fas fa-edit"></i>
                        </button>
                            <a name="hapus" id="hapus" class="btn btn-danger bg_button" href="../../controller/resepsionis/controller_hapus_kategoriObat.php?id=<?php echo $list['kategori_obat']; ?>" role="button"> <i class="fa fa-trash button" aria-hidden="true"></i> </a>
                        </td>    
                    </tr>


                    <div class="modal fade" id="modalEdit<?php echo $list['kategori_obat'];?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="kotak_aesthethic" style="border-radius:0;height:50px"></div>
                                <div class="header_judulModal">
                                    <p class="tulisan_judulModal">Edit Kategori Obat</p>
                                </div>

                                <form method="POST" action="../../controller/resepsionis/controller_update_kategoriObat.php">
                                <div class="formz" >
                                    <div class="col inputz">
                                            <input type="hidden" name="id" id="id" value="<?php echo $list["kategori_obat"]?>">
                                            <input value="<?php echo $list["kategori_obat"] ?>" type="text" name="kategori_obat" id="kategori_obat" class="input_style"  autocapitalize=words>
                                    </div>
                                    
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
                                    </div>
                                </div> 
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    ?>
                </tbody>
            </table>
          
        </div>
        <div class="koso"></div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="kotak_aesthethic" style="border-radius:0;height:50px"></div>
            <div class="header_judulModal">
                <p class="tulisan_judulModal">Tambah Kategori Obat</p>
            </div>

            <form method="POST" action="../../controller/resepsionis/controller_tambah_kategoriObat.php">
            <div class="formz" >
                <div class="col inputz">
                        <input placeholder="Masukan kategori obat baru" type="text" name="kategori_obat" id="kategori_obat" class="input_style"  autocapitalize=words>
                </div>
                
                <div class="col-1">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
                </div>
            </div> 
            </form>
        </div>
    </div>
</div>

</body>
</html>