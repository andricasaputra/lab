<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0], 'kt');

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

    height : 450px;

    padding-top: 10px;

    margin-bottom:20px;

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



div#lower{
    position: absolute; 
    margin-left: 455px;
    padding-top :720px;
    z-index : 1;
}

div#lower1{
    position: absolute; 
    margin-left: 30px;
    padding-top :720px;
    z-index : 1;
}
.ttd1{
    position: absolute; 
    z-index: -1; 
    top: 760px;
}


.html2pdf__page-break2 {

    height: 2000px;

}


</style>

<page backtop="35mm" backleft="12mm" backright="10mm">

     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src="'.$logo.'" width="698px; height:150px"></strong>

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

        $tampil = $objectPrint->print_pertanggal2(@$_POST['tgl_a'], @$_POST['tgl_b']);

    }else {

        $tampil=$objectPrint->tampil();
        exit;

    }

    if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }

    $splitTitle = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $objectPrint->title_dokumen, -1, PREG_SPLIT_NO_EMPTY);

    array_splice($splitTitle, 5, 0, "<br>");

    $titleDokumen = '';

    foreach ($splitTitle as $key => $t) {
        $titleDokumen .= $t . ' ';
    }

    $num = $tampil->num_rows;

    $arrID = array();

        while ($data=$tampil->fetch_object()):

        $id = $data->id;

        $ttd = $objectPrint->scan($id);

        $i = $data->yang_menerimalab;

        $bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

        $arrID[] = $data->id;

        $totalID = count($arrID);

$content .= '





    <div align="center">

        <strong>'.$titleDokumen.'</strong>

    </div>

    <p></p>



    <table class="tabel1">



    <tr>

        <td width="0" style="border-right: 0px">Tanggal</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">'.$data->tanggal_diterima.'</td>

        <td width="0" style="border-right: 0px">Jenis sampel</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</td>

    </tr>



    <tr>

        <td width="0" style="border-right: 0px">Kode Sampel</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">'.$data->kode_sampel.'</td>

        <td width="0" style="border-right: 0px">Jumlah Sampel</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'</td>

    </tr>



    <tr>

        <td width="0" style="border-right: 0px">Nama Sampel</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">'.$data->nama_sampel.'&nbsp; (<em>'.$data->nama_ilmiah.'</em>)</td>

        <td width="0" style="border-right: 0px">Lab. Penguji</td>

        <td width="0" align="center" style="border-right: 0px">:</td>

        <td width="176">'.$data->lab_penguji.'</td>

    </tr>



    </table>

        <p></p>

   





        <table class="table2" >

              <tr>

                <th style="width:5%;" >No</th>

                <th style="width:23%;">Nomor Sampel</th>

                <th style="width:21.3%;">Identitas Pengujian</th>

                <th style="width:30%;">Target Pengujian</th>

                <th style="width:20%;">Metode Pengujian</th> 

       

              </tr>



              <tr>

                

                <td>1</td>

                <td>'.$data->no_sampel.'</td>    

                <td>'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</td> 

                <td>

                <div style="width :200px; text-align:center; margin-left: -100px">

                ';

                // Target OPTK Ke 2 Terisi



                        if ($data->target_optk2 !== '' && $data->target_optk3 == '') {



                            // Jenis/ Kelompok OPTK Target Pengujian Ke 2 Kosong

                                

                            if ($data->nama_patogen2 =='') {



                                $content .='



                                <b>'.$data->nama_patogen.'</b><br>(<em>'.$data->target_optk.' & '.$data->target_optk2.'</em>)



                                ';



                            // Jenis/ Kelompok OPTK Target Pengujian Ke 2 Terisi



                            }else{



                                $content .='



                                <b>'.$data->nama_patogen.'</b><br>(<em>'.$data->target_optk.'</em>)



                                <br>



                                <b>'.$data->nama_patogen2.'</b><br>(<em>'.$data->target_optk2.'</em>)  



                                ';



                            }



                        // Target OPTK Ke 3 Terisi



                        }elseif($data->target_optk3 !==''){



                            // Jenis/ Kelompok OPTK Target Pengujian Ke 2 dan ke 3 Kosong 



                            if ($data->nama_patogen2 =='' && $data->nama_patogen3 == '') {



                                $content .='



                                <b>'.$data->nama_patogen.'</b><br>(<em>'.$data->target_optk.', '.$data->target_optk2.', '.$data->target_optk3.'</em>)



                                ';



                            // Jenis/ Kelompok OPTK Target Pengujian ke 3 Kosong tetapi target pengujian OPTK ke 2 terisi 



                            }elseif($data->nama_patogen3 =='' && $data->nama_patogen2 !==''){



                                $content .='



                                <b>'.$data->nama_patogen.'</b><br>(<em>'.$data->target_optk.'</em>)



                                <br>



                                <b>'.$data->nama_patogen2.'</b><br>(<em>'.$data->target_optk2.' & '.$data->target_optk3.'</em>)



                                ';



                            // Jenis/ Kelompok OPTK Target Pengujian ke 3 Terisi tetapi target pengujian OPTK ke 2 kosong



                            }elseif($data->nama_patogen3 !== '' && $data->nama_patogen2 ==''){





                                $content .='



                                <b>'.$data->nama_patogen.'</b><br>(<em>'.$data->target_optk.', '.$data->target_optk2.'</em>)



                                <br>



                                <b>'.$data->nama_patogen3.'</b><br>(<em>'.$data->target_optk3.'</em>) 



                                ';



                            // Jenis/ Kelompok OPTK Target Pengujian ke 2 dan ke 3 Terisi + target optk 1



                            }else{



                                $content .='



                                <b>'.$data->nama_patogen.'</b><br>(<em>'.$data->target_optk.'</em>)



                                <br>



                                <b>'.$data->nama_patogen2.'</b><br>(<em>'.$data->target_optk2.'</em>)  



                                <br>



                                <b>'.$data->nama_patogen3.'</b><br>(<em>'.$data->target_optk3.'</em>) 



                                ';



                            }



                        }else{



                            // Hanya 1 Target OPTK terisi



                            $content .='



                            <b>'.$data->nama_patogen.'</b><br>(<em>'.$data->target_optk.'</em>) 



                            ';



                        }



                    $content .='

                    </div>

                </td>

                <td>

                ';



                    if ($data->metode_pengujian2 !=='') {

                        $content .='



                        '.$data->metode_pengujian.'

                    <br><br>'.$data->metode_pengujian2.'



                        ';

                    }elseif($data->metode_pengujian3 !==''){



                        $content .='



                        '.$data->metode_pengujian.'

                    <br><br>'.$data->metode_pengujian2.'

                    <br><br>'.$data->metode_pengujian3.'



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

   <br/>

';

     /*Scan tanda Tangan Pengelola Sampel/ Yang Menerima*/

        if ($ttd["ttd_yang_menerima_pengelola_sampel"] == 'Ya') {


                $content .='
                

                <div  id="lower1"  align="center">
                    <div class="ttd1">
                       <img src="'.$basepath.$objectPrint->gambar($data->yang_menerimalab).'" style="width: 120%">                         
                    </div>
                        <p></p>
                        Yang Menerima
                        <p></p>
                        <p></p>
                        <p></p>
                            
                        ('.$data->yang_menerimalab.')<br/>
                        NIP. '.$data->nip_yang_menerimalab.'
                </div>


            ';

            
            
        }else{


            $content .='

                <div  id="lower1" align="center">
                    <p></p>
                    Yang Menerima
                    <p></p>
                    <p></p>
                    <p></p>
                    
                    ('.$data->yang_menerimalab.')<br/>
                    NIP. '.$data->nip_yang_menerimalab.'
                </div>


            ';

        }

        /*Scan tanda Tangan Pengelola Sampel/ Yang Menyerahkan*/


        if ($ttd["ttd_yang_menyerahkan_pengelola_sampel"] == 'Ya') {

                $content .='
                
                
                <div  id="lower"  align="center">
                    <div class="ttd1">
                        <img src="'.$basepath.$objectPrint->gambar($data->yang_menyerahkanlab).'" style="width: 120%">                           
                    </div>
                        <p></p>
                        Yang Menyerahkan
                        <p></p>
                        <p></p>
                        <p></p>
                            
                        ('.$data->yang_menyerahkanlab.')<br/>
                        NIP. '.$data->nip_yang_menyerahkanlab.'
                </div>

            ';
            
        }else{


            $content .='

                <div  id="lower"  align="center">
                    <p></p>
                    Yang Menyerahkan
                    <p></p>
                    <p></p>
                    <p></p>
                    
                    ('.$data->yang_menyerahkanlab.')<br/>
                    NIP. '.$data->nip_yang_menyerahkanlab.'
                </div>

            ';

        }

        if ($totalID < $num) {

            $content .= '

                 <div class="html2pdf__page-break2"></div>  

            ';

        }
        

endwhile;               

    $content .='    

</page>

';


$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($objectPrint->title_dokumen);

$html2pdf->Output('Tanda_Terima_Distribusi_Sampel_Pengujian.pdf');

require_once('footer.php');


?>