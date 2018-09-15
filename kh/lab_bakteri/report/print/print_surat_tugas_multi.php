<?php

require_once ('header.php');

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

                

    if(@$_GET['id'] && @$_GET['no_surat_tugas'] && @$_GET['tanggal'] !== ''){

        $tampil = $objectPrint->cetakSuratTugas(@$_GET['tanggal']);

        $tampil2 = $objectPrint->cetak(@$_GET['tanggal']);

        $tampil3 = $objectPrint->cetak(@$_GET['tanggal']);

        $tampil4 = $objectPrint->cetak(@$_GET['tanggal']);

        }else {

           if(@$_SESSION['loginadminkh']) {

                echo "<script>alert('Nomor Surat Tugas Belum Diisi!')

                window.location='../admin.php?page=penyelia_analis'</script>";

            }else {

                echo "<script>alert('Nomor Surat Tugas Belum Diisi!')

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

        <strong>SURAT PENYELIA DAN ANALIS</strong>

        <br>No : '.$data->no_surat_tugas.'

    </div>

        <p></p>

    <div>

         Pada hari ini&nbsp;&nbsp;'.$data->hari.'&nbsp;&nbsp;Bulan '.$data->bulan.'&nbsp;&nbsp;Tahun '.$data->tahun.'&nbsp;&nbsp; ,ditugaskan penyelia dan analis dengan nama dan jabatan fungsional untuk melakukan pengujian sampel dengan kode :&nbsp;
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

                        '.$curr.'&nbsp;,

                        ';

                    }else{

                        $content .='

                        '.$curr.' s/d '.$end.'&nbsp;,

                        ';
                    }

                }

                if (count(array_filter($s))  !== 0) {
                    if (count($filter2) == 1) {

                        $content .='

                        '.$curr2.'&nbsp;,

                        ';

                    }else{

                        $content .='

                        '.$curr2.' s/d '.$end2.'&nbsp;,

                        ';
                    }

                }

                if (count(array_filter($t))  !== 0) {
                    if (count($filter3) == 1) {

                        $content .='

                        '.$curr3.'&nbsp;,

                        ';

                    }else{

                        $content .='

                        '.$curr3.' s/d '.$end3.'&nbsp;,

                        ';
                    }

                }

                if (count(array_filter($u))  !== 0) {
                    if (count($filter4) == 1) {

                        $content .='

                        '.$curr4.'&nbsp;,

                        ';

                    }else{

                        $content .='

                        '.$curr4.' s/d '.$end4.'&nbsp;,

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
                ';

             while ($data3 = $tampil3->fetch_object()):


                $arr2  = $data3->no_sampel;
                            
                $ar[] = $arr2;

                $filter2  = $ar;

                $curr2   = current($filter2);
                $end2    = end($filter2); 



    
                endwhile;


                    if (count($filter2) == 1) {

                        $content .='

                        '.$curr2.'

                        ';

                    }else{

                        $content .='

                        '.$curr2.'&nbsp;s/d&nbsp;'.$end2.'

                        ';
                    }


            $content .='
                </td>

                <td style="width:17%;border-bottom:0px; "> <em>'.$data->target_pengujian2.' </em></td>

                <td style="width:15%;border-bottom:0px; ">'.$data->metode_pengujian.' </td>

                <td style="width:10%;border-bottom:0px;">
                ';


                    while ($data4 = $tampil4->fetch_object()) {

                        $jum = $data4->jumlah_sampel;

                        $array[] = $jum;

                    }

                    
                    $jml = (array_sum($array));

                    $content .='

                    '.$jml.'

                    ';


        $content .='
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

        </div>';  

       

}

                
$content .='    

</page>

';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('L','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->Output('Surat_Tugas.pdf');

require_once('footer.php');

?>