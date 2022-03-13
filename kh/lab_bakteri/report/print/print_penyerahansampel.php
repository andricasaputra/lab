<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0], 'kh');

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

        margin-left: 360px;

        padding-top :650px;

    }



     div#lower1{

        position: absolute; 

        margin-left: 34px;

        padding-top :664px;

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

            <i>'.$objectPrint->kode_dokumen.'</i>

        </div>



    </page_footer>

     ';



    $no=1;

                

    if(@$_GET['id'] !== ''){

        $tampil = $objectPrint->tampil(@$_GET['id']);

    }else {

        $tampil=$objectPrint->tampil();
        exit;

    }

    while ($data=$tampil->fetch_object()):

        $jum = $data->jumlah_sampel;
        $title = $objectPrint->title_dokumen.' | '.$data->no_permohonan;
        $bilangan = ucwords($objectNomor->bilangan($jum));



$content .= '



    <div align="center">

        <strong>'.$objectPrint->title_dokumen.'</strong> <br>

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

            ';

            if (strpos($data->kode_sampel, "spbbt") !== false) {
               
                $content .= '


                <td>Sapi Bibit</td>

                ';

            }elseif (strpos($data->kode_sampel, "sp") !== false) {
                $content .= '


                <td>Sapi Potong</td>

                ';
            }elseif (strpos($data->kode_sampel, "kb") !== false) {

                $content .= '


                <td>Kerbau Potong</td>

                ';

            }elseif (strpos($data->kode_sampel, "kd") !== false) {
                $content .= '


                <td>Kuda</td>

                ';
            }


            $content.= '

            

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



            if ($data->bagian_hewan == 'Serum') {



                $content .='



                <td style="padding-left: 33px">

                    <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Serum

                </td>';

            }else{



                $content .='



                <td style="padding-left: 33px">

                    <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Serum

                </td>';



            }



             if ($data->bagian_hewan == 'Pakan') {



                $content .='



                <td style="padding-left: 30px">

                    <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Pakan

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 30px">

                    <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Pakan

                </td>



                ';



            }



            $content .='
            

        </tr>



        <tr>  

            ';



            if ($data->bagian_hewan == 'Darah') {



                $content .='



                <td style="padding-left: 33px">

                    <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Darah

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 33px">

                    <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Darah

                </td>



                ';



            }



            if ($data->bagian_hewan == 'Telur') {



                $content .='



                <td style="padding-left: 30px">

                    <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Telur

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 30px">

                    <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Telur

                </td>



                ';



            }


         $content .='          

            

        </tr>



        <tr> 



            ';



            if ($data->bagian_hewan == 'Feses') {



                $content .='



                <td style="padding-left: 33px">

                    <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Feses

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 33px">

                    <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Feses

                </td>



                ';



            }



            if ($data->bagian_hewan == 'Media Lain') {



                $content .='



                <td style="padding-left: 30px">

                    <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Media Lain, Sebutkan : ..............

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 30px">

                    <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Media Lain, Sebutkan : ..............

                </td>



                ';



            }



         $content .='              

                             

        </tr>

        <tr> 



            ';



            if ($data->bagian_hewan == 'Daging') {



                $content .='



                <td style="padding-left: 33px">

                    <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Daging

                </td>

                

                ';

            }else{



                $content .='



                <td style="padding-left: 33px">

                    <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Daging

                </td>



                ';



            }


         $content .='              

                             

        </tr>




    </table>



    <p></p>



    <table>



         <tr>

            <td>4.&nbsp;&nbsp;Jumlah Sampel</td>

            <td>:</td>

            <td>'.$data->jumlah_sampel.' ('.$bilangan.')</td>

        </tr>



        <tr>

            <td></td>

            <td></td>

            <td></td>

        </tr>



         <tr>

            <td>5.&nbsp;&nbsp;Target Pengujian</td>

            <td>:</td>

            <td><em><b>'.$data->target_pengujian2.'</b></em></td>

        </tr>





         <tr>

            <td>6.&nbsp;&nbsp;Metode Pengujian</td>

            <td>:</td>

            <td> '.$data->metode_pengujian.' </td>

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



            Sumbawa Besar, '.$data->tanggal_penyerahan.' / '.$data->jam_diterima_pengelola_sampel.'

   

            <br/>
            ';

            if ($data->yang_menyerahkan =='Asiah') {

               $content .= '

               <span style="margin-left: -14px">An.</span> Yang Menyerahkan,

                <p></p>

                <p></p>

                <p></p>

                

                ('.$data->yang_menyerahkan.')<br/>

                NIP. '.$data->nip_ygmenyerahkan.'

               ';
            }else{

                 $content .= '

               Yang Menyerahkan,

                <p></p>

                <p></p>

                <p></p>

                

                ('.$data->yang_menyerahkan.')<br/>

                NIP. '.$data->nip_ygmenyerahkan.'

               ';

            }

            $content .='

            

        </div>        



        '; 

$a = $data->nama_sampel;

$b = $data->tanggal_penyerahan;               

endwhile;

                  

    $content .='    



</page>



';

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Penyerahan_Sampel_Pengujian'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');



?>