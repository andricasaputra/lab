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

            
    if(@$_GET['id'] !== '' && $_GET['no_permohonan'] !== '' && $_GET['tanggal_pengujian'] !==''){

        $tampil  = $objectFungsional->print_persiapan_alat(@$_GET['id'], $_GET['tanggal_pengujian']);

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

        <strong>LAPORAN PERSIAPAN ALAT, BAHAN DAN TEMPAT LABORATORIUM KARANTINA TUMBUHAN</strong><br>

    </div>

    <p></p>



    <strong>A. Keterangan sampel/ media pembawa :</strong><br>

   <table class="table1">



            <tr>

                <td width="10">1.</td>

                <td width="200">Nama Laboratorium</td>

                <td width="10">:</td>

                <td width="300">'.$data->lab_penguji.'</td>

            </tr>



            <tr>

                <td width="10">2.</td>

                <td width="300">Tanggal Penerimaan Sampel di Laboratorium</td>

                <td width="10">:</td>

                <td width="300">'.$data->tanggal_penyerahan_lab.'</td>

            </tr>


            <tr>

                <td width="10">3.</td>

                <td width="200">Tanggal Persiapan</td>

                <td width="10">:</td>

                <td width="200">'.$data->tanggal_pengujian.'</td>

            </tr>



            <tr>

                <td width="10">4.</td>

                <td width="200">Kode Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data->kode_sampel.'</td>

            </tr>



            <tr>

                <td width="10">5.</td>

                <td width="200">Media Pembawa</td>

                <td width="10">:</td>

                <td width="200">'.$data->nama_sampel.'</td>

            </tr>



            <tr>

                <td width="10">6.</td>

                <td width="200">Jenis Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</td>

            </tr>



            <tr>

                <td width="10">7.</td>

                <td width="200">Jumlah Sampel</td>

                <td width="10">:</td>

                <td width="200">'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'</td>

            </tr>



            <tr>

                <td width="10" style="vertical-align: text-top">8.</td>

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

                <td width="10" style="vertical-align: text-top">9.</td>

                <td width="200" style="vertical-align: text-top">Metode Pengujian</td>

                <td width="10" style="vertical-align: text-top">:</td>

                <td width="300">

                ';



                if ($data->metode_pengujian2 !=='') {

                    $content .='



                    '.$data->metode_pengujian.'

                <br>'.$data->metode_pengujian2.'



                    ';

                }elseif($data->metode_pengujian3 !==''){



                    $content .='



                    '.$data->metode_pengujian.'

                <br>'.$data->metode_pengujian2.'

                <br>'.$data->metode_pengujian3.'



                    ';



                }else{



                    $content .='



                    '.$data->metode_pengujian.'



                    ';

                }



                $content .= '

                </td>

            </tr>

            ';
                /*Jika Laboratoriumnya Hama*/

                if ($data->lab_penguji == 'Laboratorium Hama') { 

                    $alat = 'Mikroskop Stereo';
                    $alat2 = 'Kuas';
                    $alat3 = 'Cawan Petri';
                    $alat4 ='Cup Mini';
                    $bahan = 'Botol Vial';
                    $bahan2 ='Alkohol 70%';
                    $bahan3 = 'Slide';
                    $bahan4 = 'Cover Slide';
                    

                    if ($data->target_optk == 'Lalat Buah') {
                        
                         $content .='

                        
                            <tr>

                                <td width="10" style="vertical-align: text-top">10.</td>

                                <td width="200" style="vertical-align: text-top">Nama Alat</td>

                                <td width="10" style="vertical-align: text-top">:</td>

                                <td width="300">'.$alat.', '.$alat2.', '.$alat4.'</td>

                            </tr>

                            <tr>

                                <td width="10" style="vertical-align: text-top">11.</td>

                                <td width="200" style="vertical-align: text-top">Nama Bahan</td>

                                <td width="10" style="vertical-align: text-top">:</td>

                                <td width="300">'.$bahan.', '.$bahan2.'</td>

                            </tr>

                        ';

                    }else{

                        $content .='

                        
                            <tr>

                                <td width="10" style="vertical-align: text-top">10.</td>

                                <td width="200" style="vertical-align: text-top">Nama Alat</td>

                                <td width="10" style="vertical-align: text-top">:</td>

                                <td width="300">'.$alat.', '.$alat3.'</td>

                            </tr>

                            <tr>

                                <td width="10" style="vertical-align: text-top">11.</td>

                                <td width="200" style="vertical-align: text-top">Nama Bahan</td>

                                <td width="10" style="vertical-align: text-top">:</td>

                                <td width="300">'.$bahan3.', '.$bahan4.'</td>

                            </tr>

                        ';
                    }

                /*Jika Laboratorium Penyakit*/
                  
                }else{

                    $alat = 'Mikroskop Compound';
                    $alat2 = 'Jarum Cendawan';
                    $alat3 = 'Cawan Petri';
                    $alat4 = 'Jarum Ose';
                    $bahan = 'Kertas Saring';
                    $bahan2 ='Alkohol 70%';
                    $bahan3 ='Aquadest';
                    $bahan4 = 'KOH';
                    $bahan5 = 'Slide';
                    $bahan6 = 'Cover Slide';



                    if ($data->nama_patogen == 'Cendawan') {
                        
                         $content .='

                        
                            <tr>

                                <td width="10" style="vertical-align: text-top">10.</td>

                                <td width="200" style="vertical-align: text-top">Nama Alat</td>

                                <td width="10" style="vertical-align: text-top">:</td>

                                <td width="300">'.$alat.', '.$alat3.'</td>

                            </tr>

                            <tr>

                                <td width="10" style="vertical-align: text-top">11.</td>

                                <td width="200" style="vertical-align: text-top">Nama Bahan</td>

                                <td width="10" style="vertical-align: text-top">:</td>

                                <td width="300">'.$bahan.', '.$bahan2.', '.$bahan3.', '.$bahan5.', '.$bahan6.'</td>

                            </tr>

                        ';

                    }else{

                        $content .='

                        
                            <tr>

                                <td width="10" style="vertical-align: text-top">10.</td>

                                <td width="200" style="vertical-align: text-top">Nama Alat</td>

                                <td width="10" style="vertical-align: text-top">:</td>

                                <td width="300">'.$alat.', '.$alat4.'</td>

                            </tr>

                            <tr>

                                <td width="10" style="vertical-align: text-top">11.</td>

                                <td width="200" style="vertical-align: text-top">Nama Bahan</td>

                                <td width="10" style="vertical-align: text-top">:</td>

                                <td width="300">'.$bahan4.', '.$bahan3.', '.$bahan5.', '.$bahan6.'</td>

                            </tr>

                        ';
                    }


                }

            $content .='

             

        </table>

    <br>

    <strong>B. Kesiapan Laboratorium :</strong><br>
    <br>

    <table cellpadding="10" class="tabel3">

     <tr>

        <td  style="border-right:0px; border-bottom:0px">1.&nbsp;&nbsp;&nbsp;Ketersediaan Alat</td>

        ';



        if ($data->alat == 'Ada') { 



            $content .='



            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src="'.$checkfix.'" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="'.$boxfix.'" style="width: 15px"></span></td>



            ';

        }else{



            $content .='





            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src="'.$boxfix.'" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="'.$checkfix.'" style="width: 15px"></span></td>

            ';



        }



        $content .='

        

       

    </tr>



            <tr>

                <td  style="border-right:0px; "></td>

                ';



                if ($data->alat2 == 'Baik') { 



                    $content .='



                   <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src="'.$checkfix.'" style="width: 15px"></span><span style="margin-left:15px">Rusak (sementara, permanen)**)</span><span style="margin-left:10px"><img src="'.$boxfix.'" style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src="'.$boxfix.'" style="width: 15px"></span><span style="margin-left:15px">Rusak (sementara, permanen)**)</span><span style="margin-left:10px"><img src="'.$checkfix.'" style="width: 15px"></span></td>

                ';



            }



            $content .='

                

            </tr>

    <tr>

        <td  style="border-right:0px; border-bottom:0px">2.&nbsp;&nbsp;&nbsp;Ketersediaan Bahan</td>

        ';



        if ($data->bahan2 == 'Ada') { 



            $content .='



            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src="'.$checkfix.'" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="'.$boxfix.'" style="width: 15px"></span></td>



            ';

        }else{



            $content .='





            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src="'.$boxfix.'" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="'.$checkfix.'" style="width: 15px"></span></td>

            ';



        }



        $content .='

        

       

    </tr>



           <tr>

                <td  style="border-right:0px; "></td>

                ';



                if ($data->bahan == 'Baik') { 



                    $content .='



                    <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src="'.$checkfix.'" style="width: 15px"></span><span style="margin-left:14px">Kadaluarsa</span><span style="margin-left:45px"><img src="'.$boxfix.'" style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src="'.$boxfix.'" style="width: 15px"></span><span style="margin-left:14px">Kadaluarsa</span><span style="margin-left:45px"><img src="'.$checkfix.'" style="width: 15px"></span></td>

                ';



            }



            $content .='

                

            </tr>



     <tr>

        <td  style="border-right:0px">3.&nbsp;&nbsp;&nbsp;Lain-lain***)</td>

        <td ></td>

    </tr>





    </table>

<br><br>
    
    <div>

    ';

    if ($data->kesiapan =="Ya") {


        $content .='

        Kesimpulan Kesiapan Pengujian : Ya / <span style=" text-decoration: line-through">Tidak </span>**) <br/>

        ';


    }else{

        $content .='

        Kesimpulan Kesiapan Pengujian : <span style=" text-decoration: line-through">Ya </span>/ Tidak **) <br/>

        ';

    }


    $content .='

            
    </div>

    <br><br><br>

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

                        <td style="width: 215px;padding-bottom: 80px;text-align: center">Yang Menyiapkan</td>

                        <td style="width: 180px"></td>

                        <td style="width: 215px;padding-bottom: 80px;text-align: center">Manajer Teknis Lab KT</td>

                    </tr>


                    

                ';



            }else{



                $content .='

                    <tr>

                        <td style="width: 215px;text-align: center">Yang Menyiapkan</td>

                        <td style="width: 180px"></td>

                        <td style="width: 215px;text-align: center">Manajer Teknis Lab KT</td>

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

                        $content .='


                                <td style="width: 215px; text-align: center;"></td>

                        

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

                        $content .='


                                <td style="width: 215px; text-align: center;"></td>

                        

                    ';
                }


            $content .='

        </tr>

        <tr>

            <td style="width: 215px; text-align: center">('.$data->yang_menyerahkanlab.')</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">('.$data->mt.')</td>

        </tr>



        <tr>

            <td style="width: 215px; text-align: center"> NIP. '.$data->nip_yang_menyerahkanlab.'</td>

            <td style="width: 180px"></td>

            <td style="width: 215px; text-align: center">NIP. '.$data->nip_mt.'</td>

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