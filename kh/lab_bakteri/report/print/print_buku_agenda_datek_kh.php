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

        padding : 8px;

    }

    td{

        border: 0.7px solid black;

        border-collapse: collapse;

        text-align: center;

        vertical-align: text-top;

        padding: 8px;

    }


</style>

';

$content .= '

<page backtop="35mm" backleft="5mm" backright="12mm" backbottom="10mm">

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

       
if(isset($_POST['print_agenda'])){

$tampil = $objectPrint->print_agenda($_POST['tgl_a'], $_POST['tgl_b']);


}else {

    exit("Error Occured Bro");

}

if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
}

$content .= '

    <div align="center">

        <strong>'.$objectPrint->title_dokumen.'</strong>

    </div>

    <p></p>
    <p></p>

    <table style="text-align: center">

          <tr>

            <th>No</th>

            <th>Tgl Terima</th> 

            <th>Kode Sampel</th>

            <th>Nama Sampel</th>

            <th>Target Pengujian</th>

            <th width="5%">Metode <br> Pengujian</th>

            <th width="5%">Tgl Selesai <br> Pengujian </th>

            <th>Hasil Uji</th>

            <th width="20%">Analis</th>

            <th width="20%">Penyelia</th>

          </tr>

          ';

            while ($data = $tampil->fetch_object()):

            $content .='

          <tr>
            

            <td>'.$no++.'</td>
            <td>'.$objectTanggal->balik_tgl_indo2($data->tanggal_permohonan).'</td>
            <td>'.$data->kode_sampel.'</td>
            <td>'.$data->nama_sampel_lab.'</td>
            <td><em>'.$data->target_pengujian2.'</em></td>
            <td width="5%">'.$data->metode_pengujian.'</td>
            <td width="5%">'.$objectTanggal->balik_tgl_indo2($data->tanggal_sertifikat).'</td>
            <td>'.$data->positif_negatif.'</td>
            <td width="20%">

            ';

                if (strpos($data->nama_analis, "&") != false) {

                    $content .='

                        '.str_replace("&", "<br/>", $data->nama_analis).'

                    ';
                    
                }else{

                    $content .='

                        '.$data->nama_analis.'

                    ';

                }

            $content .='

            </td>
            <td width="20%">'.$data->nama_penyelia.'</td>

               
          </tr>

           ';      
       
            endwhile;

            $content .='
    </table>

</page>

';
$html2pdf = new \spipu\Html2Pdf\Html2Pdf('L','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($objectPrint->title_dokumen);

$html2pdf->Output('Buku_Agenda-'.$objectTanggal->tgl_indo($_POST['tgl_a']).'-s/d-'.$objectTanggal->tgl_indo($_POST['tgl_b']).'.pdf');

require_once('footer.php');





?>