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

       height : 150%;

       vertical-align: text-top;
    }


    .ket {

        border : 0.7px solid;

        border-collapse: collapse;

    }


</style>

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="15mm">



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


    $no=1;


    if(@$_GET['id'] !== '' && $_GET['no_sampel'] !== ''){

        $tampil  = $objectPrint->print_data_teknis(@$_GET['id']);

        $tampil2 = $objectPrint->cetak2(@$_GET['id']);

        $qu2 = $objectHasil->input_ulang(@$_GET['id']);

        $num = $qu2->num_rows;

        $ttd = $objectPrint->scan(@$_GET['id']);

        }else {

            if(@$_SESSION['loginadminkt']) {

                echo "<script>alert('Nomor Sampel Masih Kosong!')

                window.location='../admin.php?page=data_teknis'</script>";

            }else {

                echo "<script>alert('Nomor Sampel Masih Kosong!')

                window.location='../pengujian.php?page=data_teknis'</script>";

            }

        exit;

        }

        while ($data=$tampil->fetch_object()):

            $title = $objectPrint->title_dokumen.' | '.$data->kode_sampel;

            $bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

$content .= '





    <div align="center">

        <strong>'.$objectPrint->title_dokumen.'</strong><br>

    </div>

    <p></p>



    <strong>A. Keterangan sampel/ media pembawa :</strong><br>

   <table class="table1">



            <tr>

                <td width="10">1.</td>

                <td width="200">Nama Laboratorium</td>

                <td width="10">:</td>

                <td width="300">'.$data->lab_penguji.'</td>

            </tr>



            <tr>

                <td width="10">2.</td>

                <td width="300">Tanggal Penerimaan Sampel di Laboratorium</td>

                <td width="10">:</td>

                <td width="300">'.$data->tanggal_penyerahan_lab.'</td>

            </tr>

            ';

                if ($data->jumlah_sampel > 1) {

                    if ($data->jumlah_sampel > $num) {
                        
                        $content .='

                            <tr>

                                <td width="10">3.</td>

                                <td width="200">Tanggal Pengujian</td>

                                <td width="10">:</td>

                                ';

                                    if ($data->tanggal_pengujian == $objectTanggal->tgl_indo(date(substr($data->maxwaktu, 0, 10)))) {  

                                        $content .= '

                                            <td width="250">'.$data->tanggal_pengujian.'</td>

                                        ';
                                    }else{

                                        $content .= '

                                        <td width="250">'.$data->tanggal_pengujian.' - '.$objectTanggal->tgl_indo(date(substr($data->maxwaktu, 0, 10))).'</td>

                                        ';
                                    }

                                $content .= '

                            </tr>

                        ';

                    }elseif ($data->jumlah_sampel == $num){



                        $content .='

                            <tr>

                                <td width="10">3.</td>

                                <td width="200">Tanggal Pengujian</td>

                                <td width="10">:</td>

                                ';

                                    if ($data->tanggal_pengujian == $objectTanggal->tgl_indo(date(substr($data->maxwaktu, 0, 10)))) {  

                                        $content .= '

                                            <td width="250">'.$data->tanggal_pengujian.'</td>

                                        ';
                                    }else{

                                        $content .= '

                                        <td width="250">'.$data->tanggal_pengujian.' - '.$objectTanggal->tgl_indo(date(substr($data->maxwaktu, 0, 10))).'</td>

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

                                <td width="250">'.$data->tanggal_pengujian.'</td>

                            </tr>

                        ';


                    }

                }else{


                     $content .='

                            <tr>

                                <td width="10">3.</td>

                                <td width="200">Tanggal Pengujian</td>

                                <td width="10">:</td>

                                <td width="250">'.$data->tanggal_pengujian.'</td>

                            </tr>

                        ';



                }


            $content .='


            <tr>

                <td width="10">4.</td>

                <td width="200">Kode Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data->kode_sampel.'</td>

            </tr>



            <tr>

                <td width="10">5.</td>

                <td width="200">Media Pembawa</td>

                <td width="10">:</td>

                <td width="200">'.$data->nama_sampel.'</td>

            </tr>



            <tr>

                <td width="10">6.</td>

                <td width="200">Jenis Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</td>

            </tr>



            <tr>

                <td width="10">7.</td>

                <td width="200">Jumlah Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'</td>

            </tr>



            <tr>

                <td width="10" style="vertical-align: text-top">8.</td>

                <td width="200" style="vertical-align: text-top">Target Pengujian</td>

                <td width="10" style="vertical-align: text-top">:</td>

                <td width="300">

                ';



                // Target OPTK Ke 2 Terisi



                    if ($data->target_optk2 !== '' && $data->target_optk3 == '') {



                        // Jenis/ Kelompok OPTK Target Pengujian Ke 2 Kosong

                            

                        if ($data->nama_patogen2 =='') {



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.' & '.$data->target_optk2.'</em>)



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian Ke 2 Terisi



                        }else{



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



                            <br>



                            <b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.'</em>)  



                            ';



                        }



                    // Target OPTK Ke 3 Terisi



                    }elseif($data->target_optk3 !==''){



                        // Jenis/ Kelompok OPTK Target Pengujian Ke 2 dan ke 3 Kosong 



                        if ($data->nama_patogen2 =='' && $data->nama_patogen3 == '') {



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.', '.$data->target_optk2.', '.$data->target_optk3.'</em>)



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian ke 3 Kosong tetapi target pengujian OPTK ke 2 terisi 



                        }elseif($data->nama_patogen3 =='' && $data->nama_patogen2 !==''){



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



                            <br>



                            <b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.' & '.$data->target_optk3.'</em>)



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian ke 3 Terisi tetapi target pengujian OPTK ke 2 kosong



                        }elseif($data->nama_patogen3 !== '' && $data->nama_patogen2 ==''){





                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.', '.$data->target_optk2.'</em>)



                            <br>



                            <b>'.$data->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk3.'</em>) 



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian ke 2 dan ke 3 Terisi + target optk 1



                        }else{



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



                            <br>



                            <b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.'</em>)  



                            <br>



                            <b>'.$data->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk3.'</em>) 



                            ';



                        }



                    }else{



                        // Hanya 1 Target OPTK terisi



                        $content .='



                        <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>) 



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



                if ($data->metode_pengujian2 !=='') {

                    $content .='



                    '.$data->metode_pengujian.'

                <br>'.$data->metode_pengujian2.'



                    ';

                }elseif($data->metode_pengujian3 !==''){



                    $content .='



                    '.$data->metode_pengujian.'

                <br>'.$data->metode_pengujian2.'

                <br>'.$data->metode_pengujian3.'



                    ';



                }else{



                    $content .='



                    '.$data->metode_pengujian.'



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



            while ($data2 =$tampil2->fetch_object()):



          $content .='

          <tr>

            

            <td style="width:30%; vertical-align: middle">'.$data2->no_sampel.'</td>    

            <td style="width:20%; vertical-align: middle">'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</td> 

            <td style="width:25%; text-align: left; ">&nbsp;&nbsp;'.$data2->positif_negatif.'<br>&nbsp;&nbsp;Hasil identifikasi: <br>&nbsp;&nbsp; -&nbsp;<em><b>'.ucfirst($data2->hasil_pengujian).'</b></em></td>  

          </tr>





          ';   



            endwhile;



          $content .='



    </table>

    

    <table class="lower" style="top: auto" >



        <tr>

            

            <td></td>

            <td style="padding-bottom: 15px; text-align: right"><span style="font-size: 10pt;padding-bottom: 35px"><strong>Lembar Kerja Terlampir *)</strong></span></td>

            <td></td>

            

        </tr>



        <tr>

            <td></td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">Sumbawa Besar, '.$data->tanggal_sertifikat.'</td>

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


                                <td style="width: 215px; text-align: center;"><div style="position: relative; z-index: -1; left: -120px"><img src="'.$objectPrint->getScanTtd($data->nip_penyelia, $data->nama_penyelia).'" style="width: 100%;"></div></td>
  

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

                                <td style="width: 215px;text-align: center"><div style="position: relative; z-index: -1; left: -120px"><img src="'.$objectPrint->getScanTtd($data->nip_analis, $data->nama_analis).'" style="width: 100%;"></div></td>


                        ';

                }else{

                        $content .='


                                <td style="width: 215px; text-align: center;"></td>

                        

                    ';
                }


            $content .='

        </tr>

        <tr>

            <td style="width: 215px; text-align: center">('.$data->nama_penyelia.')</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">('.$data->nama_analis.')</td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: center"> NIP. '.$data->nip_penyelia.'</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">NIP. '.$data->nip_analis.'</td>

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

            <br><br>&nbsp;'.$data->ket_kesimpulan.'</td>

        </tr>

    </table>

        <br>

        Ket: *) coret bila tidak perlu    

       

        ';



$a = $data->tanggal_sertifikat;

$b = $data->nama_sampel; 

endwhile;

                 

    $content .='    

</page>

';


$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Data_Teknis'.'_'.$b.'_'.$a.'.pdf');

require_once('footer.php');


?>