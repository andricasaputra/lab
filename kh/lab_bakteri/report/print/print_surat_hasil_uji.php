<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0], 'kh');

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

       padding:  5px 5px;

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

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="15mm">

     <page_header> 

        <div id="logo">

        ';

        if(@$_GET['id'] !== ''){

        $tampil  = $objectPrint->tampil(@$_GET['id']);

        if (strpos($_GET['nama_sampel'], 'Bibit')  !== false) {

        $tampil2 = $objectPrint->tampilHasilBibit(@$_GET['id']);

        }else{

            $tampil2 = $objectPrint->tampilHasil(@$_GET['id']);
        }

        }else {

            if(@$_SESSION['loginadminkh']) {

                echo "<script>alert('Nomor Surat Hasil Uji Belum Diisi!')

                window.location='../admin.php?page=surat_hasil_uji'</script>";

            }else {

                echo "<script>alert('Nomor Surat Hasil Uji Belum Diisi!')

                window.location='../index.php?page=surat_hasil_uji'</script>";

            }

        exit;

        }

        $no =1;

        while ($data=$tampil->fetch_object()):

            $title = $objectPrint->title_dokumen.' | '.$data->no_permohonan;

            $pejabat = $objectPrint->getPejabat($data->nip_kepala_plh2);

        $content .='

        <table class="agenda" style="position: absolute; margin-left: 602px; top: 102px;">

            <tr>

                <td style="width:100px; text-align:center; vertical-align: baseline; font-size:11pt;padding-bottom: 2px; padding-top:3px"><b>'.$data->no_agenda.'</b></td>

            </tr>

        </table>

        ';

        $content .='

            <span style="position: absolute; margin-top: 10px"><img src='.$logoskpbiasa.' width="744px; height:132px"></span>    

        </div>

    </page_header>


    <page_footer>

        <hr width="75%">

        <table>
            <tr>
                <td style="width: 650">
                       <i>'.$objectPrint->kode_dokumen.'</i> 
                </td>
                <td style="style="width: 500px", text-align: right">
                       <strong><img src='.$logokanbaru.' width="100px; height:150px"></strong>

                </td>
            </tr>
        </table>

    </page_footer>

     ';



$content .= '





    <div align="center">

        <strong><u>'.$objectPrint->title_dokumen.'</u></strong><br>

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

            <b>Pj. Wilker Pelabuhan Laut Badas</b>

            <br>di Sumbawa Besar

        </div>

        <p>Memenuhi Surat Permohonan Pengujian Laboratorium Saudara No. '.$data->no_permohonan.' tanggal '.$data->tanggal_permohonan.' , bersama ini disampaikan surat hasil pengujian laboratorium terhadap sampel/media pembawa HPH/HPHK dengan identitas sebagai berikut :</p>



    <strong>A. Keterangan sampel/ media pembawa :</strong><br><br>

    <table class="table1" >



        <tr>

            <td width="10">1.</td>

            <td width="200">Nama sampel/media pembawa</td>

            <td width="10">:</td>

            <td width="300">'.$data->nama_sampel.'</td>

        </tr>



        <tr>

            <td width="10">2.</td>

            <td width="300">Pemilik</td>

            <td width="10">:</td>

            <td width="300">'.$data->nama_pemilik.'</td>

        </tr>



        <tr>

            <td width="10">3.</td>

            <td width="200">Kode Sampel/media pembawa</td>

            <td width="10">:</td>

            <td width="200">'.$data->kode_sampel.'</td>

        </tr>



        <tr>

            <td width="10">4.</td>

            <td width="200">Jumlah sampel/media pembawa</td>

            <td width="10">:</td>

            <td width="200">'.$data->jumlah_sampel.'</td>

        </tr>



        <tr>

            <td width="10">5.</td>

            <td width="200">Jenis sampel/media pembawa</td>

            <td width="10"></td>

            <td width="200"></td>

        </tr>



        <tr>

            <td width="24">&nbsp;</td>

            <td width="234">

                &bull; Bagian Hewan

            </td>

            <td width="18">

                :

            </td>

            <td width="316">';



            if (strpos($data->nama_sampel_lab, "Serum") !== false) {



                $content .='



                <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Serum



                ';

            }else{



                $content .='



                <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Serum



                ';

            }



            if (strpos($data->nama_sampel_lab, "Darah") !== false) {



                $content .='



                <span style="margin-left: 20px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Darah</span>



                ';

            }else{



                $content .='



                <span style="margin-left: 20px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Darah</span>



                ';

            }

            $content .='

            
            </td>
        </tr>

        <tr>


            <td width="24">&nbsp;</td>

            <td width="234">

                &bull; Jenis media transport

            </td>

            <td width="18">

                :

            </td>

            <td width="316">

            </td>
        </tr>



        <tr>

            <td width="10" style="vertical-align: text-top">6.</td>

            <td width="200"  style="vertical-align: text-top">Tanggal penerimaan sampel/ <br>media pembawa di laboratorium</td>

            <td width="10"  style="vertical-align: text-top">:</td>

            <td width="200"  style="vertical-align: text-top">'.$data->tanggal_penyerahan_lab.'</td>

        </tr>

        <tr>

            <td width="10" style="vertical-align: text-top">7.</td>

            <td width="200"  style="vertical-align: text-top">Tanggal pemeriksaan sampel/ <br>media pembawa di laboratorium</td>

            <td width="10"  style="vertical-align: text-top">:</td>

            <td width="200"  style="vertical-align: text-top">'.$data->tanggal_pengujian.'</td>

        </tr>

    </table>

    <br>



    <strong>B. Hasil Pengujian :</strong><br><br>

    <table class="table2" style="text-align: center; vertical-align: text-top;">

          <tr>

            <th style="width:5%;" >No</th>

            <th style="width:23%;" colspan="2">Jenis sampel/media pembawa</th>

            <th style="width:25%;" >Target Pengujian</th>

            <th style="width:27%;">Metode Pengujian</th>

            <th style="width:20%;">Hasil Pengujian*)</th>

          </tr>



          ';



            while ($data2 =$tampil2->fetch_object()):



          $content .='

          <tr>

            <td style="width:5%;">'.$no++.'</td>

            <td style="width:19%;border-right: 0px">'.$data->nama_sampel_lab.'</td>    

            <td style="width:8%;">
            ';

                if (strpos($_GET['nama_sampel'], 'Bibit')  !== false) {

                   $content .= '

                    '.$data2->no_sampel_bibit.'

                   ';

                }else{

                    $content .= '

                    '.$data2->no_sampel.'

                   ';
                }

                $content .='
            </td>

            <td style="width:20%;"><em>'.$data->target_pengujian2.'</em></td>

            ';
                if ($data->metode_pengujian == 'RBT') {

                    $content .='

                        <td style="width:27%;">Rose Bengal Test ('.$data->metode_pengujian.') </td> 

                    ';

                }else{

                    $content .='

                        <td style="width:27%;">'.$data->metode_pengujian.' </td> 

                    ';

                }

            $content .='   

            

            ';
                if ($data2->positif_negatif == 'Negatif') {
                    
                    $content .='

                        <td style="width:20%;">'.$data2->positif_negatif.'&nbsp;(-)</td>  

                    ';

                }else{

                    $content .='

                        <td style="width:20%;">'.$data2->positif_negatif.'&nbsp;(+)</td>  

                    ';

                }

            $content .='   

            
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

            <td style="padding-bottom: 4px; text-align: left"><b>C. Simpulan Hasil Pengujian :</b></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>



         <tr>

            <td style="padding-bottom: 4px; text-align: left; padding-left: 17px"><em><b>'.$data->ket_kesimpulan.'</b></em></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>







    </table>



    <table>

        <tr>

            <td>Terlampir kami sampaikan sertifikat hasil pengujian dari laboratorium Karantina Hewan.<br>Demikian disampaikan sebagai bahan pertimbangan lebih lanjut</td>

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

            if ($pejabat->jabatan != 'Kepala Stasiun') {

                $content .='

                <td style="width: 250px; padding-bottom: 60px">Plh. Kepala Stasiun<br>' . $pejabat->jabatan .'</td>
                ';

            }else{

                $content .='

                <td style="width: 215px; padding-bottom: 60px">Kepala Stasiun <br></td>

                ';

            }

            $content .='

        </tr>

        <tr>

            <td style="width: 215px"></td>

            <td style="width: 180px"></td>

            <td style="width: 215px">'.$data->kepala_plh2.'</td>

        </tr>



        <tr>

            <td style="width: 215px></td>

            <td style="width: 180px"></td>

            <td style="width: 215px">NIP. '.$data->nip_kepala_plh2.'</td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: left; padding-top: 1px;"><span style="font-size: 7pt">Ket: **)Coret yang tidak perlu</span></td>

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

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Surat_Hasil_Pengujian'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');



?>