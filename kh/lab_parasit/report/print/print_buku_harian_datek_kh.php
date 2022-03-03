<?php

require_once ('header.php');

$content ='

<style>

    table{

        border: none;

        width: 100%;
    }


    td{

        text-align: left;

        vertical-align: text-top;

        padding: 8px;

    }

    ol{
         width: 80%;
         margin-top: -12px;
         margin-left :-21px
    }

    li{
        padding-bottom: 10px
    }

    p {
        margin-left: 150px;
    }

    p{
        margin-bottom : 0px;
    }

    h4{

        font-weight: normal;
    } 


</style>

';

$content .= '

<page backtop="50mm" backleft="5mm" backright="12mm" backbottom="10mm">

     <page_header> 

        <div align="center">

            <strong><img src='.$logo.' width="698px;"></strong>

        </div>

    </page_header>

    <page_footer>

        <div id="garis">

            <hr width="75%">

            <i>F.5.4.1.2; Ter.1; Rev.0;03/08/2015</i>

        </div>

    </page_footer>

     ';

    
$no=1;

       
if(isset($_POST['print_agenda'])){

$tampil = $objectPrint->CetakForBukuHarianDatek($_POST['tgl_a']);

$dataarr = array();

$tampilHasil = array();

while ($data = $tampil->fetch_object()) {


    $dataarr[] = $data;
    
}



}else {

    exit("Error Occured Bro");

}

if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
}

$rtitle = "buku harian laboratorium";

$title = ucwords(str_replace("<br/>", "", $rtitle));


$content .= '

    <div align="center">

        <strong><h3>'.strtoupper($rtitle).'</h3></strong>

    </div>

    <br/><br/>

    <p><h4>Buku Harian Laboratorium memuat :</h4></p>

    <br/>

    <p>a. Tanggal Pengujian</p>
    <p>b. Kode Sampel</p>
    <p>c. Target Pengujian</p>
    <p>d. Metode Pengujian</p>
    <p>e. Langkah -langkah dalam Pengujian</p>
    <p>f. Hasil Pengujian</p>
    <p>g. Analis</p>
    <p>h. Penyelia</p>

    
</page>

';  

foreach ($dataarr as $data) :

$content .='

<page backtop="35mm" backleft="5mm" backright="12mm" backbottom="10mm">

     <page_header> 

        <div align="center">

            <strong><img src='.$logo.' width="698px;"></strong>

        </div>

    </page_header>

    <page_footer>

        <div id="garis">

            <hr width="75%">

            <i>F.5.4.1.2; Ter.1; Rev.0;03/08/2015</i>

        </div>

    </page_footer>

    <table>

        

        <tr>

            <td>A.</td>
            <td>Tanggal Pengujian</td>
            <td>:</td>
            <td>'.$data->tanggal_pengujian.'</td>

        </tr>

        <tr>

            <td>B.</td>
            <td>Kode Sampel</td>
            <td>:</td>
            <td>'.$data->kode_sampel.'</td>

        </tr>

        <tr>

            <td>C.</td>
            <td>Target Pengujian</td>
            <td>:</td>
            ';

                if ($data->target_pengujian3 != '') {

                   $content .= '

                        <td><em>'.$data->target_pengujian2.' & '.$data->target_pengujian3.'</em></td>

                    ';

                } else {
                    $content .= '

                        <td><em>'.$data->target_pengujian2.'</em></td>


                    ';
                }

            $content .='
            

        </tr>

        <tr>

            <td>D.</td>
            <td>Metode Pengujian</td>
            <td>:</td>
            <td>'.$data->metode_pengujian.'</td>

        </tr>

        <tr>

            <td>E.</td>
            <td>Langkah-Langkah Dalam Pengujian</td>
            <td>:</td>
            <td>
                <ol>
                    <li>Tempatkan antigen pada suhu kamar dan kocok sampai homogen sebelum dipakai.</li>
                    <li>Teteskan 0,03 ml serum yang diuji berturut - turut pada kaca datar menggunakan mikropipet.</li>
                    <li>Teteskan 0,03 ml antigen degan cara yang sama diatas masing-masing serum yang diuji.</li>
                    <li>Aduk dengan tusuk gigi dan finitips.</li> 
                    <li>Goyang dengan gerakan berputar hingga terbaca hasilnya/ ketika kontrol + (positif) telah menunjukkan penggumpalan (aglutinasi).</li>
                    <li>Baca hasil segera.</li>

                </ol>
            </td>

        </tr>

        <tr>

            <td>F.</td>
            <td>Hasil Pengujian</td>
            <td>:</td>
            <td>

            ';

                $hasil = $objectPrint->GetIdCetakForBukuHarianDatek($data->id);

                while($data2 = $hasil->fetch_object()){

                    if ($data2->positif_negatif_target3 != '') {

                        if ($data2->positif_negatif == "Positif") {

                            $content.='

                                '.$data2->positif_negatif.' ('.$data2->no_sampel.') <br/>
                                '.$data2->positif_negatif_target3.' ('.$data2->no_sampel.')
                            ';

                        }else{


                            $content.='

                                '.$data2->positif_negatif.' <br/>
                                '.$data2->positif_negatif_target3.'
                            ';

                        }

                    } else {

                        if ($data2->positif_negatif == "Positif") {

                            $content.='

                                '.$data2->positif_negatif.' ('.$data2->no_sampel.')

                            ';

                        }else{


                            $content.='

                                '.$data2->positif_negatif.'

                            ';

                        }

                    }

                    

                    

                }

            $content.='

            </td>

        </tr>

        <tr>

            <td>G.</td>
            <td>Analis</td>
            <td>:</td>
            <td>'.$data->nama_analis.'</td>

        </tr>

        <tr>

            <td>H.</td>
            <td>Penyelia</td>
            <td>:</td>
            <td>'.$data->nama_penyelia.'</td>

        </tr>

        

    </table>

</page>

';  

endforeach;

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Buku_Harian-'.$objectTanggal->tgl_indo($_POST['tgl_a']).'.pdf');

require_once('footer.php');


?>