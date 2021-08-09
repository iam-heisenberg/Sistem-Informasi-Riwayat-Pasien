<?php
 ini_set('error_reporting', 0);
 ini_set('display_errors', 0);
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styling_printRiwayat.css">
        <title>Export PDF</title>
    </head>
    <body>
        <header class="header_bungkus">
            <p class="header1">Praktik Dokter Umum </p> <br>
            <p class="header2"> I Gusti Bagus Teguh Pramana. S,Ked </p> <br> 
            <p class="header3"> Jl. Diponogoro, Dajan Peken, Kabupaten Tabanan, Bali</p>
            <div class="garisKosong"></div>
        </header>
        <table class="tabel">
        <?php 
            $id = $_GET['id'];
            include "../../controller/dokter/koneksi.php"; 
            $biodata = mysqli_query($koneksi, "select * from pasien where id_pasien=$id");
            while($biodata_tampil = mysqli_fetch_array($biodata)){
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
        
    </body>
    </html>