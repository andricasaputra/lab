<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0], 'kt', false);

$content ='

<style>



    table{

        border: 0.7px solid black;

        border-collapse: collapse;

        width: 100%;

    }


    th{

        border: 0.7px solid black;

        border-collapse: collapse;

        text-align: center;

    }


    td{

        border: 0.7px solid black;

        border-collapse: collapse;

        text-align: center;

        vertical-align: text-top;

        padding-top: 7px;

        width : fixed;

        wordwrap: break-word;

    }

        
    div#lower{

        margin-left: 400px;

    }



    div#lower2{

        margin-left: 73px;

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

        <div align="center">

            <strong><img src="'.$logo.'" width="698px; height:150px"></strong>

        </div>

    </page_header>

    <page_footer>

        <div id="garis">

            <hr>

            <span style="margin-left: 10px;"><i>F.4.4.1 1; Ter.1; Rev.0;03/08/2015</i></span>

        </div>

    </page_footer> ';



    $no=1;

                

    if(@$_GET['id'] !== ''){

        $tampil = $objectPrint->tampil(@$_GET['id']);

    }else {

        $tampil=$objectPrint->tampil();

    }

    while ($data=$tampil->fetch_object()){

    $bilangan = ucwords($objectNomor->bilangan($data->jumlah_sampel));

    $title = $objectPrint->title_dokumen.' | '.$data->no_permohonan;


$content .= '


        <div align="center">

            <strong>'.$objectPrint->title_dokumen.'</strong>

        </div>

        <p></p>

    <div>

                Laboratorium*)&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        

       <div style="display: inline, paddingleft: 30px">

                <img src="'.$checkfix.'" style="width: 15px">

                Lab KT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <img src="'.$boxfix.'" style="width: 15px">

                Lab KH  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <img src="'.$boxfix.'" style="width: 15px">

                Lab Kehati Hewani/Nabati

        </div>

            <br>

        <div>

        Kode Sampel&nbsp;&nbsp;&nbsp;  :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->kode_sampel.'

        </div>

         <br>

        <div>

        Jenis Sampel&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->bagian_tumbuhan.''.$data->vektor.''.$data->media.'

        </div>

    </div>



        <p></p>





        <table >

              <tr>

                <th style="width:5%;" >No</th>

                <th style="width:20%;">Nama Sampel</th> 

                <th style="width:20%;">Jumlah/ Volume Sampel</th>

                <th style="width:35%;"> Target Pengujian</th>

                <th style="width:20%;">Metode Pengujian</th>

              </tr>



              <tr >

                

                <td style="width:5%; border-bottom:0px;">1</td>

                <td style="width:20%; border-bottom:0px;">'.$data->nama_sampel.'</td>

                <td style="width:20%; border-bottom:0px;">'.$data->jumlah_sampel.'<br>('.$bilangan.')<br>'.$data->satuan.'</td>

                <td style="width:35%;border-bottom:0px;">

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



                            <b>'.$data->nama_patogen.'</b><br>(<em>'.$data->target_optk.', '.$data->target_optk2.', '.$data->target_optk3.'</em>)



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



                        <b>'.$data->nama_patogen.'</b><br>(<em>'.$data->target_optk.'</em>) 



                        ';



                    }



                $content .='

                </td>

                <td style="width:20%;border-bottom:0px; ">

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

              <tr>

                    <td style="border-top:0px; padding-bottom: 350px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

                    <td style="border-top:0px"></td>

              </tr>



        </table>

        <p></p>



        <div>

            Keterangan: <sup>*)</sup> Coret yang tidak perlu

        </div>

        <div id="lower2">

            <sup>**)</sup> Beri tanda Check (<img src="'.$check.'" width="25px; height:30px;">) pada tempat yang sesuai

        </div>



        <div  id="lower">

            <p></p>



            Sumbawa Besar, '.$data->tanggal_diterima.' 

            <br/>

            ';

            if ($data->ma == 'Muhammad Ridwan') {
                $content .='


                Manajer Administrasi,<br/><br/>

                <p></p>

                <p></p>

                <p></p>

                

                ('.$data->ma.')<br/>

                NIP. '.$data->nip_ma.'


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

                ';
            }


            $content .='

        
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

$html2pdf->Output('Permintaan_Kesiapan_Pengujian'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');


?>