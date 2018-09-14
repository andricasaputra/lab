<?php

session_start();

require_once ('header.php');

$tanggal = $objectTanggal->tgl_indo(date('Y-m-d'));

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

       padding:  5px 0px;

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

</style>

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="10mm">

     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src='.$logo.' width="698px; height:150px"></strong>

        </div>

    </page_header>



    <page_footer>

        <div id="garis">

            <hr width="75%">

        </div>

    </page_footer>

     ';



$no=1;

            

if(@$_GET['id'] && $_GET['no_sertifikat'] !== ''){

    $tampil = $objectPrint->tampil(@$_GET['id'], @$_GET['no_sertifikat']);

    $tampil2 =$objectPrint->tampilHasil(@$_GET['id']);

    $ttd = $objectPrint->scan(@$_GET['id']);

}else {

    if(@$_SESSION['loginadminkh']) {

        echo "<script>alert('No Sertifikat Belum Diisi!')

        window.location='../admin.php?page=sertifikat'</script>";

    }else {

        echo "<script>alert('No Sertifikat Belum Diisi!')

        window.location='../pengujian.php?page=sertifikat'</script>";

    }

    exit;

}

$rtitle = "hasil pengujian laboratorium karantina hewan";

while ($data=$tampil->fetch_object()):

    $title = ucwords($rtitle).' | '.$data->no_sertifikat;



$content .= '





    <div align="center">

        <strong><u>'.strtoupper($rtitle).'</u></strong><br>

        Nomor : '.$data->no_sertifikat.'

    </div>

    <p></p>



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

            <td width="200">Kode Sampel/media pembawa</td>

            <td width="10">:</td>

            <td width="200">'.$data->kode_sampel.'</td>

        </tr>



        <tr>

            <td width="10">3.</td>

            <td width="200">Jumlah sampel/media pembawa</td>

            <td width="10">:</td>

            <td width="200">'.$data->jumlah_sampel.'</td>

        </tr>



        <tr>

            <td width="10">4.</td>

            <td width="200">Jenis sampel/media pembawa</td>

            <td width="10"></td>

            <td width="200"></td>

        </tr>



        <tr>

            <td width="24">&nbsp;</td>

            <td width="234">

                &middot; Bagian Hewan

            </td>

            <td width="18">

                :

            </td>

            <td width="316">

                ';


                    if (strpos($data->nama_sampel, "Serum") !== false) {

                        $content .='

                            <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Serum

                        ';

                    }else{

                        $content .='

                            <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Serum

                        ';

                    }



                    if (strpos($data->nama_sampel, "Darah") !== false) {

                        $content .='

                            <span style="margin-left: 25px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Darah</span>

                        ';

                    }else{

                        $content .='

                            <span style="margin-left: 25px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Darah</span>

                        ';

                    }



                    if (strpos($data->nama_sampel, "Urine") !== false) {

                        $content .='

                            <span style="margin-left: 10px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Urine</span>

                        ';

                    }else{

                        $content .='

                            <span style="margin-left: 10px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Urine</span>

                        ';

                    }



                    if (strpos($data->nama_sampel, "Feses") !== false) {

                        $content .='

                            <span style="margin-left: 10px"><img src='.$checkfix.'  style="width: 15px">&nbsp;&nbsp;Feses</span>

                        ';

                    }else{

                        $content .='

                            <span style="margin-left: 10px"><img src='.$boxfix.'  style="width: 15px">&nbsp;&nbsp;Feses</span>

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



                    if (strpos($data->nama_sampel, "Kadaver") !== false) {

                        $content .='

                            <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Kadaver

                        ';

                    }else{

                        $content .='

                            <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Kadaver

                        ';

                    }



                    if (strpos($data->nama_sampel, "Swab") !== false) {

                        $content .='

                            <span style="margin-left: 15px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Swab</span>

                        ';

                    }else{

                        $content .='

                            <span style="margin-left: 15px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Swab</span>

                        ';

                    }



                    if (strpos($data->nama_sampel, "Organ") !== false) {

                        $content .='

                            <span style="margin-left: 12px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Organ</span>

                        ';

                    }else{

                        $content .='

                            <span style="margin-left: 12px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Organ</span>

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

                    if (strpos($data->nama_sampel, "Eksudat") !== false) {

                        $content .='

                            <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Eksudat ......................

                        ';

                    }else{

                        $content .='

                            <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Eksudat ......................

                        ';

                    }



                    if (strpos($data->nama_sampel, "Kerokan Kulit") !== false) {

                        $content .='

                            <span style="margin-left: 3px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Kerokan Kulit</span>

                        ';

                    }else{

                        $content .='

                            <span style="margin-left: 3px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Kerokan Kulit</span>

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

                    :

                </td>

                <td width="316">

                ';

                if (strpos($data->nama_sampel, "Kulit") !== false) {

                        $content .='

                            <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Kulit

                        ';

                    }else{

                        $content .='

                            <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Kulit

                        ';

                    }



                if (strpos($data->nama_sampel, "Bagian Lain") !== false) {

                        $content .='

                            <span style="margin-left: 39px"><img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Bagian Lain : ...............</span>

                        ';

                    }else{

                        $content .='

                            <span style="margin-left: 39px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Bagian Lain : ...............</span>

                        ';

                    }



                $content .='

                </td>
        </tr>


        <tr>

            <td width="10"></td>

            <td width="200">&middot; Jenis Media Transport</td>

            <td width="10">:</td>

            <td width="200">-</td>

        </tr>



        <tr>

            <td width="10" style="vertical-align: text-top">5.</td>

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

            <th style="width:25%;">Target Pengujian</th>

            <th style="width:10%;">Metode Pengujian</th>

            <th style="width:27%;">Hasil Pengujian*)</th>

          </tr>



          ';


            while ($data2 = $tampil2->fetch_object()):

                if (!empty($data->target_pengujian3)) :
                   
                

          $content .='

              <tr>

            
                <td style="width:5%; vertical-align: middle" rowspan="2">'.$no++.'</td>

                <td style="width:13%; vertical-align: middle"  rowspan="2">'.$data2->no_sampel.'</td>    

                <td style="width:15%; vertical-align: middle"  rowspan="2">'.$data->nama_sampel.'</td>

                <td style="width:20%;"><em>'.$data->target_pengujian2.'</em></td>

                <td style="width:16%;"> '.$data->metode_pengujian.' </td> 


                <td style="width:23%;">

                <b>'.$data2->positif_negatif.'</b>
                

                </td>  

              </tr>

              <tr>


                <td style="width:20%;border-left: none; "><em>'.$data->target_pengujian3.'</em></td>

                <td style="width:16%; "> '.$data->metode_pengujian.' </td> 

                <td style="width:23%;">

                <b> '.$data2->positif_negatif_target3.'</b>
                

                </td>  

              </tr>


              ';

            else :

                $content .='

              <tr>

            
                <td style="width:5%;>'.$no++.'</td>

                <td style="width:13%;>'.$data2->no_sampel.'</td>    

                <td style="width:15%;>'.$data->nama_sampel.'</td>

                <td style="width:20%;"><em>'.$data->target_pengujian2.'</em></td>

                <td style="width:16%;"> '.$data->metode_pengujian.' </td> 


                <td style="width:23%;">

                <b>'.$data2->positif_negatif.'</b>
                
                </td>  

              </tr>


              ';

            endif;

            endwhile;

          $content .='



    </table>

    

    <table class="lower" style="text-align: center;">



        <tr>

            <td style="text-align: left"><span style="font-size: 8pt;padding-bottom: 35px">*) Hanya untuk sampel yang diuji</span></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>





        <tr>

            <td style="padding-bottom: 15px">Keterangan : '.$data->rekomendasi.'</td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>



        <tr>

            <td></td>

            <td style="width: 100px"></td>

            <td style="width: 250px">Sumbawa Besar, '.$data->tanggal_sertifikat.'</td>

        </tr>



        <tr>

            <td style="width: 215px">Mengetahui,</td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>



        <tr>

            <td style="width: 215px">Penyelia Laboratorium</td>

            <td style="width: 180px"></td>

            <td style="width: 215px">Analis</td>

        </tr>


        <tr>

            ';


                if ($ttd["ttd_penyelia_hasil_uji"] == 'Ya') {
                    

                    $content .='

                        <td style="width: 215px"><img src='.$basepath.$objectPrint->gambar($data->nama_penyelia).' style="width: 90%;"></td>

                    ';
                    
                }else{


                    $content .='

                        <td style="width: 215px; padding-bottom: 70px"></td>

                    ';

                }



            $content .='


            <td style="width: 180px"></td>

            ';


                if ($ttd["ttd_analis_data_teknis"] == 'Ya') {
                    

                    $content .='

                        <td style="width: 215px"><img src='.$basepath.$objectPrint->gambar($data->nama_analis).' style="width: 90%;"></td>

                    ';
                    
                }else{


                    $content .='

                        <td style="width: 215px; padding-bottom: 70px"></td>

                    ';

                }



            $content .='



        </tr>


        <tr>

            <td style="width: 215px">('.$data->nama_penyelia.')</td>

            <td style="width: 180px"></td>

            <td style="width: 215px">('.$data->nama_analis.')</td>

        </tr>



        <tr>

            <td style="width: 215px> NIP. '.$data->nip_penyelia.'</td>

            <td style="width: 180px"></td>

            <td style="width: 215px">NIP. '.$data->nip_analis.'</td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: left; padding-top: 10px;"><span style="font-size: 7pt">**) Coret yang tidak perlu</span></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>

    </table>


    <table>

        <tr>

            <td style="width: 615px; text-align: left; padding-top: 10px; font-size: 9pt; line-height: 1.2;">
               <i> <b>Catatan : </b>
                <ol>
                    <li style="padding-bottom: 5px">Hasil pemeriksaan pengujian sampel ini hanya berlaku untuk sampel yang diuji</li>
                    <li>Hasil laporan pengujian contoh ini hanya berlaku terhadap contoh yang diuji dan hasil laporan pengujian ini tidak boleh digandakan tanpa persetujuan tertulis dari Kepala Stasiun Karantina Pertanian Kelas I Sumbawa Besar</li>
                </ol></i>
            </td>


        </tr>



    </table> ';

$a = $data->nama_sampel;

$b = $data->tanggal_sertifikat; 

endwhile;

$content .='    

</page>

';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Sertifikat_Pengujian'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');



?>