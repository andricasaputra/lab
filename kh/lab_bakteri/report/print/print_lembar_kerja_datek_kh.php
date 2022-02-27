<?php

require_once ('header.php');

$content ='

<style>

    .table1{

        border: none;

        width: 100%;
    }



    .table1 td{

        border: none;

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

            <i>F.5.4.1.1 H; Ter.1; Rev.0;03/08/2015</i>

        </div>

    </page_footer>

     ';

    
$no=1;

       
if(isset($_POST['print_agenda'])){

    $tampil = $objectPrint->CetakForLembarKerjaDatek($_POST['tgl_a']);


}else {

    exit("Error Occured Bro");

}

if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
}

$rtitle = "lembar kerja data teknis hasil pemeriksaan laboratorium karantina hewan <br/> metode RBT";

$title = ucwords(str_replace("<br/>", "", $rtitle));


$content .= '

    <div align="center">

        <strong>'.strtoupper($rtitle).'</strong>

    </div>

    <p></p>
    <p></p>

    <table class="table1">

        ';

        $lab_penguji = array();

        $metode_pengujian = array();

        $kode_sampel = array();

        $jumlah_sampel = array();

        $tanggal_penyerahan_lab = array();

        $tanggal_pengujian = array();

        $tanggal_sertifikat = array();

        $no_sampel = array();

        while ($data = $tampil->fetch_object()):

            $getFromHasil = $objectPrint->GetIdCetakForLembarKerjaDatek($data->id);

            $dataHasil = $getFromHasil->fetch_object();

            $lab_penguji[] = $data->lab_penguji;

            $metode_pengujian[] = $data->metode_pengujian;

            $kode_sampel[] = $data->kode_sampel;

            $jumlah_sampel[] = $data->jumlah_sampel;

            $tanggal_penyerahan_lab[] = $data->tanggal_penyerahan_lab;

            $tanggal_pengujian[] = $data->tanggal_pengujian;

            $tanggal_sertifikat[] = $data->tanggal_sertifikat;

            $no_sampel[] = $dataHasil->no_sampel;
 
        endwhile;

        /*foreach ($dataarr as $data) {

            $data2[] = $data;

            array_filter($data2);

        }*/

        var_dump(count($jumlah_sampel));die;


        $content .='

    </table>

</page>

';

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Lembar-Kerja-Data-Teknis-'.$objectTanggal->tgl_indo($_POST['tgl_a']).'.pdf');

require_once('footer.php');

?>