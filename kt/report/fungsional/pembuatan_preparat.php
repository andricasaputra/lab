<?php

session_start();

require_once ('header.php');

$content ='

<style>


    .table2  {

        text-align: center;

        border: 0.7px solid black;

        border-collapse: collapse;



    }


    .table2 th {

       padding-top: 10px;

       padding-bottom: 10px;

       border: 0.7px solid black;

       border-collapse: collapse;

    }

    .table2 td {

       vertical-align: text-top;

       text-align: center;

       padding:  0px 3px;

       border: 0.7px solid black;


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

       height : 150%;

       vertical-align: text-top;


    }



    .ket {

        border : 0.7px solid;

        border-collapse: collapse;

    }

 
    li {
        list-style-type: no;
        text-align: left;
        margin-left: -10px;
    }
 

</style>


<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="15mm">



     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src="'.$logo.'" width="698px; height:150px"></strong>

        </div>

    </page_header>



    <page_footer>

        <div id="garis">

            <hr width="75%">

        </div>

    </page_footer>

     ';

    $no=1;
            
    if(@$_GET['id'] !== '' && $_GET['no_permohonan'] !== ''){

        $tampil  = $objectFungsional->pembuatan_preparat();

        $tampil3  = $objectFungsional->penanganan_spesimen($_GET['id']);

        $tampil2 = $objectPrint->cetak2(@$_GET['id']);

        $qu2 = $objectHasil->input_ulang(@$_GET['id']);

        $num = $qu2->num_rows;

        $scanTtd = $objectPrint->Scan(@$_GET['id']);

        $ttd_penyelia_data_teknis = $scanTtd['ttd_penyelia_data_teknis'];

        $ttd_analis_data_teknis = $scanTtd['ttd_analis_data_teknis'];

        }else {

            if(@$_SESSION['loginadminkt']) {

                echo "<script>alert('Nomor Sampel Masih Kosong!')

                window.location='../admin.php?page=data_teknis'</script>";

            }else {

                echo "<script>alert('Nomor Sampel Masih Kosong!')

                window.location='../pengujian.php?page=data_teknis'</script>";

            }

        exit;

        }

        


$content .= '





    <div align="center">

        <strong>LAPORAN PEMBUATAN PREPARAT (SEDIAAN) SECARA SEDERHANA</strong><br>

    </div>

    <p></p>
    1. Pelaksana : Andrica Ismi Eka Saputra<br><br>
    2. Lokasi    : Laboratorium Karantina Tumbuhan SKP Kelas I Sumbawa Besar
    <p></p>

    <strong>HASIL KEGIATAN:</strong><br>
    <br> <br> <br>

   <table class="table2" style="width: 100%; table-layout:fixed">

            <tr>

                <th style="width: 5%">No</th>
                <th style="width: 8%">Waktu</th>
                <th style="width: 10%">Dokumen/ SPT</th>
                <th style="width: 10%">No Sampel</th>
                <th style="width: 20%">Sasaran</th>
                <th style="width: 17%">Preparat</th>
                <th style="width: 20%">Cara Membuat</th>
                <th style="width: 8%">AK</th>

            </tr>


            ';
                $no=1;
                while ($data=$tampil->fetch_object()):

            $content .='

            <tr>

                <td style="width: 5%">'.$no++.'</td>

                <td style="width: 10%">'.$data->tanggal_penyerahan_lab.'</td>

                <td style="width: 10%">0027/Kpts<br>/KP.110<br>/K.50.D/01<br>/2018</td>


                <td style="width: 7%">'.$data->no_sampel.'</td>

                <td style="width: 15%"><b>'.$data->nama_patogen.'</b><br><i>'.$data->target_optk.'</i></td>

                <td style="width: 15%"><b>'.$data->bagian_tumbuhan.'</b><br>'.$data->nama_sampel.'</td>

                ';

                    if ($data->nama_patogen == 'Serangga' || $data->nama_patogen == 'Lalat Buah') {
                         
                         $content .='   

                          <td style="width: 20%; text-align: left"> 
                                Disimpan didalam botol vial mini berakohol,
                                Label Sementara,
                                Penomoran Sampel, 
                          </td>

                         ';
                    }else{

                        $content .='   

                          <td style="width: 20%; text-align: left">
                                Spesimen Hasil Plating Diambil,
                                Ambil Cendawan Target Dengan Jarum Preparat Steril,
                                Letakkan Diatas Objek Glass Yag Sudah Ditetesi Laktofenol,
                                Tutup Dengan Cover Glass,
                                Label Sementara(No Sampel)     
                          </td>

                         ';

                    }

                $content .='

               

                <td style="width: 8%">0.010</td>
            </tr>

       ';

            endwhile;

       $content .='

     </table>

    <br><br><br>
    


    <table class="lower" style="top: auto" >



        <tr>

            <td></td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">Sumbawa Besar, 31 Mei 2018</td>

        </tr>



        <tr>

            <td style="width: 215px"></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>


        <tr>

            <td style="width: 215px;text-align: center">Mengetahui, <br> Penanggung Jawab Lab. Karantina Tumbuhan</td>

            <td style="width: 180px"></td>

            <td style="width: 215px;text-align: center">Petugas Pelaksana</td>

        </tr>

                    

        <tr>
            ';

            $ttd = '<img src="../../../assets/img/fatma.png" width="170">';
            $content .='


                    <td style="width: 215px; text-align: center;"><div style="position: relative; z-index: -1; left: -120px">'.$ttd.'</div></td>

                        



                <td style="width: 180px"></td>
                

                ';

                $ttd = '<img src="../../../assets/img/andrica.png" width="170">';
                $content .='


                         <td style="width: 215px;text-align: center"><div style="position: relative; z-index: -1; left: -120px">'.$ttd.'</div></td>

                        


        </tr>

        <tr>

            <td style="width: 215px; text-align: center">(Fatma Dya Swari, SP)</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">(Andrica Ismi Eka Saputra)</td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: center"> NIP. 19801209 200912 2 004 </td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">NIP. 19940110 201403 1 001</td>

        </tr>



        <tr>

            <td style="width: 215px";></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>



    </table>






</page>



';





require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en');

$html2pdf->WriteHTML($content);

$html2pdf->Output('Penanganan Spesimen.pdf');

require_once('footer.php');





?>