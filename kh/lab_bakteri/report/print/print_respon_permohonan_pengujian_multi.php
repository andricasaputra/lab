<?php

require_once ('header.php');

$tanggal = $objectTanggal->tgl_indo(date('Y-m-d'));

$content ='

<style>

    table {

        border: 0.7px solid black;

        border-collapse: collapse;

        width: 100%;

        padding:0px;

    }

    th{

        border: 0.7px solid black;

        border-collapse: collapse;

        padding:2px;

    }


    td{

        border: 0.7px solid black;
    }


    .tabel1 td {
        padding:4px;
    }

    .table2  {

        text-align: center;
    }


     .table2 td {

        padding: 5px 0px 50px;

    }

     .tabel3 td {

        padding: 5px 0px 3px;

        width: 429.3px;

        margin-left:200px;

    }

        
    div#garis {

        width: 99%;

    }


    div#lower{

        margin-left: 400px;

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

        height: 2000px;

    }

</style>

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="7mm">

     <page_header> 

        <div style="margin-left: 34px">

            <strong><img src='.$logo.' width="698px; height:150px"></strong>

        </div>

    </page_header>

    <page_footer>

        <div id="garis">

            <hr width="75%">

            <span style="margin-left: 10px;"><i>F.4.4.1. 3; Ter.1; Rev.0;03/08/2015</i></span>

        </div>

    </page_footer> ';



    $no=1;         

    if(@$_POST['print_data']){

        $tampil = $objectPrint->print_respon_permohonan(@$_POST['tgl_a'], @$_POST['tgl_b']);

    }else {

        $tampil = $objectPrint->tampil();
        exit;

    }

    if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }

    $rtitle = "respon permohonan pengujian";

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

    <br>

    <div>

            <b>Kepada</b> 

            <br>

            <b>Yth.</b> &nbsp;&nbsp;<b>'.$data->nama_pemilik .'</b>

            <br>

            <b>Di</b>

            <br>

            <span style="margin-left:30px"><b>Tempat</b></span>

    </div>

     ';

    if ($data->kesiapan == 'Ya') {
        $content .='

            <p style="text-indent: 0.3in;">Bersama ini kami beritahukan bahwa sampel media pembawa yang saudara kirimkan <span style="text-decoration: line-through;">ditolak/</span> dilanjutkan*) pengujian laboratorium sebagai berikut:</p>


        ';
    }else{

        $content .='

            <p style="text-indent: 0.3in;">Bersama ini kami beritahukan bahwa sampel media pembawa yang saudara kirimkan ditolak/<span style="text-decoration: line-through;"> dilanjutkan</span>*) pengujian laboratorium sebagai berikut:</p>


        ';

        
    }

    $content .='

<table cellpadding="10" class="tabel1">

    <tr>

       <td width="0" style="border-right:0px"> No. Surat Pengantar</td>

        <td width="18" align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="316"><b>'.$data->no_permohonan.'</b></td>

    </tr>

 
    <tr>

     <td width="0" style="border-right:0px">Jenis Sampel</td>

        <td width="18" align="center" style="border-right:0px; border-left: 0px"> :</td>

        <td width="316"><b>'.$data->nama_sampel.'</b></td>

    </tr>


    <tr>

        <td width="0" style="border-right:0px">Laboratorium*)</td>

        <td width="18"  align="center" style="border-right:0px; border-left: 0px;">:</td>

        <td width="444.2"><img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Lab KT &nbsp;&nbsp;<img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;Lab KH &nbsp;&nbsp;<img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;Lab Kehati Hewani/Nabati</td>

    </tr>


     <tr>

     <td width="0" style="border-right:0px; border-bottom:0px">Pengujian Diterima/Ditolak</td>

        <td width="0" align="center" style="border-right:0px; border-left: 0px; border-bottom:0px"> :</td>

        <td width="0" style=" border-bottom:0px">Dengan Pertimbangan :</td>

    </tr>

    <tr>

    <td width="0" style="border-right:0px; border-bottom:0px"></td>

        <td width="0" align="center" style="border-right:0px; border-left: 0px; border-bottom:0px"></td>

        <td width="0" style=" border-bottom:0px">Metode Pengujian :<b>  '.$data->metode_pengujian.' </b></td>

    </tr>

</table>



<table cellpadding="10" class="tabel3">

    <tr>

        <td  style="border-right:0px; border-bottom:0px; border-top: 0px"><span style="margin-left:205px">Penyelia</span></td>

        ';

        if ($data->penyelia == 'Kompeten') { 

         $content .='

            <td  style="border-bottom:0px; padding-left: -100px; border-top: 0px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$boxfix.' style="width: 15px">

            </td>

            ';

        }else{



            $content .='


            <td  style="border-bottom:0px; padding-left: -100px; border-top: 0px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$checkfix.' style="width: 15px">


            </td> 

            ';



        }

        $content .='

        

    </tr>



            <tr>

                <td  style="border-right:0px; border-bottom:0px "></td>



            ';



            if ($data->penyelia2 == 'Ada') { 



                $content .='



                <td  style="; padding-left: -100px; border-bottom:0px">Ada<span style="margin-left:55px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$boxfix.' style="width: 15px"></span>

                </td>



                ';

            }else{



                $content .='





                <td  style="; padding-left: -100px; border-bottom:0px">Ada<span style="margin-left:55px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$checkfix.' style="width: 15px"></span>

                </td>

                ';



            }



            $content .='



            </tr>





     <tr>

        <td  style="border-right:0px; border-bottom:0px"><span style="margin-left:205px">Analis</span></td>



        ';


        if ($data->analis == 'Kompeten') { 



            $content .='



            <td  style="border-bottom:0px; padding-left: -100px; border-top: 0px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src='.$checkfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$boxfix.' style="width: 15px">

            </td>



            ';

        }else{



            $content .='





            <td  style="border-bottom:0px; padding-left: -100px; border-top: 0px">Kompeten&nbsp;&nbsp;&nbsp;&nbsp; <img src='.$boxfix.' style="width: 15px">&nbsp;&nbsp;&nbsp;&nbsp;Tidak Kompeten&nbsp;&nbsp;&nbsp;&nbsp;<img src='.$checkfix.' style="width: 15px">



            

            </td> 

            ';

        }

        $content .='


    </tr>

            <tr>

                <td  style="border-right:0px; border-bottom:0px "></td>

                ';


                if ($data->analis2 == 'Ada') { 

                    $content .='

                    <td  style="; padding-left: -100px; border-bottom:0px">Ada<span style="margin-left:55px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$boxfix.' style="width: 15px"></span>

                    </td>

                    ';

                }else{

                    $content .='

                <td  style="; padding-left: -100px; border-bottom:0px">Ada<span style="margin-left:55px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:15px">Tidak Ada</span><span style="margin-left:52px"><img src='.$checkfix.' style="width: 15px"></span>

                </td>

                ';

            }

            $content .='

            </tr>
    <tr>

        <td  style="border-right:0px; border-bottom:0px"><span style="margin-left:205px">Bahan</span></td>

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

                <td  style="border-right:0px; border-bottom:0px "></td>

                ';

                if ($data->bahan == 'Baik') { 

                    $content .='

                    <td  style="; padding-left: -100px; border-bottom:0px">Baik<span style="margin-left:53px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:15px">Kadaluarsa</span><span style="margin-left:45px"><img src='.$boxfix.' style="width: 15px"></span></td>

                    ';

                }else{

                    $content .='

                <td  style="; padding-left: -100px; border-bottom:0px">Baik<span style="margin-left:53px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:15px">Kadaluarsa</span><span style="margin-left:45px"><img src='.$checkfix.' style="width: 15px"></span></td>

                ';

            }

            $content .='

            </tr>

    <tr>

        <td  style="border-right:0px; border-bottom:0px"><span style="margin-left:205px">Alat</span></td>

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

                <td  style="border-right:0px; border-bottom:0px "></td>

                ';



                if ($data->alat2 == 'Baik') { 



                    $content .='



                    <td  style="; padding-left: -100px ; border-bottom:0px">Baik<span style="margin-left:53px"><img src='.$checkfix.' style="width: 15px"></span><span style="margin-left:15px">Rusak </span><span style="margin-left:71px"><img src='.$boxfix.' style="width: 15px"></span></td>



                    ';

                }else{



                    $content .='


                <td  style="; padding-left: -100px ; border-bottom:0px">Baik<span style="margin-left:53px"><img src='.$boxfix.' style="width: 15px"></span><span style="margin-left:15px">Rusak </span><span style="margin-left:71px"><img src='.$checkfix.' style="width: 15px"></span></td>

                ';

            }


            $content .='

                
            </tr>

    <tr>

        <td  style="border-right:0px; border-bottom:0px"><span style="margin-left:205px">Tanggal Selesai Pengujian :  '.$data->tanggal_selesai.'</span></td>

        <td  style="border-bottom:0px;  padding-left: -100px"><span style="margin-left:55px"></span><span style="margin-left:15px"></span><span style="margin-left:52px"></span></td>

    </tr>

    <tr>

        <td  style="border-right:0px; border-bottom:0px"><span style="margin-left:205px">Persetujuan Pelanggan :</span></td>

        <td  style="; padding-left: -100px; border-bottom:0px"><span style="margin-left:30px">Setuju </span><span style="margin-left:50px"><img src='.$boxfix.' style="width: 15px"></span></td>

    </tr>

             <tr>

                <td  style="border-right:0px; "></td>

                <td  style="; padding-left: -100px"</span><span style="margin-left:30px">Tidak Setuju</span><span style="margin-left:17px"><img src='.$boxfix.' style="width: 15px"></span></td>

            </tr>

    <tr>

        <td  style="border-right:0px; border-bottom:0px"><span style="margin-left:0px">&nbsp;Penyampaian Persetujuan Pelanggan :</span></td>

        <td  style="; padding-left: -100px; border-bottom:0px"><span style="margin-left:-70px">Telepon </span><span style="margin-left:14px"><img src='.$boxfix.' style="width: 15px"></span> <span style="margin-left:30px"><em>Contact Person</em> :<b> '.$data->pemohon.'</b></span></td> 

    </tr>

            <tr>

                <td  style="border-right:0px; border-bottom: 0px"></td>

                <td  style="; padding-left: -100px; border-bottom: 0px"</span><span style="margin-left:-70px">Fax</span><span style="margin-left:44px"><img src='.$boxfix.' style="width: 15px"></span></td>

            </tr>

            <tr>

                <td  style="border-right:0px; border-top: 0px "></td>

                <td  style="; padding-left: -100px; border-top: 0px"</span><span style="margin-left:-70px">Lainnya</span><span style="margin-left:19px"><img src='.$boxfix.' style="width: 15px"></span></td>

            </tr>

    <tr>

        <td  style="border-right:0px; "><span style="margin-left:0px">&nbsp;Saran</span><span style="margin-left:84px">:</span>&nbsp;&nbsp;&nbsp;&nbsp;'.$data->saran.'</td>

        <td  style="; padding-left: -100px;"><span style="margin-left:-70px"></span></td> 

    </tr>

     <tr>

        <td  style="border-right:0px; ">&nbsp;<img src='.$boxfix.' style="width: 15px"><span style="margin-left:10px">Status Sampel :</span></td>

        <td  style="; padding-left: -100px; "><span style="margin-left:-200px"> Sudah diterima pada tanggal <b>'.$data->tanggal_diterima.' </b></span></td> 

    </tr>

</table>
    <br/>
        <div>

            Keterangan:  <sup>*)</sup> Coret yang tidak perlu 

        </div>

        <div id="lower2">

            <sup>**)</sup> Beri tanda check (<img src='.$check.' width="25px; height:25px;">) pada tempat yang sesuai <br><br>

             <span style="margin-left:-85px"> Demikian disampaikan untuk dapat diketahui </span>

        </div>

        <div  id="lower">

            <p></p>



            Sumbawa Besar, '.$data->tanggal_diterima.' 

            <br/>

            ';
            $ma = $data->ma;

            if ($ma == 'Muhammad Ridwan') {
               
               $content .='

                    Manajer Administrasi,<br/>

                        <br>

                        <p></p>

                        <p></p>

                        <p></p>

                        

                        ('.$data->ma.')<br/>

                        NIP. '.$data->nip_ma.'

                    </div> 

               ';


            }else{

                $content .='

                    <span style="margin-left: -24px">An.</span> Manajer Administrasi,<br/>

                        Deputi MA

                        <p></p>

                        <p></p>

                        <p></p>

                        

                        ('.$data->ma.')<br/>

                        NIP. '.$data->nip_ma.'

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

require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Respon_Permohonan_Pengujian.pdf');

require_once('footer.php');


?>