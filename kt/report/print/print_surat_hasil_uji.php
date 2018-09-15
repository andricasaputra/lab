<?php

require_once ('header.php');

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

        border: none;

        height: 1px;

        color: black; 

        background-color: black;

    }


    .lower th td {

       border: 0px;

       width: 100%;

       text-align: center;

       vertical-align: text-top;

    }



    div#logo {

        margin-left: 0px;

    }



     .agenda td {

        border : 0.7px solid black;

        border-collapse: collapse;

        position : absolute;

        margin-top: 30px ;

        margin-left: 330px ;

    }


</style>


<page backtop='.$page->backtop.' mm backleft='.$page->backleft.' mm backright='.$page->backright.' mm backbottom='.$page->backbottom.' mm>

     <page_header> 

        <div id="logo">

        ';

        $no=1;

        if(@$_GET['id'] !== ''){

        $tampil = $objectPrint->tampil(@$_GET['id']);

        $tampil2 = $objectHasil->tampil(@$_GET['id']);

        }else {

            echo "<script>window.close()</script>";

            exit;
        }

        $rtitle = "surat hasil pengujian laboratorium karantina tumbuhan";

        while ($data = $tampil->fetch_object()):

        $bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

        $title = ucwords($rtitle).' | '.$data->no_permohonan;

        $content .='

        <table class="agenda" style="position: absolute; margin-left: 602px; top: 102px; z-index: 1">

            <tr>

                <td style="width:100px; text-align:center; vertical-align: baseline; font-size:11pt;padding-bottom: 2px; padding-top:3px"><b>'.$data->no_agenda.'</b></td>

            </tr>

        </table>


            <span style="position: absolute; margin-top: 10px"><img src="'.$logoskpbiasa.'" width="744px; height:132px"></span>    



        </div>

    </page_header>



    <page_footer>

        <div id="garis">

            <hr width="75%">

            <i>F.5.4.4.3.H; Ter.1;Rev.0; 03/08/2015</i>

        </div>

    </page_footer>


    <div align="center">

        <strong><u>'.strtoupper($rtitle).'</u></strong><br>

        ';

        $ex = explode("/", $data->no_lhu);

        $noex = $ex[0];

        if (empty($noex)) {
            
            $content .= '

                Nomor :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->no_lhu.'&nbsp;, Tanggal: '.$data->tanggal_lhu.'

            ';

        }else{

            $content .= '

                Nomor :&nbsp;'.$data->no_lhu.'&nbsp;, Tanggal: '.$data->tanggal_lhu.'

            ';

        }


        $content .='

    </div>

    <p></p>



    <div>

            Kepada Yth.

            <br>

            <b>'.$data->pemohon.'</b>

            <br>Di '.$data->alamat_pemilik.'

        </div>

        <p>Memenuhi Surat Permohonan Pengujian Laboratorium Saudara No. '.$data->no_permohonan.' tanggal '.$data->tanggal_permohonan.' , bersama ini disampaikan surat hasil pengujian laboratorium terhadap sampel/media pembawa OPT/OPTK dengan identitas sebagai berikut :</p>



    <strong>A. Keterangan sampel/ media pembawa :</strong><br>

    <table class="table1" >



        <tr>

            <td width="10">1.</td>

            <td width="200">Nama sampel/media pembawa</td>

            <td width="10">:</td>

            <td width="300">'.$data->nama_sampel.'</td>

        </tr>



        <tr>

            <td width="10">2.</td>

            <td width="300">Nama Ilmiah</td>

            <td width="10">:</td>

            <td width="300"><em>'.$data->nama_ilmiah.'</em></td>

        </tr>



        <tr>

            <td width="10">3.</td>

            <td width="200">Kode Sampel/media pembawa</td>

            <td width="10">:</td>

            <td width="200">'.$data->kode_sampel.'</td>

        </tr>



        <tr>

            <td width="10">4.</td>

            <td width="200">Pemilik</td>

            <td width="10">:</td>

            <td width="200">'.$data->nama_pemilik.'</td>

        </tr>



        <tr>

            <td width="10">5.</td>

            <td width="200">Jumlah sampel/media pembawa</td>

            <td width="10">:</td>

            <td width="200">'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'</td>

        </tr>



        <tr>

            <td width="10">6.</td>

            <td width="200">Jenis sampel/media pembawa</td>

            <td width="10"></td>

            <td width="200"></td>

        </tr>



        <tr>

            <td width="24">&nbsp;</td>

            <td width="234">

                &middot; Bagian tumbuhan

            </td>

            <td width="18">

                :

            </td>

            <td width="316">';



            if ($data->bagian_tumbuhan == 'Akar') {



                $content .='



                <img src="'.$checkfix.'" style="width: 12px">&nbsp;&nbsp;Akar



                ';

            }else{



                $content .='



                <img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Akar



                ';

            }



            if ($data->bagian_tumbuhan == 'Batang') {



                $content .='



                <span style="margin-left: 32px"><img src="'.$checkfix.'" style="width: 12px">&nbsp;&nbsp;Batang</span>



                ';

            }else{



                $content .='



                <span style="margin-left: 32px"><img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Batang</span>



                ';

            }



            if ($data->bagian_tumbuhan == 'Daun') {



                $content .='



                <span style="margin-left: 10px"><img src="'.$checkfix.'" style="width: 12px">&nbsp;&nbsp;Daun</span>



                ';

            }else{



                $content .='



                <span style="margin-left: 10px"><img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Daun</span>



                ';

            }



            if ($data->bagian_tumbuhan == 'Umbi') {



                $content .='



               <span style="margin-left: 10px"><img src="'.$checkfix.'" style="width: 12px">&nbsp;&nbsp;Umbi</span>



                ';

            }else{



                $content .='



                <span style="margin-left: 10px"><img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Umbi</span>



                ';

            }



            $content .='

                            

            </td>

        </tr>

        <tr>

            <td width="24">&nbsp;</td>

            <td width="234">

                

            </td>

            <td width="18">

            

            </td>

            <td width="316">

            ';

            if ($data->bagian_tumbuhan == 'Buah') {



                $content .='



               <img src="'.$checkfix.'" style="width: 12px">&nbsp;&nbsp;Buah



                ';

            }else{



                $content .='



                <img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Buah



                ';

            }



            if ($data->bagian_tumbuhan == 'Seluruh Bagian Tanaman') {



                $content .='



               <span style="margin-left: 28px"><img src="'.$checkfix.'" style="width: 12px">&nbsp;&nbsp;Seluruh bag tanaman</span>



                ';

            }else{



                $content .='



                <span style="margin-left: 28px"><img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Seluruh bag tanaman</span>



                ';

            }



            $content .='

                        

            </td>

        </tr>

        <tr>

            <td width="24">&nbsp;</td>

            <td width="234">

            </td>

            <td width="18">

            </td>

            <td width="316">

            ';

            if ($data->bagian_tumbuhan == 'Biji/Benih') {



                $content .='



                <img src="'.$checkfix.'" style="width: 12px">&nbsp;&nbsp;Biji/Benih



                ';

            }else{



                $content .='



                <img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Biji/Benih



                ';

            }



            if ($data->bagian_tumbuhan == 'Bagian Lain') {



                $content .='



                <span style="margin-left: 4px"><img src="'.$checkfix.'" style="width: 12px">&nbsp;&nbsp;Bagian Lain : ...............</span>



                ';

            }else{



                $content .='



                <span style="margin-left: 4px"><img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Bagian Lain : ...............</span>



                ';

            }



            $content .='

                 

                 

            </td>

        </tr>

            <tr>

                <td width="24">&nbsp;</td>

                <td width="234">

                    &middot; Media

                </td>

                <td width="18">

                    :

                </td>

                <td width="316">

                      <img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Tanah

                     <span style="margin-left: 18px"> <img src="'.$boxfix.'" style="width: 12px">&nbsp;&nbsp;Lainnya: ...............</span>

                    

                </td>

            </tr>

        <tr>

            <td width="10"></td>

            <td width="200">&middot; Vektor/Inang/Spesimen</td>

            <td width="10">:</td>

            <td width="200">'.$data->vektor.'</td>

        </tr>



        <tr>

            <td width="10" style="vertical-align: text-top">7.</td>

            <td width="200"  style="vertical-align: text-top">Tanggal penerimaan sampel/ <br>media pembawa di laboratorium</td>

            <td width="10"  style="vertical-align: text-top">:</td>

            <td width="200"  style="vertical-align: text-top">'.$data->tanggal_penyerahan.'</td>

        </tr>



    </table>

    <br>



    <strong>B. Hasil Pengujian :</strong><br>

    <table class="table2" style="text-align: center">

          <tr>

            <th style="width:5%;" >No</th>

            <th style="width:13%;">Nomor Sampel</th>

            <th style="width:15%;">Identitas Sampel</th>

            <th style="width:25%;" >Target Pengujian</th>

            <th style="width:15%;">Metode Pengujian</th>

            <th style="width:27%;">Hasil Pengujian*)</th>

          </tr>

          ';

            while ($data2 =$tampil2->fetch_object()):

          $content .='

          <tr>

            

            <td style="width:5%;">'.$no++.'</td>

            <td style="width:13%;">'.$data2->no_sampel.'</td>    

            <td style="width:15%;">'.$data2->bagian_tumbuhan.''.$data2->vektor.''.$data2->media.'</td>

            <td style="width:25%;"><em>'.$data2->target_optk.'<br>'.$data2->target_optk2.'<br>'.$data2->target_optk3.'</em></td>

            <td style="width:15%;">';



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



               $dicari = $data2->hasil_pengujian;
                $butuh = ',';

                $cari = strpos($dicari, $butuh);

                if ($cari == true) {

                    $content .= '

                    </td>    

                    <td style="width:27%; text-align: left">&nbsp;&nbsp;'.$data2->positif_negatif.'<br>&nbsp;&nbsp;Hasil identifikasi: <br>&nbsp;&nbsp; -&nbsp;<em><b>'.ucfirst(str_replace(",", ",<br/> &nbsp;&nbsp;&nbsp;-", $dicari)).'</b></em></td>  

                    ';
                    
                }else{

                    $content .= '

                    </td>    

                    <td style="width:27%; text-align: left">&nbsp;&nbsp;'.$data2->positif_negatif.'<br>&nbsp;&nbsp;Hasil identifikasi: <br>&nbsp;&nbsp; -&nbsp;<em><b>'.ucfirst($data2->hasil_pengujian).'</b></em></td>  

                    ';
                     
                }


                $content .= '

          </tr>


          ';   


            endwhile;

          $content .='

    </table>


    <table class="lower" style="text-align: center;">

        <tr>

            <td style=" text-align: left"><span style="font-size: 8pt;padding-bottom: 20px">*) Hanya untuk sampel yang diuji</span></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>


        <tr>

            <td style="text-align: left"><b>C. Simpulan Hasil Pengujian :</b></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>


        <tr>

            <td style="text-align: left; padding-left: 17px"><em><b>'.$data->ket_kesimpulan.'</b></em></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>

    </table>



    <table>

        <tr>

            <td>Terlampir kami sampaikan sertifikat hasil pengujian dari laboratorium Karantina Tumbuhan.<br>Demikian disampaikan sebagai bahan pertimbangan lebih lanjut</td>

        </tr>


    </table>

    <table>

         <tr>

            <td style="width: 215px;"></td>

            <td style="width: 180px"></td>

            <td style="width: 215px;"></td>

        </tr>


        <tr>

            <td style="width: 215px; padding-bottom: 60px"></td>

            <td style="width: 180px"></td>

            ';


            if ($data->kepala_plh2 == 'drh. Ida Bagus Putu Raka Ariana') {



                $content .='



                <td style="width: 215px; padding-bottom: 60px">Mengetahui, <br> Kepala<span style="text-decoration: line-through;">/Plh.</span>**)</td>



                ';



            }else{



                $content .='



                <td style="width: 215px; padding-bottom: 60px">Mengetahui, <br>Plh Kepala**)</td>



                ';



            }



            $content .='

            

        </tr>





        <tr>

            <td style="width: 215px"></td>

            <td style="width: 180px"></td>

            <td style="width: 215px">('.$data->kepala_plh2.')</td>

        </tr>



        <tr>

            <td style="width: 215px></td>

            <td style="width: 180px"></td>

            <td style="width: 215px">NIP. '.$data->nip_kepala_plh2.'</td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: left; padding-top: 1px;"><span style="font-size: 7pt">**)Coret yang tidak perlu</span></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>



    </table>       

        '; 

$a = $data->nama_sampel;

$b = $data->tanggal_lhu;


endwhile;

                 
    $content .='    


</page>



';


require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en', 'UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Surat_Hasil_Pengujian'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');



?>