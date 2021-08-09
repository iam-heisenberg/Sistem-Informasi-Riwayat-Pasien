<?php 
$no=1;
include('../../controller/dokter/koneksi.php');
require_once("../../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$id=$_GET['id'];
$dompdf = new Dompdf();
$nama=mysqli_query($koneksi,"SELECT nama_pasien FROM pasien where id_pasien=$id and mode=1");
$namaTampil=mysqli_fetch_assoc($nama);
$html = '
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling_printRiwayat.css">
    <title>Export PDF</title>
</head>
<body>';
        include "../../controller/dokter/koneksi.php"; 
        $biodata = mysqli_query($koneksi, "SELECT riwayat_pasien.*, pasien.*, obat_untuk_pasien.* FROM riwayat_pasien INNER JOIN pasien ON riwayat_pasien.id_pasien = pasien.id_pasien INNER JOIN obat_untuk_pasien on riwayat_pasien.id_obatDikasih=obat_untuk_pasien.id_obatDikasih WHERE riwayat_pasien.id_pasien=$id AND riwayat_pasien.mode=1 ORDER BY riwayat_pasien.id_rekamMedis DESC");
        while($biodata_tampil = mysqli_fetch_array($biodata)){
$html.='
    <header class="header_bungkus">
        <p class="header1">Praktik Dokter Umum </p> <br>
        <p class="header2">Dr. I Gusti Bagus Teguh Pramana. S,Ked </p> <br> 
        <p class="header3"> Jl. Diponogoro No.31, Dajan Peken, Kabupaten Tabanan, Bali</p>
        <div class="garisKosong"></div>
    </header>

    <p class="tulisanBiodata"> Biodata Pasien </p>
            <table class="tabel">
                    <tr>
                        <td>ID Pasien</td>
                        <td>: '.$biodata_tampil['id_pasien'].'</td>
                    </tr>

                    <tr>
                        <td>KTP Pasien</td>
                        <td>: '.$biodata_tampil['ktp_pasien'].'</td>
                    </tr>

                    <tr>
                        <td>Nama</td>
                        <td class="deskripsi">: '.$biodata_tampil['nama_pasien'].'</td>
                    </tr>

                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: '.$biodata_tampil['kelamin_pasien'].'</td>
                    </tr>

                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>: '.$biodata_tampil['tgl_lahir_pasien'].'</td>
                    </tr>

                    <tr>
                        <td>Alamat Pasien</td>
                        <td>: '.$biodata_tampil['alamat_pasien'].'</td>
                    </tr>

                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: '.$biodata_tampil['kelamin_pasien'].'</td>
                    </tr>
             </table>

             <p class="tulisanBiodata"> Riwayat Pasien</p>
              <table class="tabel">
                    <tr>
                        <td>ID Rekam Medis</td>
                        <td>: '.$biodata_tampil['id_rekamMedis'].'</td>
                    </tr>

                    <tr>
                        <td>Tanggal Datang</td>
                        <td>: '.$biodata_tampil['tanggal_kunjungan'].'</td>
                    </tr>

                    <tr>
                        <td>Berat Badan</td>
                        <td class="deskripsi">: '.$biodata_tampil['berat_badan'].'</td>
                    </tr>

                    <tr>
                        <td>Umur</td>
                        <td>: '.$biodata_tampil['umur'].'</td>
                    </tr>

                    <tr>
                        <td>Subjek</td>
                        <td>: '.$biodata_tampil['subject'].'</td>
                    </tr>

                    <tr>
                        <td>Objek</td>
                        <td>: '.$biodata_tampil['object'].'</td>
                    </tr>

                    <tr>
                        <td>Assestment</td>
                        <td>: '.$biodata_tampil['assestment'].'</td>
                    </tr>

                    <tr>
                        <td>Planning</td>
                        <td>: '.$biodata_tampil['planing'].'</td>
                    </tr>
                    

                    <tr>
                        <td>Rujukan</td>
                        <td>: '.$biodata_tampil['rujukan'].'</td>
                    </tr>

                    <tr>
                        <td>Resep Obat</td>
                        <td>: '.$biodata_tampil['kumpulan_obat'].'</td>
                    </tr>
             </table>
               
            <p class="noHalaman">'. $no++ .' </p>
             <div class="putus_kertas"></div>';
        }
        $html .= '
    
</body>
</html>
';
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Riwayat Pasien '.$namaTampil['nama_pasien'].'.pdf');
?>


