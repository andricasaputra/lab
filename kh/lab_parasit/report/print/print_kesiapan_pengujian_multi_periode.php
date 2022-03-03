<?php

require_once ('header.php');

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

    .html2pdf__page-break2 {

      height: 10000px;

    }


</style>

';



$content .= '

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="10mm">

     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src='.$logo.' width="698px; height:150px"></strong>

        </div>

    </page_header>

    <page_footer>

        <div id="garis">

            <hr width="75%">

        </div>

    </page_footer> ';
   

     $no=1;   

    if(@$_POST['print_data']){

        $tampil = $objectPrint->print_kesiapan_pengujian(@$_POST['tgl_a'], @$_POST['tgl_b']);

    }else {

        $tampil = $objectPrint->tampil();
        exit;

    }

    if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }

    $rtitle = "kesiapan pengujian";

    $title = ucwords($rtitle);

    $num = $tampil->num_rows;

    $arrID = array();

    while ($data=$tampil->fetch_object()):

        $arrID[] = $data->id;

        $totalID = count($arrID);
        
$content .= '





    <div align="center">

        <strong>'.strtoupper($rtitle).'</strong>

    </div>

    <p></p>





    <table cellpadding="10" class="tabel1">



    <tr>

        <td width="0" style="border-right:0px">Laboratorium*)</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px;">:</td>

        <td width="459"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Lab KT &nbsp;&nbsp;<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Lab KH &nbsp;&nbsp;<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Lab Kehati Hewani/Nabati</td>

    </tr>



    <tr>

       <td width="0" style="border-right:0px"> Kode Sampel</td>

        <td width="18" align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="316">
        
            '.$data->kode_sampel.'

        </td>

        
    </tr>

    <tr>

       <td width="0" style="border-right:0px"> Kondisi Sampel</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="316">'.$data->kondisi_sampel.'</td>

    </tr>



    <tr>

     <td width="0" style="border-right:0px">Jumlah/Volume Sampel</td>

        <td width="18" align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="316">
            '.$data->jumlah_sampel.'
        </td>

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

                <td style="width:5%;">1</td>

                ';

                if ($data->target_pengujian3 != '') {

                    $content .= '

                    <td style="width:45%"><em><b>'.$data->target_pengujian2.' & '.$data->target_pengujian3.'</b></em></td>


                    ';
                   
                }else{

                    $content .= '

                    <td style="width:45%"><em><b>'.$data->target_pengujian2.'</b></em></td>


                    ';

                }

                $content .='

                 <td style="width:30%;">'.$data->metode_pengujian.'  </td>

                <td style="width:20%;">
                    '.$data->lama_pengujian.'
                </td>                     

              </tr>

        </table>

   <br/>

   Pertimbangan dapat/tidak dapat dilakukan pengujian *)

   <br> <br>



    <table cellpadding="10" class="tabel3">



    <tr>

        <td  style="border-right:0px; border-bottom:0px">1.&nbsp;&nbsp;&nbsp;Ketersediaan Penyelia</td>



        ';



        if ($data->penyelia == 'Kompeten') { 



            $content .='



             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$boxfix.' style="width: 15px"></td>



            ';

        }else{



            $content .='





             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$checkfix.' style="width: 15px"></td>

            ';



        }



        $content .='



       

    </tr>



            <tr>

                <td  style="border-right:0px; "></td>

                ';



                if ($data->penyelia2 == 'Ada') { 



                    $content .='



                    <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$boxfix.' style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                    <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$checkfix.' style="width: 15px"></span></td>

                    ';



                }



            $content .='

                

            </tr>





     <tr>

        <td  style="border-right:0px; border-bottom:0px">2.&nbsp;&nbsp;&nbsp;Ketersediaan Analis</td>



        ';



        if ($data->analis == 'Kompeten') { 



            $content .='



             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$boxfix.' style="width: 15px"></td>



            ';

        }else{



            $content .='





             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$checkfix.' style="width: 15px"></td>

            ';



        }



        $content .='



       

    </tr>



            <tr>

                <td  style="border-right:0px; "></td>



                ';



                if ($data->analis2 == 'Ada') { 



                    $content .='



                    <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$boxfix.' style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$checkfix.' style="width: 15px"></span></td>

                ';



            }



            $content .='



                

            </tr>



    <tr>

        <td  style="border-right:0px; border-bottom:0px">3.&nbsp;&nbsp;&nbsp;Ketersediaan Bahan</td>

        ';



        if ($data->bahan2 == 'Ada') { 



            $content .='



            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$boxfix.' style="width: 15px"></span></td>



            ';

        }else{



            $content .='





            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$checkfix.' style="width: 15px"></span></td>

            ';



        }



        $content .='

        

       

    </tr>



           <tr>

                <td  style="border-right:0px; "></td>

                ';



                if ($data->bahan == 'Baik') { 



                    $content .='



                    <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:14px">Kadaluarsa</span><span style="margin-left:45px"><img src='.$boxfix.' style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:14px">Kadaluarsa</span><span style="margin-left:45px"><img src='.$checkfix.' style="width: 15px"></span></td>

                ';



            }



            $content .='

                

            </tr>



     <tr>

        <td  style="border-right:0px; border-bottom:0px">4.&nbsp;&nbsp;&nbsp;Ketersediaan Alat</td>

        ';



        if ($data->alat == 'Ada') { 



            $content .='



            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$boxfix.' style="width: 15px"></span></td>



            ';

        }else{



            $content .='





            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$checkfix.' style="width: 15px"></span></td>

            ';



        }



        $content .='

        

       

    </tr>



            <tr>

                <td  style="border-right:0px; "></td>

                ';



                if ($data->alat2 == 'Baik') { 



                    $content .='



                   <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:15px">Rusak (sementara, permanen)**)</span><span style="margin-left:10px"><img src='.$boxfix.' style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='



                <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:15px">Rusak (sementara, permanen)**)</span><span style="margin-left:10px"><img src='.$checkfix.' style="width: 15px"></span></td>

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

             <br>



            Sumbawa Besar, '.$data->tanggal_diterima.' 

            <br/>

            Manajer Teknis

            <p></p>

            <p></p>

            <p></p>

            

            ('.$data->mt.')<br/>

            NIP. '.$data->nip_mt.'

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


$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Kesiapan_Pengujian.pdf');

require_once('footer.php');


?>