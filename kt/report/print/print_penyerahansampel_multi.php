<?php

require_once ('header.php');

$content ='

<style>



    table td{

        border: none;

        width: 100%;

        padding : 12px 15px;

        vertical-align: text-top;

    }



    .kotak td {

        padding: 5px;

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

        margin-left: 428px;

        padding-top :650px;

    }


    div#lower1{

        position: absolute; 

        margin-left: 34px;

        padding-top :664px;

    }


    .html2pdf__page-break2 {

      height: 2000px;

    }



</style>


<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="10mm">

     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src="'.$logo.'" width="698px; height:150px"></strong>

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

    if(@$_POST['print_data']){

        $tampil = $objectPrint->print_pertanggal2(@$_POST['tgl_a'], @$_POST['tgl_b'] );

    }else {

        $tampil=$objectPrint->tampil();
        exit;

    }

    if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }

    $rtitle = "penyerahan sampel pengujian laboratorium karantina tumbuhan";

    $title = ucwords($rtitle);

    $num = $tampil->num_rows;

    $arrID = array();

    while ($data=$tampil->fetch_object()):

    $bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

    $arrID[] = $data->id;

    $totalID = count($arrID);


$content .= '



    <div align="center">

        <strong>PENYERAHAN SAMPEL PENGUJIAN LABORATORIUM KARANTINA TUMBUHAN</strong> <br>

        Nomor :&nbsp;&nbsp;'.$data->no_permohonan.'

    </div>  



    <p></p>





    <table>



        <tr style="padding: 10px 15px">

            <td>1.&nbsp;&nbsp;Kode Sampel</td>

            <td>:</td>

            <td>'.$data->kode_sampel.'</td>

        </tr>



         <tr>

            <td>2.&nbsp;&nbsp;Nama Sampel</td>

            <td>:</td>

            <td>'.$data->nama_sampel.'&nbsp;(<em>'.$data->nama_ilmiah.'</em>)</td>

        </tr>



         <tr>

            <td>3.&nbsp;&nbsp;Jenis Sampel</td>

            <td>:</td>

            <td></td>

        </tr>



    </table>





    <table class="kotak">



         <tr>



         ';



            if ($data->bagian_tumbuhan == 'Seluruh Bagian Tanaman') {



                $content .='



                <td style="padding-left: 33px">

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Seluruh bag. tanaman

                </td>';

            }else{



                $content .='



                <td style="padding-left: 33px">

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Seluruh bag. tanaman

                </td>';



            }



             if ($data->bagian_tumbuhan == 'Batang') {



                $content .='



                <td style="padding-left: 30px">

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Batang

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 30px">

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Batang

                </td>



                ';



            }



            if ($data->bagian_tumbuhan == 'Daun') {



                $content .='



                <td>

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Daun

                </td>

                

                ';

            }else{



                $content .='



                <td>

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Daun

                </td>



                ';



            }



         $content .='           

            

        </tr>



        <tr>  

            ';



            if ($data->bagian_tumbuhan == 'Buah') {



                $content .='



                <td style="padding-left: 33px">

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Buah

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 33px">

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Buah

                </td>



                ';



            }



            if ($data->bagian_tumbuhan == 'Biji/Benih') {



                $content .='



                <td style="padding-left: 30px">

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Biji

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 30px">

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Biji

                </td>



                ';



            }



            if ($data->bagian_tumbuhan == 'Akar') {



                $content .='



                <td>

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Akar

                </td>

                

                ';

            }else{



                $content .='



                <td>

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Akar

                </td>



                ';



            }



         $content .='          

            

        </tr>



        <tr> 



            ';



            if ($data->bagian_tumbuhan == 'Umbi') {



                $content .='



                <td style="padding-left: 33px">

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Umbi

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 33px">

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Umbi

                </td>



                ';



            }



            if ($data->bagian_tumbuhan == 'Bagian Lain') {



                $content .='



                <td style="padding-left: 30px">

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Bagian lain : ..............

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 30px">

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Bagian lain : ..............

                </td>



                ';



            }



            if ($data->vektor == 'Serangga') {



                $content .='



                <td>

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Spesimen/ Kultur

                </td>

                

                ';



            }elseif ($data->vektor == 'Lalat Buah') {



                $content .='



                <td>

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Spesimen/ Kultur

                </td>

                

                ';



            }elseif ($data->vektor == 'Myte/Tungau') {



                $content .='



                <td>

                    <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Spesimen/ Kultur

                </td>

                

                ';

            

            }else{



                $content .='



                <td>

                    <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Spesimen/ Kultur

                </td>



                ';



            }



         $content .='              

                             

        </tr>





        <tr>

            <td style="padding-left: 33px">

                <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Tanah

            </td>

            <td style="padding-left: 30px">

                <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Media pembawa lainnya : ...............

            </td>

            <td></td>

        </tr>

    </table>



    <p></p>



    <table>



         <tr>

            <td>4.&nbsp;&nbsp;Jumlah Sampel</td>

            <td>:</td>

            <td>'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'</td>

        </tr>



        <tr>

            <td></td>

            <td></td>

            <td></td>

        </tr>



         <tr>

            <td>5.&nbsp;&nbsp;Target Pengujian</td>

            <td>:</td>

            <td>

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

            <td>6.&nbsp;&nbsp;Metode Pengujian</td>

            <td>:</td>

            <td>

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

    </table>



        <div  id="lower1" align="center">

            <p></p>

            Yang Menerima,

            <p></p>

            <p></p>

            <p></p>

            

            ('.$data->yang_menerima.')<br/>

            NIP. '.$data->nip_ygmenerima.'

        </div>





        <div  id="lower" align="center">

            <p></p>



            Sumbawa Besar, '.$data->tanggal_penyerahan.' 

   

            <br/>

            Yang Menyerahkan,

            <p></p>

            <p></p>

            <p></p>

            

            ('.$data->yang_menyerahkan.')<br/>

            NIP. '.$data->nip_ygmenyerahkan.'

        </div> 



        ';

        if ($totalID < $num) {

            $content .= '

                 <div class="html2pdf__page-break2"></div>  

            ';

        }

        
endwhile;                  

    $content .='    

</page>

';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en', 'UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Penyerahan_Sampel_Pengujian.pdf');

require_once('footer.php');

?>