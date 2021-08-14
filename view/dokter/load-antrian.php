
        <div class="nextPasien">
            <p class="judulNext">
                    Pasien Saat Ini
                </p>

                <table class="tabelAntrian" id="tabelAntrian">
                    <tbody>
                <?php 
                    include '../../controller/dokter/koneksi.php'; 
                    $antrian = mysqli_query($koneksi,"SELECT antrian.*, pasien.nama_pasien, pasien.id_pasien FROM antrian INNER JOIN pasien ON antrian.id_pasien = pasien.id_pasien WHERE modes=2 LIMIT 1"); 
                    if(mysqli_num_rows($antrian)>0){
                        while($tampilAntrian = mysqli_fetch_array($antrian)){ ?>
                            <tr>
                                <td style="width:40%">
                                    <?php echo $tampilAntrian['nama_pasien'];?>
                            
                                    <a class="tombol" href="detail_riwayatPasien_dokter.php?id=<?php echo $tampilAntrian['id_pasien'];?>&idAntri=<?php echo $tampilAntrian['id_antrian'];?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </td>    
                            </tr>

                            

                           
                               
                            <?php }} else  {?>
                        <tr>
                           <td>Tidak ada pasien yang akan masuk</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>



                <p class="judulNext"  style="margin-top:2vw;">
                    Daftar antrian pasien
                </p>

                <table class="tabelAntrian" id="tabelAntrian">
                    <tbody>
                <?php
                    $no=1; 
                    include '../../controller/dokter/koneksi.php'; 
                    $antrian = mysqli_query($koneksi,"SELECT antrian.*, pasien.nama_pasien FROM antrian INNER JOIN pasien ON antrian.id_pasien = pasien.id_pasien WHERE modes=1"); 
                    if(mysqli_num_rows($antrian)>0){
                        while($tampilAntrian = mysqli_fetch_array($antrian)){ ?>
                            <tr>
                                <td><?php echo $no++ .".";?></td>
                                <td><?php echo $tampilAntrian['nama_pasien'];?></td>    
                            </tr>
                                <?php }} else {?>
                            <tr>
                                <td>Tidak ada antrian saat ini</td>
                            </tr>
                                <?php } ?>
                    </tbody>
             </table>
             <div class="kosongan"></div>