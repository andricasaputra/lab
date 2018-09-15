<?php

require_once ('header.php');

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

    }

     .kosong{
        border : none;
        height: 100px;
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

            <i>F.4.4.1 1; Ter.1; Rev.0;03/08/2015</i>

        </div>

    </page_footer>

     ';


    $no=1;
            

    if(@$_GET['id'] && $_GET['no_sampel'] && $_GET['tanggal']  !== ''){

        $tampil = $objectPrint->tampil(@$_GET['id'], @$_GET['no_sampel']);

        $tampil2 = $objectPrint->cetak(@$_GET['tanggal']);

        $tampil3 = $objectPrint->cetak(@$_GET['tanggal']);

        $tampil4 = $objectPrint->cetak(@$_GET['tanggal']);

        }else {

           if(@$_SESSION['loginadminkh']) {

                echo "<script>alert('Nomor Sampel Masih Kosong!')

                window.location='../admin.php?page=penyelia_analis'</script>";

            }else {

                echo "<script>alert('Nomor Sampel Masih Kosong!')

                window.location='../manajer_teknis.php?page=penyelia_analis'</script>";

            }

        exit;

        }

        if ($tampil->num_rows === 0) {
            echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
            return false;
        }

        while ($data=$tampil->fetch_object()){

$content .= '

    <div align="center">

        <strong><h4>Form Usulan Penunjukan Penyelia dan Analis Pengujian</h4> </strong>

    </div>

    <table cellpadding="10" class="tabel1">

    <tr>

        <td width="0" style="border-right:0px">Laboratorium*)</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px;">:</td>

        <td width="0" style="border-right:0px"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Lab KT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Lab KH</td>

        <td width="200" style="border-right:0px;"><img <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Lab Kehati Hewani/Nabati</td>

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

       <td width="0" style="border-right:0px"> Jumlah Sampel</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px"><span style="margin-left:-104px"> :</span></td>

        <td width="105"><span style="margin-left:-90px">
        ';

                while ($data3 = $tampil3->fetch_object()) {

                    $jum = $data3->jumlah_sampel;

                    $array[] = $jum;

                }

                
                $jml = (array_sum($array));

                $content .='

                '.$jml.'

                ';


        $content .='
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

              ';

                while ($data4 = $tampil4->fetch_object()) :


                $content .='

              <tr>
              
                <td style="width:5%">'.$no++.'</td>
                

                <td style="width:12%">'.$data4->no_sampel.' </td>    

                <td style="width:5%">'.$data4->nama_sampel.'</td> 

                <td style="width:20%"><b>'.$data4->target_pengujian2.'</b></td>

                <td style="width:12%"">'.$data4->metode_pengujian.'</td> 

                <td style="width:15%">'.$data4->lab_penguji.'</td>  

                <td style="width:10%">'.$data4->nama_penyelia.'</td>  

                <td style="width:10%">'.$data4->nama_analis.'</td>  

              </tr>

                ';

                endwhile;

                $content.=' 

                <tr>
              
                <td class="kosong"></td>

                <td class="kosong"></td>    

                <td class="kosong"></td> 

                <td class="kosong"></td>

                <td class="kosong"></td> 

                <td class="kosong"></td>  

                <td class="kosong"></td>  

                <td class="kosong"></td>  

              </tr>  

        </table>

   <br/>

        <div id="lower">

            <br>
            Sumbawa Besar, '.$data->tanggal_penunjukan.' 

            <br/>

            Manajer Teknis

            <p></p>

            <p></p>

            <p></p>

            ('.$data->mt.')<br/>

            NIP. '.$data->nip_mt.'

        </div>

        ';        

}

$content .='    

</page>';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->Output('Form_Usulan_Penunjukan_Penyelia_&_Analis.pdf');

require_once('footer.php');





?>