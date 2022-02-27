<?php

require_once ('header.php');

$content ='

<style>

    .table1 {

        border :0px;

        width: 100%;

    }



    th{

        border: 1px solid black;

        border-collapse: collapse;

        padding: 3px;

    }





    .tabel1 td {

        padding:8px;

        vertical-align: text-bottom;

    }





    .table2  {

        text-align: center;

        border: 1px solid black;

        border-collapse: collapse;



    }



      .table2 th {

       padding-top: 10px;

       padding-bottom: 10px;



    }



     .table2 td {

       vertical-align: text-top;

       text-align: center;

       padding:  7px 5px;

       border: 1px solid black;

       align: bottom;

       

    }



        

    div#garis {

        width: 90%;

        margin:auto;

        margin-left:-3px;

        margin-bottom: 20px

    }



    #garis, hr {

        width: 95%;

    }



    .lower th td {

       border: 0px;

       width: 100%;

       vertical-align: text-top;

    }



      .ket {

        border : 1px solid;

        border-collapse: collapse;

    }



    .html2pdf__page-break2 {

      height: 2000px;

    }

 

</style>

';



$content .= '



<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="15mm" orientation="P">



     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src='.$logo.' width="698px; height:150px"></strong>

        </div>

    </page_header>



    <page_footer>

        <div id="garis">

            <hr width="75%">

            <i>F.4.4.1 1; Ter.1; Rev.0;</i>

        </div>

    </page_footer>

     ';



        $no=1;

        $a = $_POST['no_a'];

        $b = $_POST['no_b'];

        $c = $_POST['tgl']; 

        $d = (int)$a;

        $e = (int)$b;

        if(isset($_POST['print_data'])){

       $tampil = $objectHasil->print_pertanggal_hasil4($a, $b, $c); 

        }  

            if ($d > $e) {



                if(@$_SESSION['loginadminkt']){

                echo "<script>alert('Format Tanggal Yang Anda Pilih Salah (Sampai dan dari)')

                window.location='../../admin.php?page=sertifikat'</script>";

                exit;



                }elseif(@$_SESSION['loginsuperkt']){

                echo "<script>alert('Format Tanggal Yang Anda Pilih Salah (Sampai dan dari)')

                window.location='../../super_admin.php?page=sertifikat'</script>";

                exit;



                }else{

                echo "<script>alert('Format Tanggal Yang Anda Pilih Salah (Sampai dan dari)')

                window.location='../../pengujian.php?page=sertifikat'</script>";

                exit;

              } 

            }

            if ($tampil->num_rows === 0) {
                    echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
                    return false;
            }

          

            while ($data2=$tampil->fetch_object()):  

            $id = $data2->id;    

    $content .='





    <div align="center" id="judul">

        <strong>DATA TEKNIS HASIL PENGUJIAN LABORATORIUM KARANTINA TUMBUHAN</strong><br>

    </div>

    <p></p>



    <strong>A. Keterangan sampel/ media pembawa :</strong><br>

   <table class="table1">



            <tr>

                <td width="10">1.</td>

                <td width="200">Nama Laboratorium</td>

                <td width="10">:</td>

                <td width="300">'.$data2->nama_lab.'</td>

            </tr>



            <tr>

                <td width="10">2.</td>

                <td width="300">Tanggal Penerimaan Sampel di Laboratorium</td>

                <td width="10">:</td>

                <td width="300">'.$data2->tanggal_penerimaan.'</td>

            </tr>



            <tr>

                <td width="10">3.</td>

                <td width="200">Tanggal Pengujian</td>

                <td width="10">:</td>

                <td width="200">'.$data2->tanggal_pengujian.'</td>

            </tr>



            <tr>

                <td width="10">4.</td>

                <td width="200">Kode Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data2->kode_sampel.'</td>

            </tr>



            <tr>

                <td width="10">5.</td>

                <td width="200">Media Pembawa</td>

                <td width="10">:</td>

                <td width="200">'.$data2->nama_sampel.'</td>

            </tr>



            <tr>

                <td width="10">6.</td>

                <td width="200">Jenis Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data2->bagian_tumbuhan.''.$data2->vektor.''.$data2->media.'</td>

            </tr>



            <tr>

                <td width="10">7.</td>

                <td width="200">Jumlah Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data2->jumlah_sampel.'&nbsp;'.$data2->jumlah_sampel2.'&nbsp;'.$data2->satuan.'</td>

            </tr>



            <tr>

                <td width="10" style="vertical-align: text-top">8.</td>

                <td width="200" style="vertical-align: text-top">Target Pengujian</td>

                <td width="10" style="vertical-align: text-top">:</td>

                <td width="300"><b>'.$data2->nama_patogen.'</b>&nbsp;<em>'.$data2->target_optk.'</em>

                    <br><b>'.$data2->nama_patogen2.'</b>&nbsp;<em>'.$data2->target_optk2.'</em>

                    <b>'.$data2->nama_patogen3.'</b>&nbsp;<em>'.$data2->target_optk3.'</em>

                </td>

            </tr>



            <tr>

                <td width="10" style="vertical-align: text-top">9.</td>

                <td width="200" style="vertical-align: text-top">Metode Pengujian</td>

                <td width="10" style="vertical-align: text-top">:</td>

                <td width="300">'.$data2->metode_pengujian.'

                    <br>'.$data2->metode_pengujian2.'

                        '.$data2->metode_pengujian3.'

                </td>

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

            $no = 1;

            $data = new HasilKh($connection);

            $tampil2 = $data->print_pertanggal_hasil2($id);

            while($data=$tampil2->fetch_object()):

                $nosmpl = $data->jumlah_sampel;

                

            $content .='

          <tr>

            ';

            if ($nosmpl === 1) { $content .='

                <td style="width:5%;">'.$no.'</td> ';

            }else{ $content .='

                <td style="width:5%;">'.$no++.'</td> ';

            }

            $content .='



          <tr>

            

            <td style="width:30%;">'.$data->no_sampel.'</td>    

            <td style="width:20%;">'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</td> 

            <td style="width:25%;text-align: left; ">&nbsp;&nbsp;'.$data->positif_negatif.'<br>&nbsp;&nbsp;Hasil identifikasi: <br>&nbsp;&nbsp; -&nbsp;<em><b>'.$data->hasil_pengujian.'</b></em></td>  

          </tr>



           ';       

            endwhile;

            $content .=' 



    </table>

    

    <table class="lower" style="top: auto" >



        <tr>

            

            <td ></td>

            <td style="padding-bottom: 15px; text-align: right"><span style="font-size: 10pt;padding-bottom: 35px"><strong>Lembar Kerja Terlampir *)</strong></span></td>

            <td ></td>

            

        </tr>



        <tr>

            <td></td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">Sumbawa Besar, '.$data2->tanggal.'</td>

        </tr>



        <tr>

            <td style="width: 215px"></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>



        <tr>

            <td style="width: 215px; padding-bottom: 85px; text-align: center">Penyelia</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; padding-bottom: 85px; text-align: center">Analis</td>

        </tr>





        <tr>

            <td style="width: 215px; text-align: center">('.$data2->nama_penyelia.')</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">('.$data2->nama_analis.')</td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: center"> NIP. '.$data2->nip_penyelia.'</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">NIP. '.$data2->nip_analis.'</td>

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

            <br><br>&nbsp;'.$data2->kesimpulan.'</td>

        </tr>

    </table>

        <br>

        Ket: *) coret bila tidak perlu 

        <div class="html2pdf__page-break2"></div>       

       

        '; 



endwhile;
               
    $content .='    

</page>

';

$html2pdf->WriteHTML($content);

$html2pdf->Output('Data_Teknis.pdf')


?>