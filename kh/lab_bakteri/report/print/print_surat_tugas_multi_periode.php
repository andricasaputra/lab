<?php

session_start();

require_once ('header.php');

$tanggal = $objectTanggal->tgl_indo(date("Y-m-d"));

$bulan = $objectTanggal->bulan(date("m")); 

$tahun = date('Y');

$content ='

<style>

    table{

        border: 0.7px solid black;

        border-collapse: collapse;

        width: 100%;
    }

    th{

        border: 0.7px solid black;

        border-collapse: collapse;

        text-align: center;

        vertical-align: baseline;

    }

    td{

        border: 0.7px solid black;

        border-collapse: collapse;

        text-align: center;

        vertical-align: text-top;

        padding-top: 3px;
    }

    
    #garis {

        width: 95%;

        margin-left: 35px;

    }

    hr {

        border: none;

        height: 1px;

        color: black; 

        background-color: black;

    }


    div#lower{

        margin-left: 700px;

    }


    div#lower2{

        margin-left: 73px;

    }

    .html2pdf__page-break2 {

        height: 2000px;

    }

</style>

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="10mm">

     <page_header> 

        <div align="center">

            <strong><img src='.$logo_horizontal.' width="1000px; height:150px"></strong>

        </div>

    </page_header>

    <page_footer>

        <div id="garis">

            <hr width="75%">

            <i>F.4.4.1 1; Ter.1; Rev.0;03/08/2015</i>

        </div>



    </page_footer>

     ';
    $no=1;

    if(@$_POST['print_data']){

        $tampil = $objectPrint->print_surat_tugas(@$_POST['tgl_a'], @$_POST['tgl_b']);

    }else {

        $tampil = $objectPrint->tampil();
        exit;

    }

    if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }

    $rtitle = "surat penyelia dan analis";

    $title = ucwords($rtitle);

    $num = $tampil->num_rows;

    $arrID = array();

    while ($data=$tampil->fetch_object()):

        $arrID[] = $data->id;

        $totalID = count($arrID);


$content .= '


    <div align="center">

        <strong>'.strtoupper($rtitle).'</strong>

        <br>No : '.$data->no_surat_tugas.'

    </div>

        <p></p>

    <div>

         Pada hari ini&nbsp;&nbsp;'.$data->hari.'&nbsp;&nbsp;Bulan '.$data->bulan.'&nbsp;&nbsp;Tahun '.$data->tahun.'&nbsp;&nbsp; ,ditugaskan penyelia dan analis dengan nama dan jabatan fungsional untuk melakukan pengujian sampel dengan kode :&nbsp;'.$data->kode_sampel.'
            &nbsp;sesuai rincian sebagaimana tersebut dibawah ini :

    </div>

        <p></p>

        <table style="text-align: center">

              <tr>

                <th style="width:5%; border-bottom:0px;padding-top: 15px" >No</th>

                <th style="width:14%; border-bottom:0px;padding-top: 15px">Nama</th> 

                <th colspan="2" style="width:15%;padding-top: 5px">Kedudukan*</th>

                <th style="width:10%;border-bottom:0px;padding-top: 15px">Jabatan</th>

                <th style="width:14%;border-bottom:0px;padding-top: 15px">Nomor Sampel</th>

                <th style="width:14%;border-bottom:0px;padding-top: 15px">Target Pengujian</th>

                <th style="width:15%;border-bottom:0px;padding-top: 15px">Metode Pengujian</th>

                <th style="width:12%;border-bottom:0px;padding-top: 15px">Jumlah Sampel</th>

              </tr>



             <tr>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px;padding-top: 10px"><b>Penyelia</b></td>

                <td style="border-top:0px;padding-top: 10px">&nbsp;&nbsp;<b>Analis</b>&nbsp;&nbsp;</td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

              </tr>



              <tr >

                

                <td style="width:5%; border-bottom:0px; ">1 <br><br><br> 2</td>

                <td style="width:10%;border-bottom:0px; ">'.$data->nama_penyelia.'<br><br>'.$data->nama_analis.'</td>   

                <td style="width:5%;border-bottom:0px;  "><img src='.$check.' width="25px; height:25px;"></td>

                <td style="width:5%;border-bottom:0px; "><br><br><br><img src='.$check.' width="25px; height:25px;"></td>

                <td style="width:10%;border-bottom:0px; ">'.$data->jab_penyelia.'<br><br>'.$data->jab_analis.'</td>

                <td style="width:10%;border-bottom:0px; ">
                    '.$data->no_sampel.'
                </td>

                <td style="width:17%;border-bottom:0px; "> <em>'.$data->target_pengujian2.' </em></td>

                <td style="width:15%;border-bottom:0px; ">'.$data->metode_pengujian.' </td>

                <td style="width:10%;border-bottom:0px;">
                    '.$data->jumlah_sampel.'
                </td>

               

              </tr>

              <tr>

                    <td style="border-top:0px; padding-bottom: 80px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

              </tr>



        </table>

    <br>

        <div>

            Keterangan: <sup>*)</sup> Beri tanda Check (<img src='.$check.' width="25px; height:30px;">) pada tempat yang sesuai

        </div>





        <div  id="lower">

            <p></p>



            Manajer Teknis



            <p></p>

            <p></p>

            <p></p>

            

            ('.$data->mt.')<br/>

            NIP. '.$data->nip_mt.'

        </div>

        ';

        if ($totalID < $num) {

            $content .= '

                 <div class="html2pdf__page-break2"></div>  

            ';

        }  
       

endwhile;

$content .='    

</page>

';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('L','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Surat_Tugas.pdf');

require_once('footer.php');

?>