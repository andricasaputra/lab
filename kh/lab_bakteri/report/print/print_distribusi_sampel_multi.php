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



    }


    .kosong{
        border: none;
        height: 100px;
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

    .lower td{
        border: none;
        padding-bottom:3px;
        text-align: center;
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

                

    if(@$_GET['id'] && @$_GET['tanggal'] !== ''){

        $tampil = $objectPrint->tampil(@$_GET['id']);

        $tampil2 = $objectPrint->cetak2(@$_GET['tanggal']);

        $tampil3 = $objectPrint->cetak2(@$_GET['tanggal']);

        $tampil4 = $objectPrint->cetak2(@$_GET['tanggal']);

    }else {

        $tampil=$data->tampil();

    }

    if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }   

        while ($data=$tampil->fetch_object()){

$content .= '

    <div align="center">

        <strong>TANDA TERIMA DISTRIBUSI SAMPEL PENGUJIAN <br> LABORATORIUM KARANTINA TUMBUHAN</strong>

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
        ';

             while ($data2 = $tampil2->fetch_object()):


                $arr  = $data2->kode_sampel_sapi;

                $arr2 = $data2->kode_sampel_sapi_bibit;

                $arr3 = $data2->kode_sampel_kerbau;

                $arr4 = $data2->kode_sampel_kuda;

                $arr5 = $data2->kode_sampel_lain;
                            
                $r[] = $arr;
                $s[] = $arr2;
                $t[] = $arr3;
                $u[] = $arr4;
                $v[] = $arr5;

                $filter  = array_filter($r);
                $filter2 = array_filter($s);
                $filter3 = array_filter($t);
                $filter4 = array_filter($u);
                $filter5 = array_filter($v);

                $curr   = current($filter);
                $end    = end($filter); 

                $curr2  = current($filter2);
                $end2   = end($filter2); 

                $curr3  = current($filter3);
                $end3   = end($filter3); 

                $curr4  = current($filter4);
                $end4   = end($filter4); 

                $curr5  = current($filter5);
                $end5   = end($filter5); 
    
                endwhile;

                if (count(array_filter($r)) !== 0) {

                    if (count($filter) == 1) {

                        $content .='

                        '.$curr.'<br>

                        ';

                    }else{

                        $content .='

                        '.$curr.' s/d '.$end.'<br>

                        ';
                    }

                }

                if (count(array_filter($s))  !== 0) {
                    if (count($filter2) == 1) {

                        $content .='

                        '.$curr2.'<br>

                        ';

                    }else{

                        $content .='

                        '.$curr2.' s/d '.$end2.'<br>

                        ';
                    }

                }

                if (count(array_filter($t))  !== 0) {
                    if (count($filter3) == 1) {

                        $content .='

                        '.$curr3.'<br>

                        ';

                    }else{

                        $content .='

                        '.$curr3.' s/d '.$end3.'<br>

                        ';
                    }

                }

                if (count(array_filter($u))  !== 0) {
                    if (count($filter4) == 1) {

                        $content .='

                        '.$curr4.'<br>

                        ';

                    }else{

                        $content .='

                        '.$curr4.' s/d '.$end4.'<br>

                        ';
                    }

                }

                if (count(array_filter($v))  !== 0) {
                    if (count($filter5) == 1) {

                        $content .='

                        '.$curr5.'

                        ';

                    }else{

                        $content .='

                        '.$curr5.' s/d '.$end5.'

                        ';
                    }
                }

            $content .='
        </td>

        <td width="0" style="border-right: 0px">Jumlah Sampel</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">
        ';

                while ($data3 = $tampil3->fetch_object()) {

                    $jum = $data3->jumlah_sampel;

                    $array[] = $jum;

                }

                
                $jml = (array_sum($array));

                $bil = ucwords($objectNomor->bilangan($jml));

                $content .='

                '.$jml.'&nbsp;('.$bil.')

                ';

        $content .='
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

              ';


                while ($data4 = $tampil4->fetch_object()) :


                $content .='



              <tr>

                

                <td>'.$no++.'</td>

                <td>'.$data4->no_sampel.'</td>    

                <td>

                '.$data4->nama_sampel.'

                </td> 

                <td>

                <div style="width :200px; text-align:center; margin-left: -100px"><em>'.$data4->target_pengujian2.'</em></div>

                </td>

                <td> '.$data4->metode_pengujian.' </td> 



              </tr>

              ';

                endwhile;

                $content.='  

             
        </table>

   <br/>


<table class="lower">
    
    <tr>
        <td style="padding-bottom: 50px">Yang Menerima</td>
        <td style="width: 280px"></td>
        <td></td>
        <td></td>
        <td style="padding-bottom: 50px">Yang Menyerahkan</td>
    </tr>
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>'.$data->yang_menerimalab.'</td>
        <td></td>
        <td></td>
        <td></td>
        <td>'.$data->yang_menyerahkanlab.'</td>
    </tr>

    <tr>
        <td>(NIP. '.$data->nip_yang_menerimalab.')</td>
        <td></td>
        <td></td>
        <td></td>
        <td>(NIP. '.$data->nip_yang_menyerahkanlab.')</td>
    </tr>


</table>

'; 
            

}
       
    $content .='    


</page>


';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en', 'UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->Output('Tanda_Terima_Distribusi_Sampel_Pengujian.pdf');

require_once('footer.php');


?>