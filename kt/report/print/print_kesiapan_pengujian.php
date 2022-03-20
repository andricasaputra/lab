<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0], 'kt', false);

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

        border: 0.7px;

    }


    .tabel1 td {

        padding:5px;

    }


    .table2  {

        text-align: center;
    }


    .table2 td {

        padding: 5px 5px 0px;

        vertical-align: text-top;

        height :100px;
    }


    .tabel3 td {

        padding: 5px 5px 8px;

        width: 314px;
    }

        

    div#lower{

        margin-left: 370px;

    }



    div#lower2{

        margin-left: 80px;

    }



    #garis {

        width: 95%;

        margin-left: 18px;

    }



    hr {

        border: none;

        height: 1px;

        color: black; 

        background-color: black;

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

            <span style="margin-left: 10px;"><i>'.str_replace('T;', ';', $objectPrint->kode_dokumen) .'</i></span>

        </div>

    </page_footer> ';



    

     $no=1;   

    if(@$_GET['id'] !== ''){

        $tampil = $objectPrint->tampil(@$_GET['id']);

    }else {

        $tampil=$objectPrint->tampil();
        exit;

    }


    while ($data=$tampil->fetch_object()){

        $bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

        $title = $objectPrint->title_dokumen.' | '.$data->no_permohonan;

        $pejabat = $objectPrint->getPejabat($data->nip_mt);


$content .= '


    <div align="center">

        <strong>'.$objectPrint->title_dokumen.'</strong>

    </div>

    <p></p>

    <table cellpadding="10" class="tabel1">

    <tr>

        <td width="0" style="border-right:0px">Laboratorium*)</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px;">:</td>

        <td width="459"><img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;Lab KT &nbsp;&nbsp;<img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Lab KH &nbsp;&nbsp;<img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;Lab Kehati Hewani/Nabati</td>

    </tr>

    <tr>

       <td width="0" style="border-right:0px"> Kode Sampel</td>

        <td width="18" align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="316">'.$data->kode_sampel.'</td>

    </tr>

    <tr>

       <td width="0" style="border-right:0px"> Kondisi Sampel</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="316">'.$data->kondisi_sampel.'</td>

    </tr>



    <tr>

     <td width="0" style="border-right:0px">Jumlah/Volume Sampel</td>

        <td width="18" align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="316">'.$data->jumlah_sampel.'&nbsp;('.$bilangan.')&nbsp;'.$data->satuan.'</td>

    </tr>


    </table>

        <p></p>


        <table class="table2" >

              <tr>

                <th style="width:5%;" >No</th>

                <th style="width:45%;"> Target Pengujian</th>

                <th style="width:30%;">Metode Pengujian</th>

                <th style="width:20%;">Lama Pengujian</th>         

              </tr>

              <tr>
        
              ';

            if ($data->nama_patogen2 !== '') {

            $content .=' 



                <td style="width:5%;">1 <br><br> 2</td>



            ';

            }elseif ($data->nama_patogen2 == '' && $data->nama_patogen3 !== '') {

               $content .=' 



                    <td style="width:5%;">1 <br><br> 2</td>



                ';

            }elseif ($data->nama_patogen2 !== '' && $data->nama_patogen3 == '') {

                $content .=' 



                    <td style="width:5%;">1 <br><br> 2</td>



                ';

            }elseif ($data->nama_patogen2 !== '' && $data->nama_patogen3 !== '') {

                $content .=' 



                    <td style="width:5%;">1 <br><br> 2 <br><br> 3</td>



                ';

            }else{



                $content .=' 



                    <td style="width:5%;">1</td>



                ';



            }



            $content .='



                

                <td style="width:45%">

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

                 <td style="width:30%;">

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

                <td style="width:20%;">

                ';



                    if ($data->lama_pengujian2 !=='') {

                        $content .='



                        '.$data->lama_pengujian.'

                    <br><br>'.$data->lama_pengujian2.'



                        ';

                    }elseif($data->lama_pengujian3 !==''){



                        $content .='



                        '.$data->lama_pengujian.'

                    <br>'.$data->lama_pengujian2.'

                    <br>'.$data->lama_pengujian3.'



                        ';



                    }else{



                        $content .='



                        '.$data->lama_pengujian.'



                        ';

                    }



                    $content .= '

                </td>                     

              </tr>



              ';



            

          $content .='



        </table>

   <br/>

   Pertimbangan dapat/tidak dapat dilakukan pengujian *)

   <p></p>



    <table cellpadding="10" class="tabel3">



    <tr>

        <td  style="border-right:0px; border-bottom:0px">1.&nbsp;&nbsp;&nbsp;Ketersediaan Penyelia</td>



        ';



        if ($data->penyelia == 'Kompeten') { 



            $content .='



             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src="'.$boxfix.'" style="width: 15px"></td>



            ';

        }else{



            $content .='





             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src="'.$checkfix.'" style="width: 15px"></td>

            ';



        }



        $content .='



       

    </tr>



            <tr>

                <td  style="border-right:0px; "></td>

                ';



                if ($data->penyelia2 == 'Ada') { 



                    $content .='



                    <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src="'.$checkfix.'" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="'.$boxfix.'" style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                    <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src="'.$boxfix.'" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="'.$checkfix.'" style="width: 15px"></span></td>

                    ';



                }



            $content .='

                

            </tr>





     <tr>

        <td  style="border-right:0px; border-bottom:0px">2.&nbsp;&nbsp;&nbsp;Ketersediaan Analis</td>



        ';



        if ($data->analis == 'Kompeten') { 



            $content .='



             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src="'.$checkfix.'" style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src="'.$boxfix.'" style="width: 15px"></td>



            ';

        }else{



            $content .='





             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src="'.$boxfix.'" style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src="'.$checkfix.'" style="width: 15px"></td>

            ';



        }



        $content .='



       

    </tr>



            <tr>

                <td  style="border-right:0px; "></td>



                ';



                if ($data->analis2 == 'Ada') { 



                    $content .='



                    <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src="'.$checkfix.'" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="'.$boxfix.'" style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src="'.$boxfix.'" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="'.$checkfix.'" style="width: 15px"></span></td>

                ';



            }



            $content .='



                

            </tr>



    <tr>

        <td  style="border-right:0px; border-bottom:0px">3.&nbsp;&nbsp;&nbsp;Ketersediaan Bahan</td>

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

        <td  style="border-right:0px; border-bottom:0px">4.&nbsp;&nbsp;&nbsp;Ketersediaan Alat</td>

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

        <td  style="border-right:0px">5.&nbsp;&nbsp;&nbsp;Lain-lain***)</td>

        <td ></td>

    </tr>





    </table>



    <br/>

        

            

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

            

            Keterangan: <sup>*)</sup> Beri Tanda Check (<img src="'.$check.'" width="25px; height:25px;">) pada tempat yang sesuai

        </div>

        <div id="lower2">

            <sup>**)</sup> Coret Yang Tidak Perlu <br/>

            <sup>***)</sup> Ketidaksiapan selain poin 1, 2, 3, dan 4

        </div>



        <div  id="lower"  align="center">

            <p></p>



            Sumbawa Besar, '.$data->tanggal_diterima.' 

            <br/>

            '.$pejabat->jabfung.'

            <p></p>

            <p></p>

            <p></p>

            

            ('.$data->mt.')<br/>

            NIP. '.$data->nip_mt.'

        </div>



        ';

$a = $data->nama_sampel;

$b = $data->tanggal_diterima;                

}

    $content .='    

</page>

';


$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Kesiapan_Pengujian'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');


?>