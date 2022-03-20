<?php

require_once ('header.php');

$file = explode('.', basename(__FILE__));

$set = $objectPrint->setNamaDokumen($file[0]);

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

        vertical-align: baseline;

    }



    td{

        border: 0.7px solid black;

        border-collapse: collapse;

        text-align: center;

        vertical-align: text-top;

        padding-top: 3px;

        

    }

        

    #garis {

        width: 95%;

        margin-left: 35px;



    }



    hr {

        border: none;

        height: 1px;

        color: black; 

        background-color: black;

    }



    div#lower{

        margin-left: 700px;

        }



     div#lower2{

    margin-left: 73px;

    }





</style>

';



$content .= '

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="10mm">

     <page_header> 

        <div align="center">

            <strong><img src='.$logo_horizontal.' width="1000px; height:150px"></strong>

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

$tampil = $objectPrint->tampil(@$_GET['id'], @$_GET['no_surat_tugas']);


}else {

   if(@$_SESSION['loginadminkh']) {

        echo "<script>alert('Nomor Surat Tugas Belum Diisi!')

        window.location='../admin.php?page=penyelia_analis'</script>";

    }else {

        echo "<script>alert('Nomor Surat Tugas Belum Diisi!')

        window.location='../manajer_teknis.php?page=penyelia_analis'</script>";

    }

    exit;

}

while ($data=$tampil->fetch_object()){

    $title = $objectPrint->title_dokumen.' | '.$data->no_surat_tugas;

    $pejabat = $objectPrint->getPejabat($data->nip_mt);

    if (strpos($data->nama_analis, "&") != false) {

        $x = explode("&", $data->nama_analis);

        $nama_analis = $x[0];

        $nama_analis2 = $x[1];
        
    }

    if (strpos($data->jab_analis, "&") != false) {
        
        $x = explode("&", $data->jab_analis);

        $jab_analis = $x[0];

        $jab_analis2 = $x[1];

    }

  

$content .= '





    <div align="center">

        <strong>'.$objectPrint->title_dokumen.'</strong>

        <br>No : '.$data->no_surat_tugas.'

    </div>

        <p></p>

    <div>

         Pada hari ini&nbsp;&nbsp;'.$data->hari.'&nbsp;&nbsp;Bulan '.$data->bulan.'&nbsp;&nbsp;Tahun '.$data->tahun.'&nbsp;&nbsp; ,ditugaskan penyelia dan analis dengan nama dan jabatan fungsional untuk melakukan pengujian sampel dengan kode :&nbsp;'.$data->kode_sampel.'
            &nbsp;sesuai rincian sebagaimana tersebut dibawah ini :

    </div>



        <p></p>


        <table style="text-align: center">

              <tr>

                <th style="width:5%; border-bottom:0px;padding-top: 15px" >No</th>

                <th style="width:14%; border-bottom:0px;padding-top: 15px">Nama</th> 

                <th colspan="2" style="width:15%;padding-top: 5px">Kedudukan*</th>

                <th style="width:10%;border-bottom:0px;padding-top: 15px">Jabatan</th>

                <th style="width:14%;border-bottom:0px;padding-top: 15px">Nomor Sampel</th>

                <th style="width:14%;border-bottom:0px;padding-top: 15px">Target Pengujian</th>

                <th style="width:15%;border-bottom:0px;padding-top: 15px">Metode Pengujian</th>

                <th style="width:12%;border-bottom:0px;padding-top: 15px">Jumlah Sampel</th>

              </tr>



             <tr>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px;padding-top: 10px"><b>Penyelia</b></td>

                <td style="border-top:0px;padding-top: 10px">&nbsp;&nbsp;<b>Analis</b>&nbsp;&nbsp;</td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

                <td style="border-top:0px"></td>

              </tr>



              <tr >

                ';

                    if (strpos($data->nama_analis, "&") != false) {

                        $content .='


                            <td style="width:5%; border-bottom:0px; ">1 <br><br><br> 2 <br><br><br><br> 3</td>

                            <td style="width:10%;border-bottom:0px; ">'.$data->nama_penyelia.'<br><br>'.$nama_analis.'<br><br><br><br>'.$nama_analis2.'</td>   

                            <td style="width:5%;border-bottom:0px;  "><img src='.$check.' width="25px; height:25px;"></td>

                            <td style="width:5%;border-bottom:0px; "><br><br><br><img src='.$check.' width="25px; height:25px;"><br><br><br><img src='.$check.' width="25px; height:25px;"></td>

                            <td style="width:10%;border-bottom:0px; ">'.$data->jab_penyelia.'<br><br>'.$jab_analis.'<br><br>'.$jab_analis2.'</td>

                            <td style="width:10%;border-bottom:0px; ">
                                '.$data->no_sampel.'
                            </td>

                            <td style="width:17%;border-bottom:0px; "> <em>'.$data->target_pengujian2.' </em></td>

                            <td style="width:15%;border-bottom:0px; ">'.$data->metode_pengujian.' </td>

                            <td style="width:10%;border-bottom:0px;">
                                '.$data->jumlah_sampel.'
                            </td>


                        ';
                        
                    }else{


                        $content .='


                            <td style="width:5%; border-bottom:0px; ">1 <br><br><br> 2</td>

                            <td style="width:10%;border-bottom:0px; ">'.$data->nama_penyelia.'<br><br>'.$data->nama_analis.'</td>   

                            <td style="width:5%;border-bottom:0px;  "><img src='.$check.' width="25px; height:25px;"></td>

                            <td style="width:5%;border-bottom:0px; "><br><br><br><img src='.$check.' width="25px; height:25px;"></td>

                            <td style="width:10%;border-bottom:0px; ">'.$data->jab_penyelia.'<br><br>'.$data->jab_analis.'</td>

                            <td style="width:10%;border-bottom:0px; ">
                                '.$data->no_sampel.'
                            </td>

                            <td style="width:17%;border-bottom:0px; "> <em>'.$data->target_pengujian2.' </em></td>

                            <td style="width:15%;border-bottom:0px; ">'.$data->metode_pengujian.' </td>

                            <td style="width:10%;border-bottom:0px;">
                                '.$data->jumlah_sampel.'
                            </td>


                        ';



                    }

                $content .='
                


              </tr>

              <tr>

                ';

                    if (strpos($data->nama_analis, "&") != false) {

                        $content .='


                            <td style="border-top:0px; padding-bottom: 10px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>


                        ';
                        
                    }else{


                        $content .='


                            <td style="border-top:0px; padding-bottom: 80px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>

                            <td style="border-top:0px"></td>


                        ';



                    }

                $content .='

                    

              </tr>



        </table>

    <br>

        <div>

            Keterangan: 
                <br>
                <sup>*)</sup> Beri tanda Check (<img src='.$check.' width="25px; height:30px;">) pada tempat yang sesuai
                <br>
                <sup>**)</sup> Coret Yang tidak Perlu    

        </div>

        <div  id="lower">

            <p></p>

            '.$pejabat->jabfung.',

            <p></p>

            <p></p>

            

            ('.$data->mt.')<br/>

            NIP. '.$data->nip_mt.'

        </div>';  

$a = $data->nama_sampel;

$b = $data->tanggal_penunjukan;              

}

$content .='    

</page>

';

$html2pdf = new \spipu\Html2Pdf\Html2Pdf('L','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Surat_Tugas'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');

?>