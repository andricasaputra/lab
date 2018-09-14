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

       padding:  17px 5px;

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

 

 

</style>

';



$content .= '

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="15mm">



     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src='.$logo.' width="698px; height:150px"></strong>

        </div>

    </page_header>


    <page_footer>

        <div id="garis">

            <hr width="75%">

            <i>F.5.4.4.1; Ter.1; Rev.0; 03/08/2015</i>

        </div>

    </page_footer>

     ';

$no=1;
              
if(@$_GET['id'] && $_GET['no_sampel'] !== ''){

    $tampil = $objectPrint->tampil(@$_GET['id']);

    $tampil2 = $objectHasil->tampil(@$_GET['id']);

    $ttd = $objectPrint->scan(@$_GET['id']);

}else {

    if(@$_SESSION['loginadminkh']) {

        echo "<script>alert('Nomor Sampel Masih Kosong!')

        window.location='../admin.php?page=data_teknis'</script>";

    }else {

        echo "<script>alert('Nomor Sampel Masih Kosong!')

        window.location='../pengujian.php?page=data_teknis'</script>";

    }

    exit;

}

$rtitle = "data teknis hasil pengujian laboratorium karantina hewan";

while ($data=$tampil->fetch_object()):

    $title = ucwords($rtitle).' | '.$data->kode_sampel;

    if (strpos($data->nama_sampel, "Darah") !== false) {

        $namaSampel = $data->nama_sampel_lab;
        $mp = str_replace("Darah", "", $data->nama_sampel);

    }else{

        $namaSampel = $data->nama_sampel_lab;
        $mp = $data->bagian_hewan;
    }


            

$content .= '





    <div align="center">

        <strong>'.strtoupper($rtitle).'</strong><br>

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



            <tr>

                <td width="10">3.</td>

                <td width="200">Tanggal Pengujian</td>

                <td width="10">:</td>

                <td width="200">'.$data->tanggal_pengujian.'</td>

            </tr>



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

                <td width="200">'.$mp.'</td>

            </tr>



            <tr>

                <td width="10">6.</td>

                <td width="200">Jenis Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$namaSampel.'</td>

            </tr>



            <tr>

                <td width="10">7.</td>

                <td width="200">Jumlah Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data->jumlah_sampel.'</td>

            </tr>



            <tr>

                <td width="10" style="vertical-align: text-top">8.</td>

                <td width="200" style="vertical-align: text-top">Target Pengujian</td>

                <td width="10" style="vertical-align: text-top">:</td>

                <td width="300"> <em>'.$data->target_pengujian2.'</em></td>

            </tr>



            <tr>

                <td width="10" style="vertical-align: text-top">9.</td>

                <td width="200" style="vertical-align: text-top">Metode Pengujian</td>

                <td width="10" style="vertical-align: text-top">:</td>

                <td width="300">'.$data->metode_pengujian.'</td>

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




            while ($data2 = $tampil2->fetch_object()):

                

          $content .='

          <tr>
          

            <td style="width:30%; vertical-align: text-top">'.$data2->no_sampel.'</td>    

            <td style="width:20%; vertical-align: text-top">'.$namaSampel.'</td> 

            <td style="width:25%; vertical-align: text-top">'.$data2->positif_negatif.'</td>  

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

            <td style="width: 100px"></td>

            <td style="width: 260px; text-align: center">Sumbawa Besar, '.$data->tanggal_sertifikat.'</td>

        </tr>



        <tr>

            <td style="width: 215px"></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: center">Penyelia</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">Analis</td>

        </tr>


        <tr>

            ';


                if ($ttd["ttd_penyelia_data_teknis"] == 'Ya') {
                    

                    $content .='

                        <td style="width: 215px"><img src='.$basepath.$objectPrint->gambar($data->nama_penyelia).' style="width: 90%;"></td>

                    ';
                    
                }else{


                    $content .='

                        <td style="width: 215px; padding-bottom: 85px"></td>

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

                        <td style="width: 215px; padding-bottom: 85px"></td>

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


require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Data_Teknis'.'_'.$b.'_'.$a.'.pdf');

require_once('footer.php');


?>