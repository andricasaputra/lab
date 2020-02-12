<!-- /.panel -->

<div class="panel panel-default">

    <div class="panel-heading">

        <i class="fa fa-clock-o fa-fw"></i> Info

    </div>

    <!-- /.panel-heading -->

    <div class="panel-body">

        <ul class="timeline">

            <li>

                <?php 

                    $kosong = $objectNomor->Kosongdata();

                    while($ini = $kosong->fetch_object()):

                      $isi = $ini->id;

                    endwhile;



                    if (!empty($isi)) {

                            

                        $tampil2 = $objectData->ambil_id();

                        $result = $tampil2->fetch_object();

                        $isi = $result->id;

                        $tampil = $objectData->tampil_timeline();

                        while($data=$tampil->fetch_object()):

                        $tanggal_diterima = $data->tanggal_diterima;

                        $kode_sampel = $data->kode_sampel;

                        $kondisi_sampel = $data->kondisi_sampel;

                        $penyelia = $data->penyelia;

                        $tanggal_penyerahan = $data->tanggal_penyerahan;

                        $tanggal_penunjukan = $data->tanggal_penunjukan;

                        $tanggal_penyerahan_lab = $data->tanggal_penyerahan_lab;

                        $tanggal_pengujian = $data->tanggal_pengujian;

                        $tanggal_sertifikat = $data->tanggal_sertifikat;

                        $tgl = $data->tanggal_lhu;

                        $hasil = $data->no_agenda; 



                        if($tanggal_diterima == 0){

                                $isi = 'Belum Diterima Oleh Penerima Sampel';

                        }elseif(strlen($kode_sampel) == 0){

                                $isi = 'Proses Permintaan Kesiapan Pengujian';

                        }elseif(strlen($kondisi_sampel) == 0){

                                $isi = 'Proses Kesiapan Laboratorium Penguji';

                        }elseif(strlen($penyelia) == 0){

                                $isi = 'Proses Penerbitan Respon Kesiapan Pengujian';

                        }elseif(strlen($tanggal_penyerahan) == 0){

                                $isi = 'Dokumen Administrasi Lengkap / Proses penyerahan Sampel Ke Laboratorium';

                        }elseif(strlen($tanggal_penunjukan) == 0){

                                $isi = 'Proses Penugasan Penyelia dan Analis oleh Manajer Teknis';

                        }elseif(strlen($tanggal_penyerahan_lab) == 0){

                                $isi = 'Sampel Dalam Proses Pengujian';

                        }elseif(strlen($tanggal_pengujian) == 0){

                                $isi = 'Sampel Dalam Proses Pengujian';

                        }elseif(strlen($tanggal_sertifikat) == 0){

                                $isi = 'Dalam Proses Pengujian';

                        }elseif(strlen($tanggal_sertifikat) !== 0 && strlen($hasil) == 0 ){

                                $isi = 'Proses Penerbitan Laporan Hasil Uji';

                        }else{

                                $isi = 'Selesai';

                        }



                            if($tgl == 0){



                                $isi2 = '-'; ?>

                                <div class="timeline-badge danger zoom"><i class="fa fa-envelope"></i>

                            

                        <?php }else{ 



                                $isi2 = $tgl; ?>

                                <div class="timeline-badge success zoom"><i class="fa fa-check"></i>



                        <?php } ?>

                </div>

                <div class="timeline-panel">

                    <div class="timeline-heading">

                        <h4 class="timeline-title">Data Permohonan Pengujian Terakhir</h4>

                    <p><small class="text-muted"><i class="fa fa-time"></i> Laboratorium Karantina Hewan</small></p>

                        

                    </div>

                    <div class="timeline-body table-responsive">

                        <table class="table">

                            <tr >

                                <td class="isi_atas">Tanggal Permohonan</td>

                                <td class="isi">:</td>

                                <td class="isi_bawah"><?php echo $data->tanggal_permohonan ?></td>

                            </tr>

                            <tr>

                                <td class="isi_atas">Nomor Permohonan</td>

                                <td class="isi">:</td>

                                <td class="isi_bawah"><?php echo $data->no_permohonan ?></td>

                            </tr>

                            <tr>

                                <td class="isi_atas">Nama Sampel</td>

                                <td class="isi">:</td>

                                <td class="isi_bawah"><?php echo $data->nama_sampel ?></td>

                            </tr>

                            <tr>

                                <td class="isi_atas">Jumlah Sampel</td>

                                <td class="isi">:</td>

                                <td class="isi_bawah"><?php echo $data->jumlah_sampel ?> (<?php echo $objectNomor->bilangan($data->jumlah_sampel); ?>)</td>

                            </tr>

                            <tr>

                                <td class="isi_atas">Target Pengujian</td>

                                <td class="isi">:</td>

                                <td class="isi_bawah"><em><?php echo $data->target_pengujian2 ?></em></td>

                            </tr>

                            <tr>

                                <td class="isi_atas">Lama Pengujian</td>

                                <td class="isi">:</td>

                                <td class="isi_bawah"><?php echo $data->lama_pengujian?></td>

                            </tr>

                            <tr>

                                <td class="isi_atas">Status</td>

                                <td class="isi">:</td>

                                <td class="isi_bawah"><?php echo '<b>'.$isi.'</b>'?></td>

                            </tr>

                            <tr>

                                <td class="isi_atas">Tanggal Selesai</td>

                                <td class="isi">:</td>

                                <td class="isi_bawah"><?php echo $isi2 ?></td>

                            </tr>

                            <tr>

                                <td class="isi_atas zoom"><a href="?page=lihat_data_permohonan" class="btn btn-info btn-cirlce"><i class="fa fa-eye fa-fw"></i> Lihat Semua</a></td>

                                <td></td>

                                <td></td>

                            </tr>

                        </table>

                        <?php endwhile;?>

                    </div>

                </div>

            </li>

            

            <?php } ?>


            <li class="timeline-inverted">

                <div class="timeline-badge warning zoom"><i class="fa fa-th-large"></i>

                </div>

                <div class="timeline-panel">

                    <div class="timeline-heading">

                        <h4 class="timeline-title">Data Jumlah Permohonan Pengujian </h4>

                        <p><small class="text-muted"><i class="fa fa-time"></i> Laboratorium Karantina Hewan</small></p>

                    </div>

                    <div class="timeline-body table-responsive">

                        <?php 

                        $tampil = $objectData->tampil3();

                        $b = $objectData->tanggal();

                        $c = $objectData->tanggal_lalu();

                        $d = $objectData->per_pending();

                        $e = $objectData->per_selesai();

                        ?>

                        

                        <table class="table">

                            <tr>

                                <td class="isi_atas2">Permohonan Dalam Proses</td>

                                <td class="isi2">:</td>

                                <td class="isi_bawah2"><?php echo $d.' '.'Permohonan' ?></td>

                            </tr>

                            <tr>

                                <td class="isi_atas2">Permohonan Selesai Proses</td>

                                <td class="isi2">:</td>

                                <td class="isi_bawah2"><?php echo $e.' '.'Permohonan' ?></td>

                            </tr>

                            <tr>

                                <td class="isi_atas2">Permohonan Bulan Ini</td>

                                <td class="isi2">:</td>

                                <td class="isi_bawah2"><?php echo $b.' '.'Permohonan'  ?></td>

                            </tr>

                            <tr>

                                <td class="isi_atas2">Permohonan Bulan Lalu</td>

                                <td class="isi2">:</td>

                                <td class="isi_bawah2"><?php echo $c.' '.'Permohonan'  ?></td>

                            </tr>

                            <tr >

                                <td class="isi_atas2">Jumlah Seluruh Permohonan</td>

                                <td class="isi2">:</td>

                                <td class="isi_bawah2"><?php echo $tampil.' '.'Permohonan' ?></td>

                            </tr>

                        </table>



                        

                    </div>

                </div>

            </li>



             <li>



                <div class="timeline-badge primary zoom"><i class="fa fa-info"></i></div>

                <div class="timeline-panel">

                    <div class="timeline-heading ">

                        <?php 

                                $pesan1 = $objectAdmin->tampil_pesanid();

                                while($isi1= $pesan1->fetch_object()):

                                 $id =  $isi1->minId;

                                endwhile;

                                $id2 = @$_GET['id'];

                                if ($id2 == '') {

                                    $id3 = $id;

                                }else{

                                    $id3 = $id2;

                                }

                                $pesan = $objectAdmin->tampil_pesan($id3);

                                while($isi= $pesan->fetch_object()):

                                 $a =  $isi->judul;

                                 $b =  $isi->isi;

                                endwhile;

                         ?>

                        <h4 class="timeline-title "> <span class="pesanJudul"><?php echo $a ?>&nbsp;<i class="fa  fa-bell-o"></i></span> </h4>

                    <p><small class="text-muted"><i class="fa fa-time"></i>Sekilas Info</small></p>

                        

                    </div>

                    <div class="timeline-body">

                        <p><?php echo $b ;?></p>

                    </div>

                </div>

            </li>



             <li class="timeline-inverted">

                <div class="timeline-badge danger zoom"><i class="fa fa-heart"></i>

                </div>

                <div class="timeline-panel">

                    <div class="timeline-heading">

                        <h4 class="timeline-title">Social Media</h4>

                        <p><small class="text-muted"><i class="fa fa-time"></i>Barantan RI</small></p>

                    </div>

                    <div class="timeline-body text-center social-icons icon-circle icon-zoom">

                        <a href="http://karantina.pertanian.go.id/" target="_blank"><i class="fa fa-globe" name="barantan_link"></i></a>

                        <a  href="https://www.facebook.com/badankarantinapertanian/" target="_blank"><i class="fa fa-facebook" name="facebook_link"></i></a>

                        <a href="https://twitter.com/Barantan_RI" target="_blank"><i class="fa fa-twitter" name="twitter_link"></i></a>

                        <a href="https://www.instagram.com/barantan_ri/" target="_blank"><i class="fa fa-instagram" name="instagram_link"></i></a>

                        <a href="https://www.youtube.com/channel/UC8gfItc0rKM9BowVvETHq3A" target="_blank"><i class="fa fa-youtube-play" name="youtube_link"></i></a>

                        <a href="https://plus.google.com/?hl=id" target="_blank"><i class="fa fa-google-plus" name="google_link"></i></a>

                    </div>

                </div>

            </li>







        </ul>

    </div>

    <!-- /.panel-body -->

</div>

<!-- /.panel -->