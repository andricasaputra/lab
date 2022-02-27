<?php

require_once ('header.php');

$content ='

<style>

    .tabel1 td {

        padding:8px;
        padding-left: 40px;

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

        margin-left: 525px;

        padding-top :662px;

    }



    div#lower1{

        position: absolute; 

        margin-left: 20px;

        padding-top :690px;

    }

 

</style>

<page backtop="35mm" backleft="12mm" backright="10mm">

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

    <br/><br/>

    <table class="tabel1">


    <tr>

        <td width="0" style="border-right: 0px;"></td>

        <td width="0" align="center" style="border-right: 0px; border-left: 0px"></td>

        <td width="176">'.$data->tanggal_diterima.'</td>

        <td width="0" style="border-right: 0px"></td>

        <td width="0" align="center" style="border-right: 0px"></td>

        <td width="176">'.$data->bagian_hewan.'</td>

    </tr>



    <tr>

        <td width="0" style="border-right: 0px"></td>

        <td width="0" align="center" style="border-right: 0px"></td>

        <td width="176">
            '.$data->kode_sampel.'
        </td>

        <td width="0" style="border-right: 0px"></td>

        <td width="0" align="center" style="border-right: 0px"></td>

        <td width="176">
            '.$data->jumlah_sampel.'&nbsp;('.$bil.')
        </td>

    </tr>


    <tr>

        <td width="0" style="border-right: 0px"></td>

        <td width="0" align="center" style="border-right: 0px"></td>

        <td width="176">'.$data->bagian_hewan.'</td>

        <td width="0" style="border-right: 0px"></td>

        <td width="0" align="center" style="border-right: 0px"></td>

        <td width="176">'.$data->lab_penguji.'</td>

    </tr>

    </table>

        <p></p>

        <table class="table2" style=" width: 100%; word-wrap:break-word;

              table-layout: fixed;">

              <tr>

                <th style="width:5%"></th>

                <th style="width:20%"></th>

                <th style="width:22%"></th>

                <th style="width:33%"></th>

                <th style="width:20%"></th>       

              </tr>


              <tr>    

                <td>'.$no++.'</td>

                <td>'.$data->no_sampel.'</td>    

                <td>

                '.$data->nama_sampel.'

                </td> 

                <td>

                <em>'.$data->target_pengujian2.'</em>

                </td>

                <td> '.$data->metode_pengujian.' </td> 



              </tr>

        </table>

   <br/>

       <div  id="lower1" align="center">

            <p></p>

            <p></p>

            <p></p>

            <p></p>

            

            '.$data->yang_menerimalab.'<br/>

           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->nip_yang_menerimalab.'

        </div>



        <div  id="lower"  align="center">

            <p></p>

            <br>

            <p></p>

            <p></p>

            <p></p>

            
            '.$data->yang_menyerahkanlab.'<br/>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->nip_yang_menyerahkanlab.'

        </div>

'; 

$a = $data->nama_sampel;

$b = $data->tanggal_diterima;               

}

        
    $content .='    

</page>

';

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Tanda_Terima_Distribusi_Sampel_Pengujian'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');

?>