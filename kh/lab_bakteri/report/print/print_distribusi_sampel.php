<?php

require_once ('header.php');

$content ='

<style>



    table {

        border: 0.7px solid black;

        border-collapse: collapse;

        width: 100%;

    }



    th{

        border: 0.7px solid black;

        border-collapse: collapse;

        padding: 3px;

    }



    td{

        border: 0.7px solid black;



    }



    .tabel1 td {

        padding:8px;

    }





    .table2  {

        text-align: center;



    }



      .table2 th {

       padding-top: 10px;

       padding-bottom: 10px;





    }



     .table2 td {

       vertical-align: text-top;

       padding-top: 20px;

       padding-bottom: 20px;

       margin-bottom:20px;

       height: 400px;



    }



     .tabel3 td {

        padding: 5px 5px 8px;

        width: 314px;



    }

        

    div#garis {

        width: 90%;

        margin:auto;

        margin-left:-3px;

        padding-bottom: 20px

    }



    hr {

        border: none;

        height: 1px;

        color: black; 

        background-color: black;

    }



    div#lower{

        position: absolute; 

        margin-left: 455px;

        padding-top :720px;

    }



    div#lower1{

        position: absolute; 

        margin-left: 30px;

        padding-top :734px;

    }

 







 

</style>

';



$content .= '

<page backtop="35mm" backleft="12mm" backright="10mm">

     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src='.$logo.' width="698px; height:150px"></strong>

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

                

if(@$_GET['id'] !== ''){

    $tampil = $objectPrint->tampil(@$_GET['id']);

}else {

    $tampil = $objectPrint->tampil();
    exit;

}

$rtitle = "tanda terima distribusi sampel pengujian <br/> laboratorium karantina hewan";

while ($data=$tampil->fetch_object()){


    $bil = ucwords($objectNomor->bilangan($data->jumlah_sampel));

    $r = str_replace("<br/>", "", $rtitle);

    $title = ucwords($r).' | '.$data->kode_sampel;


$content .= '





    <div align="center">

        <strong>'.strtoupper($rtitle).'</strong>

    </div>

    <p></p>


    <table class="tabel1">



    <tr>

        <td width="0" style="border-right: 0px;">Tanggal</td>

        <td width="0" align="center" style="border-right: 0px; border-left: 0px">:</td>

        <td width="176">'.$data->tanggal_diterima.'</td>

        <td width="0" style="border-right: 0px">Jenis sampel</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">'.$data->bagian_hewan.'</td>

    </tr>



    <tr>

        <td width="0" style="border-right: 0px">Kode Sampel</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">
            '.$data->kode_sampel.'
        </td>

        <td width="0" style="border-right: 0px">Jumlah Sampel</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">
            '.$data->jumlah_sampel.'&nbsp;('.$bil.')
        </td>

    </tr>


    <tr>

        <td width="0" style="border-right: 0px">Nama Sampel</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">'.$data->bagian_hewan.'</td>

        <td width="0" style="border-right: 0px">Lab. Penguji</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">'.$data->lab_penguji.'</td>

    </tr>

    </table>

        <p></p>

        <table class="table2" style=" width: 100%; word-wrap:break-word;

              table-layout: fixed;">

              <tr>

                <th style="width:5%">No</th>

                <th style="width:23%">Nomor Sampel</th>

                <th style="width:21.3%">Identitas Pengujian</th>

                <th style="width:30%">Target Pengujian</th>

                <th style="width:20%">Metode Pengujian</th>       

              </tr>


              <tr>    

                <td>'.$no++.'</td>

                <td>'.$data->no_sampel.'</td>    

                <td>

                '.$data->nama_sampel.'

                </td> 

                <td>

                <div style="width :200px; text-align:center; margin-left: -100px"><em>'.$data->target_pengujian2.'</em></div>

                </td>

                <td> '.$data->metode_pengujian.' </td> 



              </tr>

        </table>

   <br/>

       <div  id="lower1" align="center">

            <p></p>

            Yang Menerima

            <p></p>

            <p></p>

            <p></p>

            

            ('.$data->yang_menerimalab.')<br/>

            NIP. '.$data->nip_yang_menerimalab.'

        </div>



        <div  id="lower"  align="center">

            <p></p>

            <br>

            Yang Menyerahkan

            <p></p>

            <p></p>

            <p></p>

            
            ('.$data->yang_menyerahkanlab.')<br/>

            NIP. '.$data->nip_yang_menyerahkanlab.'

        </div>

'; 

$a = $data->nama_sampel;

$b = $data->tanggal_diterima;               

}

        
    $content .='    

</page>

';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en', 'UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Tanda_Terima_Distribusi_Sampel_Pengujian'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');

?>