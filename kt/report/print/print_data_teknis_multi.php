<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0], 'kt');

$content ='

<style>

    .table1 {

        border :0px;

        width: 100%;

    }


    th{

        border: 0.7px solid black;

        border-collapse: collapse;

        padding: 3px;

    }


    .tabel1 td {

        padding:8px;

        vertical-align: text-bottom;

    }


    .table2  {

        text-align: center;

        border: 0.7px solid black;

        border-collapse: collapse;

    }


    .table2 th {

       padding-top: 10px;

       padding-bottom: 10px;

    }


    .table2 td {

       vertical-align: text-top;

       text-align: center;

       padding:  7px 5px;

       border: 0.7px solid black;

       align: bottom;

    }

    div#garis {

        width: 90%;

        margin:auto;

        margin-left:-3px;

        margin-bottom: 20px

    }


    hr {

        width: 97%;

        border: none;

        height: 1px;

        color: black; 

        background-color: black;

    }


    .lower th td {

       border: 0px;

       width: 100%;

       vertical-align: text-top;

    }


    .ket {

        border : 0.7px solid;

        border-collapse: collapse;

    }


    .html2pdf__page-break2 {

      height: 2000px;

    }


</style>


<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="15mm" orientation="P">



     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src="'.$logo.'" width="698px; height:150px"></strong>

        </div>

    </page_header>



    <page_footer>

        <div id="garis">

            <hr width="75%">

            <i>'.$objectPrint->kode_dokumen.'</i>

        </div>

    </page_footer>

     ';


        if(!isset($_POST['print_data'])){

            if(@$_SESSION['loginadminkt']){

                echo "<script>alert('Harap tidak reload menggunakan url')

                window.location='../../admin.php?page=data_teknis'</script>";

                exit;

            }elseif(@$_SESSION['loginsuperkt']){

                echo "<script>alert('Harap tidak reload menggunakan url')

                window.location='../../super_admin.php?page=data_teknis'</script>";

                exit;

            }else{

                echo "<script>alert('Harap tidak reload menggunakan url')

                window.location='../../pengujian.php?page=data_teknis'</script>";

                exit;

            } 


        }else{

            $no=1;

            $a = $_POST['no_a'];

            $b = $_POST['no_b'];

            $d = (int)$a;

            $e = (int)$b;
        
            $tampil2 = $objectPrint->print_multi_sertifikat($a, $b);
          

        }  


        if ($tampil2->num_rows === 0) {
            echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
            return false;
        }

        $num1 = $tampil2->num_rows;

        $arrID = array();

        while ($data2 = $tampil2->fetch_object()):  

            $id = $data2->id;

            $ttd = $objectPrint->scan($id);

            $qu2 = $objectHasil->input_ulang($id);

            $num = $qu2->num_rows;

            $bilangan = ucwords($objectNomor->bilangan($data2->jumlah_sampel));

            $arrID[] = $data2->id;

            $totalID = count($arrID);

    $content .='

    <div align="center" id="judul">

        <strong>'.$objectPrint->title_dokumen.'</strong><br>

    </div>

    <p></p>

    <strong>A. Keterangan sampel/ media pembawa :</strong><br>

   <table class="table1">



            <tr>

                <td width="10">1.</td>

                <td width="200">Nama Laboratorium</td>

                <td width="10">:</td>

                <td width="300">'.$data2->lab_penguji.'</td>

            </tr>



            <tr>

                <td width="10">2.</td>

                <td width="300">Tanggal Penerimaan Sampel di Laboratorium</td>

                <td width="10">:</td>

                <td width="300">'.$data2->tanggal_penyerahan_lab.'</td>

            </tr>



            ';

                if ($data2->jumlah_sampel > 1) {

                    if ($data2->jumlah_sampel > $num) {
                        
                        $content .='

                            <tr>

                                <td width="10">3.</td>

                                <td width="200">Tanggal Pengujian</td>

                                <td width="10">:</td>

                                ';

                                    if ($data2->tanggal_pengujian == $objectTanggal->tgl_indo(date(substr($data2->waktu_input_hasil, 0, 10)))) {  

                                        $content .= '

                                            <td width="250">'.$data2->tanggal_pengujian.'</td>

                                        ';
                                    }else{

                                        $content .= '

                                        <td width="250">'.$data2->tanggal_pengujian.' - '.$objectTanggal->tgl_indo(date(substr($data2->waktu_input_hasil, 0, 10))).'</td>

                                        ';
                                    }

                                $content .= '

                            </tr>

                        ';

                    }elseif ($data2->jumlah_sampel == $num){



                        $content .='

                            <tr>

                                <td width="10">3.</td>

                                <td width="200">Tanggal Pengujian</td>

                                <td width="10">:</td>

                                ';

                                    if ($data2->tanggal_pengujian == $objectTanggal->tgl_indo(date(substr($data2->waktu_input_hasil, 0, 10)))) {  

                                        $content .= '

                                            <td width="250">'.$data2->tanggal_pengujian.'</td>

                                        ';
                                    }else{

                                        $content .= '

                                        <td width="250">'.$data2->tanggal_pengujian.' - '.$objectTanggal->tgl_indo(date(substr($data2->waktu_input_hasil, 0, 10))).'</td>

                                        ';
                                    }

                                $content .= '

                            </tr>

                        ';

                    }else{


                         $content .='

                            <tr>

                                <td width="10">3.</td>

                                <td width="200">Tanggal Pengujian</td>

                                <td width="10">:</td>

                                <td width="250">'.$data2->tanggal_pengujian.'</td>

                            </tr>

                        ';


                    }

                }else{


                     $content .='

                            <tr>

                                <td width="10">3.</td>

                                <td width="200">Tanggal Pengujian</td>

                                <td width="10">:</td>

                                <td width="250">'.$data2->tanggal_pengujian.'</td>

                            </tr>

                        ';



                }


            $content .='


            <tr>

                <td width="10">4.</td>

                <td width="200">Kode Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data2->kode_sampel.'</td>

            </tr>



            <tr>

                <td width="10">5.</td>

                <td width="200">Media Pembawa</td>

                <td width="10">:</td>

                <td width="200">'.$data2->nama_sampel.'</td>

            </tr>



            <tr>

                <td width="10">6.</td>

                <td width="200">Jenis Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data2->bagian_tumbuhan.''.$data2->vektor.''.$data2->media.'</td>

            </tr>



            <tr>

                <td width="10">7.</td>

                <td width="200">Jumlah Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data2->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data2->satuan.'</td>

            </tr>



            <tr>

                <td width="10" style="vertical-align: text-top">8.</td>

                <td width="200" style="vertical-align: text-top">Target Pengujian</td>

                <td width="10" style="vertical-align: text-top">:</td>

                <td width="300">

                ';



                // Target OPTK Ke 2 Terisi



                    if ($data2->target_optk2 !== '' && $data2->target_optk3 == '') {



                        // Jenis/ Kelompok OPTK Target Pengujian Ke 2 Kosong

                            

                        if ($data2->nama_patogen2 =='') {



                            $content .='



                            <b>'.$data2->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk.' & '.$data2->target_optk2.'</em>)



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian Ke 2 Terisi



                        }else{



                            $content .='



                            <b>'.$data2->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk.'</em>)



                            <br>



                            <b>'.$data2->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk2.'</em>)  



                            ';



                        }



                    // Target OPTK Ke 3 Terisi



                    }elseif($data2->target_optk3 !==''){



                        // Jenis/ Kelompok OPTK Target Pengujian Ke 2 dan ke 3 Kosong 



                        if ($data2->nama_patogen2 =='' && $data2->nama_patogen3 == '') {



                            $content .='



                            <b>'.$data2->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk.', '.$data2->target_optk2.', '.$data2->target_optk3.'</em>)



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian ke 3 Kosong tetapi target pengujian OPTK ke 2 terisi 



                        }elseif($data2->nama_patogen3 =='' && $data2->nama_patogen2 !==''){



                            $content .='



                            <b>'.$data2->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk.'</em>)



                            <br>



                            <b>'.$data2->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk2.' & '.$data2->target_optk3.'</em>)



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian ke 3 Terisi tetapi target pengujian OPTK ke 2 kosong



                        }elseif($data2->nama_patogen3 !== '' && $data2->nama_patogen2 ==''){





                            $content .='



                            <b>'.$data2->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk.', '.$data2->target_optk2.'</em>)



                            <br>



                            <b>'.$data2->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk3.'</em>) 



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian ke 2 dan ke 3 Terisi + target optk 1



                        }else{



                            $content .='



                            <b>'.$data2->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk.'</em>)



                            <br>



                            <b>'.$data2->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk2.'</em>)  



                            <br>


                            <b>'.$data2->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk3.'</em>) 



                            ';



                        }


                    }else{


                        // Hanya 1 Target OPTK terisi

                        $content .='

                        <b>'.$data2->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data2->target_optk.'</em>) 



                        ';



                    }

                $content .='
                   

                </td>

            </tr>

            <tr>

                <td width="10" style="vertical-align: text-top">9.</td>

                <td width="200" style="vertical-align: text-top">Metode Pengujian</td>

                <td width="10" style="vertical-align: text-top">:</td>

                <td width="300">

                ';

                if ($data2->metode_pengujian2 !=='') {

                    $content .='

                    '.$data2->metode_pengujian.'

                <br>'.$data2->metode_pengujian2.'

                    ';

                }elseif($data2->metode_pengujian3 !==''){

                    $content .='

                    '.$data2->metode_pengujian.'

                <br>'.$data2->metode_pengujian2.'

                <br>'.$data2->metode_pengujian3.'

                    ';

                }else{



                    $content .='

                    '.$data2->metode_pengujian.'

                    ';

                }

                $content .= '

                </td>

            </tr>



        </table>

    <br>

    <table class="table2" style="text-align: center;padding-bottom: 30px">

          <tr>

            <th style="width:30%;">Nomor Sampel</th>

            <th style="width:20%;">Identitas Sampel</th>

            <th style="width:50%;">Hasil Pengujian</th>

          </tr>

          ';

            $tampil = $objectPrint->print_pertanggal_sertifikat($id);

            while ($data = $tampil->fetch_object()):                      

            $content .='

          <tr>          

            <td style="width:30%; vertical-align: middle">'.$data->no_sampel.'</td>    

            <td style="width:20%; vertical-align: middle">'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</td> 

            <td style="width:25%;text-align: left; ">&nbsp;&nbsp;'.$data->positif_negatif.'<br>&nbsp;&nbsp;Hasil identifikasi: <br>&nbsp;&nbsp; -&nbsp;<em><b>'.ucfirst($data->hasil_pengujian).'</b></em></td>  

          </tr>

           ';       

            endwhile;

            $content .=' 

    </table>

    <table class="lower" style="top: auto" >

        <tr>
            <td ></td>

            <td style="padding-bottom: 15px; text-align: right"><span style="font-size: 10pt;padding-bottom: 35px"><strong>Lembar Kerja Terlampir *)</strong></span></td>

            <td ></td>

        </tr>


        <tr>

            <td></td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">Sumbawa Besar, '.$data2->tanggal_sertifikat.'</td>

        </tr>


        <tr>

            <td style="width: 215px"></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>

        ';

            if ($ttd["ttd_penyelia_data_teknis"] == 'Tidak' && $ttd["ttd_analis_data_teknis"] == 'Tidak' || $ttd["ttd_penyelia_data_teknis"] == '' || $ttd["ttd_analis_data_teknis"] == '') {

                $content .='

                    <tr>

                        <td style="width: 215px;padding-bottom: 80px;text-align: center">Penyelia</td>

                        <td style="width: 180px"></td>

                        <td style="width: 215px;padding-bottom: 80px;text-align: center">Analis</td>

                    </tr>             

                ';


            }else{



                $content .='

                    <tr>

                        <td style="width: 215px;text-align: center">Penyelia</td>

                        <td style="width: 180px"></td>

                        <td style="width: 215px;text-align: center">Analis</td>

                    </tr>

                    

                ';

            }

        $content .= '
        
        <tr>
            ';

                if ($ttd["ttd_penyelia_data_teknis"] == 'Ya') {

                        $content .='

                        <td style="width: 215px; text-align: center;"><div style="position: relative; z-index: -1; left: -120px"><img src="'.$objectPrint->getScanTtd($data2->nip_penyelia, $data2->nama_penyelia).'" style="width: 100%"></div></td>


                        ';

                }else{

                        $content .='

                        <td style="width: 215px; text-align: center;"></td>
                

                        ';
                }

                $content .='


                <td style="width: 180px"></td>
                

                ';

                if ($ttd["ttd_analis_data_teknis"] == 'Ya') {

                    $content .='

                        <td style="width: 215px;text-align: center"><div style="position: relative; z-index: -1; left: -120px"><img src="'.$objectPrint->getScanTtd($data2->nip_analis, $data2->nama_analis).'" style="width: 100%"></div></td>
      

                        ';

                }else{

                        $content .='

                        <td style="width: 215px; text-align: center;"></td>
   

                        ';
                }


            $content .='

        </tr>

        <tr>

            <td style="width: 215px; text-align: center">('.$data2->nama_penyelia.')</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">('.$data2->nama_analis.')</td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: center"> NIP. '.$data2->nip_penyelia.'</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">NIP. '.$data2->nip_analis.'</td>

        </tr>



        <tr>

            <td style="width: 215px";></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>



    </table>



    <table>

        <tr>

          <td class="ket" style="width: 660px; height:100px; vertical-align: text-top">&nbsp;Keterangan/Simpulan :

            <br><br>&nbsp;'.$data2->ket_kesimpulan.'</td>

        </tr>

    </table>

      <br>

        <small>Ket: *) Coret bila tidak perlu    

        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **) Termasuk Ruang Lingkup Akreditasi   

        </small>

        ';      

        if ($totalID < $num1) {

            $content .= '

                 <div class="html2pdf__page-break2"></div>  

            ';

        }      


endwhile;
   
    $content .='    

</page>

';

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($objectPrint->title_dokumen);

$html2pdf->Output('Data_Teknis.pdf');

require_once('footer.php');


?>