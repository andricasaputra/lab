<?php



require_once ('header.php');



$tanggal = tgl_indo(date('Y-m-d'));



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

';



$content .= '

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="10mm">

     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src="../../../assets/img/logolabfix.jpg" width="698px; height:150px"></strong>

        </div>

    </page_header>

    <page_footer>

        <div id="garis">

            <hr width="75%">

            <span style="margin-left: 10px;"><i>F.4.4.1 1; Ter.1; Rev.0;03/08/2015</i></span>

        </div>

    </page_footer> ';
   

     $no=1;   

    if(@$_GET['id'] && @$_GET['tanggal']  !== ''){

        $tampil = $objectData->tampil(@$_GET['id']);

        $tampil2 = $objectData->cetak(@$_GET['tanggal']);

        $tampil3 = $objectData->cetak(@$_GET['tanggal']);

        $tampil4 = $objectData->cetak(@$_GET['tanggal']);

        }else {

            $tampil=$objectData->cetak(date('Y-m-d'));

            $tampil2 = $objectData->cetak(@$_GET['tanggal']);

            $tampil3 = $objectData->cetak(@$_GET['tanggal']);

            $tampil4 = $objectData->cetak(@$_GET['tanggal']);


    }

        while ($data=$tampil->fetch_object()):


$content .= '





    <div align="center">

        <strong>KESIAPAN PENGUJIAN</strong>

    </div>

    <p></p>





    <table cellpadding="10" class="tabel1">



    <tr>

        <td width="0" style="border-right:0px">Laboratorium*)</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px;">:</td>

        <td width="459"><img src="../../../assets/img/boxfix.png" style="width: 15px">&nbsp;&nbsp;Lab KT &nbsp;&nbsp;<img src="../../../assets/img/checkfix.png" style="width: 15px">&nbsp;&nbsp;Lab KH &nbsp;&nbsp;<img src="../../../assets/img/boxfix.png" style="width: 15px">&nbsp;&nbsp;Lab Kehati Hewani/Nabati</td>

    </tr>



    <tr>

       <td width="0" style="border-right:0px"> Kode Sampel</td>

        <td width="18" align="center" style="border-right:0px; border-left: 0px"> :</td>

        

        <td width="316">
            ';

            

             while ($data2 = $tampil2->fetch_object()):


                $arr  = $data2->kode_sampel_sapi;

                $arr2 = $data2->kode_sampel_sapi_bibit;

                $arr3 = $data2->kode_sampel_kerbau;

                $arr4 = $data2->kode_sampel_kuda;

                $arr5 = $data2->kode_sampel_lain;
                            
                $r[] = $arr;
                $s[] = $arr2;
                $t[] = $arr3;
                $u[] = $arr4;
                $v[] = $arr5;

                $filter  = array_filter($r);
                $filter2 = array_filter($s);
                $filter3 = array_filter($t);
                $filter4 = array_filter($u);
                $filter5 = array_filter($v);

                $curr   = current($filter);
                $end    = end($filter); 

                $curr2  = current($filter2);
                $end2   = end($filter2); 

                $curr3  = current($filter3);
                $end3   = end($filter3); 

                $curr4  = current($filter4);
                $end4   = end($filter4); 

                $curr5  = current($filter5);
                $end5   = end($filter5); 
    
                endwhile;

                if (count(array_filter($r)) !== 0) {

                    if (count($filter) == 1) {

                        $content .='

                        '.$curr.'<br>

                        ';

                    }else{

                        $content .='

                        '.$curr.' s/d '.$end.'<br>

                        ';
                    }

                }

                if (count(array_filter($s))  !== 0) {
                    if (count($filter2) == 1) {

                        $content .='

                        '.$curr2.'<br>

                        ';

                    }else{

                        $content .='

                        '.$curr2.' s/d '.$end2.'<br>

                        ';
                    }

                }

                if (count(array_filter($t))  !== 0) {
                    if (count($filter3) == 1) {

                        $content .='

                        '.$curr3.'<br>

                        ';

                    }else{

                        $content .='

                        '.$curr3.' s/d '.$end3.'<br>

                        ';
                    }

                }

                if (count(array_filter($u))  !== 0) {
                    if (count($filter4) == 1) {

                        $content .='

                        '.$curr4.'<br>

                        ';

                    }else{

                        $content .='

                        '.$curr4.' s/d '.$end4.'<br>

                        ';
                    }

                }

                if (count(array_filter($v))  !== 0) {
                    if (count($filter5) == 1) {

                        $content .='

                        '.$curr5.'

                        ';

                    }else{

                        $content .='

                        '.$curr5.' s/d '.$end5.'

                        ';
                    }
                }


            $content .='

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
        ';


                while ($data3 = $tampil3->fetch_object()) {

                    $jum = $data3->jumlah_sampel;

                    $array[] = $jum;

                }

                
                $jml = (array_sum($array));

                $content .='

                '.$jml.'

                ';


        $content .='
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

                <td style="width:45%"><em><b>'.$data->target_pengujian2.'</b></em></td>

                 <td style="width:30%;">'.$data->metode_pengujian.'  </td>

                <td style="width:20%;">
                ';
                  

                    while ($data4 = $tampil4->fetch_object()) {

                        $lama = $data4->lama_pengujian;

                         $arrlama[] =  $lama;

                         $uni = array_unique($arrlama);

                    }

                    sort($uni);

                    foreach ($uni as $key) {
                             $content .='

                            '.$key.'<br>

                            ';

                         }

                $content .='
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



             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src="../../../assets/img/checkfix.png" style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../../assets/img/boxfix.png" style="width: 15px"></td>



            ';

        }else{



            $content .='





             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src="../../../assets/img/boxfix.png" style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../../assets/img/checkfix.png" style="width: 15px"></td>

            ';



        }



        $content .='



       

    </tr>



            <tr>

                <td  style="border-right:0px; "></td>

                ';



                if ($data->penyelia2 == 'Ada') { 



                    $content .='



                    <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                    <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span></td>

                    ';



                }



            $content .='

                

            </tr>





     <tr>

        <td  style="border-right:0px; border-bottom:0px">2.&nbsp;&nbsp;&nbsp;Ketersediaan Analis</td>



        ';



        if ($data->analis == 'Kompeten') { 



            $content .='



             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src="../../../assets/img/checkfix.png" style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../../assets/img/boxfix.png" style="width: 15px"></td>



            ';

        }else{



            $content .='





             <td  style="border-bottom:0px; padding-left: -100px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src="../../../assets/img/boxfix.png" style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src="../../../assets/img/checkfix.png" style="width: 15px"></td>

            ';



        }



        $content .='



       

    </tr>



            <tr>

                <td  style="border-right:0px; "></td>



                ';



                if ($data->analis2 == 'Ada') { 



                    $content .='



                    <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                <td  style="; padding-left: -100px">Ada<span style="margin-left:55px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span></td>

                ';



            }



            $content .='



                

            </tr>



    <tr>

        <td  style="border-right:0px; border-bottom:0px">3.&nbsp;&nbsp;&nbsp;Ketersediaan Bahan</td>

        ';



        if ($data->bahan2 == 'Ada') { 



            $content .='



            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span></td>



            ';

        }else{



            $content .='





            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span></td>

            ';



        }



        $content .='

        

       

    </tr>



           <tr>

                <td  style="border-right:0px; "></td>

                ';



                if ($data->bahan == 'Baik') { 



                    $content .='



                    <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span><span style="margin-left:14px">Kadaluarsa</span><span style="margin-left:45px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='





                <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span><span style="margin-left:14px">Kadaluarsa</span><span style="margin-left:45px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span></td>

                ';



            }



            $content .='

                

            </tr>



     <tr>

        <td  style="border-right:0px; border-bottom:0px">4.&nbsp;&nbsp;&nbsp;Ketersediaan Alat</td>

        ';



        if ($data->alat == 'Ada') { 



            $content .='



            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span></td>



            ';

        }else{



            $content .='





            <td  style="border-bottom:0px;  padding-left: -100px">Ada<span style="margin-left:55px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span></td>

            ';



        }



        $content .='

        

       

    </tr>



            <tr>

                <td  style="border-right:0px; "></td>

                ';



                if ($data->alat2 == 'Baik') { 



                    $content .='



                   <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span><span style="margin-left:15px">Rusak (sementara, permanen)**)</span><span style="margin-left:10px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='



                <td  style="; padding-left: -100px">Baik<span style="margin-left:53px"><img src="../../../assets/img/boxfix.png" style="width: 15px"></span><span style="margin-left:15px">Rusak (sementara, permanen)**)</span><span style="margin-left:10px"><img src="../../../assets/img/checkfix.png" style="width: 15px"></span></td>

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

            Kesimpulan Kesiapan Pengujian : Ya / Tidak **) <br/>

            Keterangan: <sup>*)</sup> Beri Tanda Check (<img src="../../../assets/img/check1.png" width="25px; height:25px;">) pada tempat yang sesuai

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
               

endwhile;
            
    $content .='    

</page>



';


require_once('../../../assets/html2pdf/html2pdf2.class.php');

$html2pdf = new HTML2PDF ('P','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->Output('Kesiapan_Pengujian.pdf');

require_once('footer.php');


?>