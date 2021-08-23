<?php 
$no=1;
include('../../controller/dokter/koneksi.php');
$id=$_GET['id'];
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
                        <td>Umur</td>';
                            $id_rekam=$biodata_tampil["id_rekamMedis"];
                            $tglLahir = mysqli_query($koneksi, "select tgl_lahir_pasien from pasien where id_pasien=$id");
                            $tglDatang = mysqli_query($koneksi, "select tanggal_kunjungan from riwayat_pasien where id_rekamMedis=$id_rekam");
                            $tglLahirTampil= mysqli_fetch_array($tglLahir);
                            $tglLahirPakai=$tglLahirTampil['tgl_lahir_pasien'];
                            
                            $tglDatangTampil = mysqli_fetch_assoc($tglDatang);
                            $tglDatangTampilPakai = $tglDatangTampil['tanggal_kunjungan'];

                            $stringTglLahir = explode ("-", $tglLahirPakai);
                            $stringTglDatang = explode ("-", $tglDatangTampilPakai);

                            $jumlahTglLahir = $stringTglLahir[0]+($stringTglLahir[1]*30); 
                            $jumlahTglDatang = $stringTglDatang[0]+($stringTglDatang[1]*30); 
                            
                            if($jumlahTglDatang >= $jumlahTglLahir){
                                $umur = $stringTglDatang[2]-$stringTglLahir[2];
                            } else{
                                $umur = ($stringTglDatang[2]-$stringTglLahir[2])-1;
                            }
                        $html.='
                        <td class="deskripsi">: '.$umur.'</td>
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
                        <td>Resep Obat </td>
                        <td>';
                        $id_rekam=$biodata_tampil["id_rekamMedis"];
                        $obat_test = mysqli_query($koneksi,"select obat_untuk_pasien.kode_obat, obat_untuk_pasien.sediaan, obat_untuk_pasien.jumlah from riwayat_pasien inner join obat_untuk_pasien on riwayat_pasien.id_obatDikasih = obat_untuk_pasien.id_obatDikasih where id_rekamMedis=$id_rekam");
                        $obat_tamil = mysqli_fetch_assoc($obat_test);
                        $obatDikasih_bijian = explode(", ", $obat_tamil['kode_obat']);
                        $sediaan_bijian = explode(", ", $obat_tamil['sediaan']);
                        $jumlah_bijian = explode(", ", $obat_tamil['jumlah']);
                        for($i=0;$i<count($obatDikasih_bijian);$i++){
                            $html.='<p>'.$obatDikasih_bijian[$i].' '.$sediaan_bijian[$i].'</p> 
                        ';}
                           $html.='</td> 
                    </tr>
                    
             </table>
               
            <p class="noHalaman">'. $no++ .' </p>
             <div class="putus_kertas"></div>';
        }
        $html .= '
    
</body>
</html>
';
require_once("../../vendor/autoload.php");
$mpdf = new \Mpdf\Mpdf();;

$mpdf->AddPage('p','A4');
$mpdf->WriteHTML($html);
$mpdf->Output();
?>


