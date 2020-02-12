<?php

require_once ('header.php');

$content ='

<style>


    table {

        border: 0.7px solid black;

        border-collapse: collapse;

        width: 100%;

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

        position: absolute; 

        margin-left: 400px;

        padding-top :700px;

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

                

    if(@$_GET['id']&&$_GET['no_sampel'] !== ''){

        $tampil = $objectPrint->tampil(@$_GET['id'], @$_GET['no_sampel']);

    }else {

       echo "<script>window.close()</script>";

        exit;

    }

    $rtitle = "Form Usulan Penunjukan Penyelia dan Analis Pengujian";

        while ($data=$tampil->fetch_object()){

        $bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

        $title = ucwords($rtitle).' | '.$data->kode_sampel;

    



$content .= '


    <div align="center">

        <strong><h4>'.$rtitle.'</h4></strong>

    </div>


    <table cellpadding="10" class="tabel1">



    <tr>

        <td width="0" style="border-right:0px">Laboratorium*)</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px;">:</td>

        <td width="0" style="border-right:0px"><img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Lab KT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Lab KH</td>

        <td width="200" style="border-right:0px;"><img <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Lab Kehati Hewani/Nabati</td>

        <td width="0" style="border-right:0px; border-left: 0px;"></td>

        <td width width="100"></td>

    </tr>



    <tr>

        <td width="0" style="border-right:0px"> Tanggal</td>

        <td width="18" align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="172">'.$data->tanggal_penunjukan.'</td>

        <td width="0" style="border-right:0px"> Nama Sampel</td>

        <td width="0" align="left" style="border-right:0px; border-left: 0px;"> <span style="margin-left:-100px">:</span></td>

        <td width="100"><span style="margin-left:-90px">'.$data->nama_sampel.'&nbsp;(<em>'.$data->nama_ilmiah.'</em>)</span></td>



    </tr>

    <tr>

       <td width="0" style="border-right:0px"> Kode Sampel</td>

        <td width="0" align="left" style="border-right:0px; border-left: 0px;">&nbsp;&nbsp; :</td>

        <td width="130">'.$data->kode_sampel.'</td>

       <td width="0" style="border-right:0px"> Jumlah Sampel</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px"><span style="margin-left:-104px"> :</span></td>

        <td width="105"><span style="margin-left:-90px">'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'</span></td>

     

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

                

                <td style="width:5%">1</td>

                <td style="width:12%">'.$data->no_sampel.'</td>    

                <td style="width:5%">'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'</td> 

                <td style="width:20%">

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

                </td>

                <td style="width:12%"">'.$data->metode_pengujian.'<br><br>'.$data->metode_pengujian2.'<br><br>'.$data->metode_pengujian3.'</td> 

                <td style="width:15%">'.$data->lab_penguji.'</td>  

                <td style="width:10%">'.$data->nama_penyelia.'</td>  

                <td style="width:10%">'.$data->nama_analis.'</td>                   

              </tr>



        </table>

   <br/>

 



        <div  id="lower">

            <p></p>



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

$a = $data->nama_sampel;

$b = $data->tanggal_penunjukan;                

}

$content .='    

</page>';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en', 'UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Form_Usulan_Penunjukan_Penyelia_&_Analis'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');


?>