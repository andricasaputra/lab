<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0]);

$content ='

<style>

    table {

        border: 0.7px solid black;

        border-collapse: collapse;

        width: 100%;

        vertical-align: text-top;

    }

    th {

        border: 0.7px solid black;

        border-collapse: collapse;

        padding: 3px;

    }


    td {

        border: 0.7px;

    }

    .tabel1 td {

        padding:5px;

    }

    .table2  {

        text-align: center;

    }


    .table2 td {

       vertical-align: text-top;

       padding-top: 10px;

       margin-bottom:20px;

       height : 400px;

    }

     
    div#garis {

        width: 90%;

        margin:auto;

        margin-left:-3px;

        padding-bottom: 20px

    }


    #garis {

        width: 95%;

        margin-left: 0px;

    }


    hr {

        border: none;

        height: 1px;

        color: black; 

        background-color: black;

    }


    div#lower{

         margin-left: 400px;

    }

    .html2pdf__page-break2 {

        height: 2000px;

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

            <i>'.$objectPrint->kode_dokumen.'</i>

        </div>

    </page_footer>

     ';

    $no=1;

                
    if(@$_POST['print_data']){

        $tampil = $objectPrint->print_usulan_penunjukan(@$_POST['tgl_a'], @$_POST['tgl_b']);

    }else {

        $tampil = $objectPrint->tampil();

    }

    if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }

    $count = array();

    $num = $tampil->num_rows;

    $arrID = array();

    while ($data=$tampil->fetch_object()):

        $pejabat = $objectPrint->getPejabat($data->nip_mt);

        $count[$data->id] = $data->id;

        $hitungId = array_count_values($count);

        $hit = $hitungId[$data->id];

        $arrID[] = $data->id;

        $totalID = count($arrID);


$content .= '

    <div align="center">

        <strong><h4>'.$objectPrint->title_dokumen.'</h4></strong>

    </div>

    <table cellpadding="10" class="tabel1">

    <tr>

        <td width="0" style="border-right:0px">Laboratorium*)</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px;">:</td>

        <td width="0" style="border-right:0px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Lab KT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Lab KH</td>

        <td width="200" style="border-right:0px;"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Lab Kehati Hewani/Nabati</td>

        <td width="0" style="border-right:0px; border-left: 0px;"></td>

        <td width width="100"></td>

    </tr>

    <tr>

        <td width="0" style="border-right:0px"> Tanggal</td>

        <td width="18" align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="172">'.$data->tanggal_penunjukan.'</td>

        <td width="0" style="border-right:0px"> Nama Sampel</td>

        <td width="0" align="left" style="border-right:0px; border-left: 0px;"> <span style="margin-left:-100px">:</span></td>

        <td width="100"><span style="margin-left:-90px">'.$data->bagian_hewan.'</span></td>

    </tr>

    <tr>

       <td width="0" style="border-right:0px"> Kode Sampel</td>

        <td width="0" align="left" style="border-right:0px; border-left: 0px;">&nbsp;&nbsp; :</td>

        <td width="130">
            '.$data->kode_sampel.'
        </td>

       <td width="0" style="border-right:0px"> Jumlah Sampel</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px"><span style="margin-left:-104px"> :</span></td>

        <td width="105"><span style="margin-left:-90px">
            '.$data->jumlah_sampel.'
        </span></td>
    </tr>

    </table>

        <p></p>

        <table class="table2" >

              <tr>

                <th style="width:5%;" >No</th>

                <th style="width:12%;">Nomor Sampel</th>

                <th style="width:15%;">Identitas Pengujian</th>

                <th style="width:21.3%;">Target Pengujian</th>

                <th style="width:12%;">Metode Pengujian</th> 

                <th style="width:15%; font-size:12px">Laboratorium Pengujian</th> 

                <th style="width:11%;">Penyelia</th>

                <th style="width:11%;">Analis</th>           

              </tr>

              <tr>

                ';

                    if ($hit == 1) {
                        $content .='
                            <td style="width:5%">'.$no.'</td>
                        ';
                    }else{
                        $content .='
                            <td style="width:5%">'.$no++.'</td>
                        ';

                    }

                $content.='
              
                <td style="width:12%">'.$data->no_sampel.' </td>    

                <td style="width:5%">'.$data->nama_sampel.'</td> 

                <td style="width:20%"><em><b>'.$data->target_pengujian2.'</b></em></td>

                <td style="width:12%"">'.$data->metode_pengujian.'</td> 

                <td style="width:15%">'.$data->lab_penguji.'</td>  

                <td style="width:10%">'.$data->nama_penyelia.'</td>  

                <td style="width:10%">'.$data->nama_analis.'</td>  

              </tr>
        </table>

    <br>

    <div>

        Keterangan: 
            <br>
            <sup>*)</sup> Coret Yang Tidak Perlu  

    </div>

   <br/>

        <div id="lower">

            <br>
            Sumbawa Besar, '.$data->tanggal_penunjukan.' 

            <br/>

            '.$pejabat->jabfung.'

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

</page>';

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($objectPrint->title_dokumen);

$html2pdf->Output('Form_Usulan_Penunjukan_Penyelia_&_Analis.pdf');

require_once('footer.php');

?>