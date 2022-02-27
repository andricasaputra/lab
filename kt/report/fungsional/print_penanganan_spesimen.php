<?php

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

       padding:  0px 5px;

       border: 0.7px solid black;

       align: bottom;

    }


    .tabel3 td {

        padding: 5px 5px 8px;

        width: 314px;

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

        $tampil  = $objectFungsional->penanganan_spesimen();

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

        <strong>LAPORAN PENGAMBILAN DAN PENANGANAN SPESIMEN</strong><br>

    </div>

    <p></p>


    <strong>HASIL KEGIATAN:</strong><br>
    <br> <br> <br>

   <table class="table2" style="width: 100%; table-layout:fixed">

            <tr>

                <th style="width: 5%">No</th>
                <th style="width: 8%">Waktu</th>
                <th style="width: 10%">Dokumen/ SPT</th>
                <th style="width: 10%">Lokasi</th>
                <th style="width: 10%">MP</th>
                <th style="width: 15%">Sasaran</th>
                <th style="width: 15%">Spesimen</th>
                <th style="width: 15%">Penanganan</th>
                <th style="width: 8%">AK</th>

            </tr>

            ';

            $no=1;
            while ($data=$tampil->fetch_object()):

            $content .='

            <tr>

                <td style="width: 5%">'.$no++.'</td>

                <td style="width: 8%">'.$data->tanggal_penyerahan_lab.'</td>

                <td style="width: 10%">'.substr($data->no_permohonan, 0, 6).'<br>'.substr($data->no_permohonan, 7, 6).'<br>'.substr($data->no_permohonan, 13).'</td>

                <td style="width: 10%">Lab KT SKP Kelas I Sumbawa Besar</td>

                <td style="width: 10%">'.$data->nama_sampel.'</td>

                <td style="width: 10%">'.$data->nama_patogen.'<br>'.$data->target_optk.'</td>

                ';

                if($data->bagian_tumbuhan != ''){

                     $content .='

                    <td style="width: 10%">'.$data->bagian_tumbuhan.'</td>

                    ';

                }else{

                     $content .='

                    <td style="width: 10%">'.$data->vektor.'</td>

                    ';

                }

               

                    if ($data->nama_patogen == 'Serangga' || $data->nama_patogen == 'Myte/Tungau' || $data->nama_patogen == 'Lalat Buah') {

                        if ($data->bagian_tumbuhan != '') {

                            $content .='   

                              <td style="width: 10%; text-align: left">
                                  
                                    Spesimen '.$data->bagian_tumbuhan.'  '.$data->nama_sampel.' disimpan pada plastik kedap udara , diberi penomoran sampel
                                  
                              </td>

                             ';

                        }else{

                            $content .='   

                              <td style="width: 10%; text-align: left">
                                  
                                    Spesimen '.$data->bagian_tumbuhan.'  '.$data->nama_sampel.' disimpan didalam botol vial mini berakohol,diberi penomoran sampel
                                  
                              </td>

                             ';
 
                        }
                         
                         
                    }elseif($data->nama_sampel == 'Kedelai'){

                            $content .='   

                              <td style="width: 10%; text-align: left">
                                  
                                    Spesimen '.$data->bagian_tumbuhan.'  '.$data->nama_sampel.' diberikan nomor sampel, kemudian disimpan di dalam vial plastik untuk keperluan uji washing test.
                                  
                              </td>

                             ';
 
                    }else{

                        $content .='   

                          <td style="width: 10%; text-align: left">
                            
                               Spesimen '.$data->bagian_tumbuhan.'  '.$data->nama_sampel.' disimpan di dalam plastik kedap udara,
                                penomoran sampel / spesimen,
                                simpan didalam lemari pendingin
                              
                          </td>

                         ';

                    }


                $content .='

                <td style="width: 8%">0.08</td>
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