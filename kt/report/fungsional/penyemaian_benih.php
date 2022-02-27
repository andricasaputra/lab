<?php

require_once ('header.php');

$content ='

<style>

    .table1 {

        border :0px;

        width: 100%;

    }



    th{

        border: 0.7px solid black;

        border-collapse: collapse;

        padding: 3px;

    }



    .tabel1 td {

        padding:8px;

        vertical-align: text-bottom;

    }


    .table2  {

        text-align: center;

        border: 0.7px solid black;

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

        $tampil  = $objectFungsional->penyemaian_benih(@$_GET['id']);

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

        while ($data=$tampil->fetch_object()):

        $bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

$content .= '





    <div align="center">

        <strong>PENYEMAIAN BENIH DALAM RANGKA PENGAMATAN/PEMERIKSAAN OPTK</strong><br>

    </div>

    <p></p>



    <strong>I. KEGIATAN</strong><br>

    Pemantauan Daerah Sebar OPTK

   	<table class="table1">

        <tr>

            <td width="10">1.</td>

            <td width="200">No & Tanggal Dokumen</td>

            <td width="10">:</td>

            <td width="300">'.$data->tanggal_permohonan.'</td>

        </tr>



        <tr>

            <td width="10">2.</td>

            <td width="200">Petugas Pelaksana</td>

            <td width="10">:</td>

            <td width="300">'.$data->yang_menerima.'</td>

        </tr>


        <tr>

            <td width="10">3.</td>

            <td width="200">Lokasi</td>

            <td width="10">:</td>

            <td width="400">Laboratorium Karantina Tumbuhan SKP Kelas I Sumbawa Besar</td>

        </tr>



        <tr>

            <td width="10">4.</td>

            <td width="200">Tanggal</td>

            <td width="10">:</td>

            <td width="200">'.$data->tanggal_penyerahan.'</td>

        </tr>

    </table>

    <br>

     <strong>II. DATA BENIH</strong><br>

    <table class="table1">

    	<tr>

                <td width="10">1.</td>

                <td width="200">No Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data->no_sampel.'</td>

            </tr>



            <tr>

                <td width="10">2.</td>

                <td width="200">Nama Benih</td>

                <td width="10">:</td>

                <td width="200">'.$data->bagian_tumbuhan.' '.$data->nama_sampel.'</td>

            </tr>

            ';


            	if ($data->nama_patogen == 'Bakteri') {
            		
            			$content .='

            				<tr>

				                <td width="10">3.</td>

				                <td width="200">Media Tanam</td>

				                <td width="10">:</td>

				                <td width="200">Nutrient Agar (NA)</td>

				            </tr>

            			';


            	}else{

            		$content .='

            				<tr>

				                <td width="10">3.</td>

				                <td width="200">Media Tanam</td>

				                <td width="10">:</td>

				                <td width="200">Kertas Blotter</td>

				            </tr>

            			';

            	}


            $content .='

            

            <tr>

                <td width="10">4.</td>

                <td width="200">Jumlah</td>

                <td width="10">:</td>

                <td width="200">'.$data->jumlah_sampel.' ('.$bilangan.') '.$data->satuan.'</td>

            </tr>



            <tr>

                <td width="10" style="vertical-align: text-top">5.</td>

                <td width="200" style="vertical-align: text-top">Target Pengujian</td>

                <td width="10" style="vertical-align: text-top">:</td>

                <td width="300">

                ';



                // Target OPTK Ke 2 Terisi



                    if ($data->target_optk2 !== '' && $data->target_optk3 == '') {



                        // Jenis/ Kelompok OPTK Target Pengujian Ke 2 Kosong

                            

                        if ($data->nama_patogen2 =='') {



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.' & '.$data->target_optk2.'</em>)



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian Ke 2 Terisi



                        }else{



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



                            <br>



                            <b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.'</em>)  



                            ';



                        }



                    // Target OPTK Ke 3 Terisi



                    }elseif($data->target_optk3 !==''){



                        // Jenis/ Kelompok OPTK Target Pengujian Ke 2 dan ke 3 Kosong 



                        if ($data->nama_patogen2 =='' && $data->nama_patogen3 == '') {



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.', '.$data->target_optk2.', '.$data->target_optk3.'</em>)



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian ke 3 Kosong tetapi target pengujian OPTK ke 2 terisi 



                        }elseif($data->nama_patogen3 =='' && $data->nama_patogen2 !==''){



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



                            <br>



                            <b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.' & '.$data->target_optk3.'</em>)



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian ke 3 Terisi tetapi target pengujian OPTK ke 2 kosong



                        }elseif($data->nama_patogen3 !== '' && $data->nama_patogen2 ==''){





                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.', '.$data->target_optk2.'</em>)



                            <br>



                            <b>'.$data->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk3.'</em>) 



                            ';



                        // Jenis/ Kelompok OPTK Target Pengujian ke 2 dan ke 3 Terisi + target optk 1



                        }else{



                            $content .='



                            <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>)



                            <br>



                            <b>'.$data->nama_patogen2.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk2.'</em>)  



                            <br>



                            <b>'.$data->nama_patogen3.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk3.'</em>) 



                            ';



                        }



                    }else{



                        // Hanya 1 Target OPTK terisi



                        $content .='



                        <b>'.$data->nama_patogen.'</b>&nbsp;&nbsp;(<em>'.$data->target_optk.'</em>) 



                        ';



                    }



                $content .='

                    

                </td>

            </tr>

            <tr>

                <td width="10">6.</td>

                <td width="200">Catatan</td>

                <td width="10">:</td>

                <td width="200">-</td>

            </tr>


    </table>


    <br>

    <table class="lower" style="top: auto" >



        <tr>

            <td></td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">Sumbawa Besar, '.$data->tanggal_penyerahan_lab.'</td>

        </tr>



        <tr>

            <td style="width: 215px"></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>

        ';


            if ($ttd_penyelia_data_teknis == 'Tidak' && $ttd_analis_data_teknis == 'Tidak' || $ttd_penyelia_data_teknis == '' || $ttd_analis_data_teknis == '') {

                $content .='

                    <tr>

                        <td style="width: 215px;text-align: center">Mengetahui, <br> Penanggung Jawab Lab. Karantina Tumbuhan</td>

                        <td style="width: 180px"></td>

                        <td style="width: 215px;text-align: center">Petugas Pelaksana</td>

                    </tr>


                    

                ';



            }else{



                $content .='

                    <tr>

                        <td style="width: 215px;text-align: center">Mengetahui, <br> Penanggung Jawab Lab. Karantina Tumbuhan</td>

                        <td style="width: 180px"></td>

                        <td style="width: 215px;text-align: center">Petugas Pelaksana</td>

                    </tr>

                    

                ';

            }


        $content .= '

        <tr>
            ';

                if ($ttd_penyelia_data_teknis == 'Ya') {

                    $gbr = $objectData->gambar($data->yang_menyerahkanlab);

                    $pilih = $gbr->fetch_object();

                    $p = $pilih->ttd;

                    $ttd = '<img src="../../../assets/img/'.$p.'" width="170">';

                        $content .='


                                <td style="width: 215px; text-align: center;"><div style="position: relative; z-index: -1; left: -120px">'.$ttd.'</div></td>


                            

                        ';

                }else{
                		$ttd = '<img src="../../../assets/img/fatma.png" width="170">';
                        $content .='


                                <td style="width: 215px; text-align: center;"><div style="position: relative; z-index: -1; left: -120px">'.$ttd.'</div></td>

                        

                    ';
                }

                $content .='


                <td style="width: 180px"></td>
                

                ';

                if ($ttd_analis_data_teknis == 'Ya') {

                    $gbr = $objectData->gambar($data->mt);

                    $pilih = $gbr->fetch_object();

                    $p = $pilih->ttd;

                    $ttd = '<img src="../../../assets/img/'.$p.'" width="170">';

                        $content .='


                                <td style="width: 215px;text-align: center"><div style="position: relative; z-index: -1; left: -120px">'.$ttd.'</div></td>


                            

                        ';

                }else{
                		$ttd = '<img src="../../../assets/img/andrica.png" width="170">';
                        $content .='


                                 <td style="width: 215px;text-align: center"><div style="position: relative; z-index: -1; left: -120px">'.$ttd.'</div></td>

                        

                    ';
                }


            $content .='

        </tr>

        <tr>

            <td style="width: 215px; text-align: center">(Fatma Dya Swari, SP)</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">('.$data->yang_menyerahkanlab.')</td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: center"> NIP. 19801209 200912 2 004 </td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">NIP. '.$data->nip_yang_menyerahkanlab.'</td>

        </tr>



        <tr>

            <td style="width: 215px";></td>

            <td style="width: 180px"></td>

            <td style="width: 215px"></td>

        </tr>



    </table>



       

        ';



$a = $data->tanggal_sertifikat;

$b = $data->nama_sampel; 



endwhile;

                 

    $content .='    



</page>



';





require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en');

$html2pdf->WriteHTML($content);

$html2pdf->Output('Data_Teknis'.'_'.$b.'_'.$a.'.pdf');

require_once('footer.php');





?>