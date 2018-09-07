<?php

require_once ('header.php');

$tanggal = $objectTanggal->tgl_indo(date("Y-m-d"));

$bulan = $objectTanggal->bulan(date("m")); 

$tahun = date('Y');

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

        </div>

    </page_footer>

     ';

    
$no=1;

       
if(isset($_POST['print_data'])){

$tampil = $objectPrint->printDraft($_POST['tgl_a'], $_POST['tgl_b']);


}else {

    exit("Error Occured Bro");

}


if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
}

$rtitle = "daftar pengambilan sampel";

$title = ucwords(str_replace("<br/>", "", $rtitle));


$content .= '

    <div align="center">

        <h3><strong>'.strtoupper($rtitle).'</strong></h3>

    </div>

    <br/>

    Tanggal : '.$objectTanggal->tgl_indo($_POST['tgl_a']).' - '.$objectTanggal->tgl_indo($_POST['tgl_b']).'

    <br/><br/>

    <table style="text-align: center">

          <tr>

            <th rowspan="2" style="vertical-align: middle">No</th>

            <th rowspan="2" style="vertical-align: middle">Nama Perusahaan</th> 

            <th rowspan="2" style="vertical-align: middle"> Asal</th>

            <th rowspan="2" style="vertical-align: middle">Jumlah</th>

            <th colspan="2">No. Aju</th>

            <th colspan="4">No Sampel</th>

            <th colspan="2">No Agenda</th>

            <th rowspan="2" style="vertical-align: middle">Ket</th>

          </tr>

          <tr>

            <th>RBT</th>

            <th>AT</th> 

            <th colspan="2">RBT</th>

            <th colspan="2">AT</th>

            <th>RBT</th>

            <th>AT</th>


          </tr>

          ';
            $no = 1;

            while ($data = $tampil->fetch_object()) :

                $no_aju_rbt = explode("/", $data->ano_permohonan);

                $no_aju_rbt = $no_aju_rbt[0];

                $no_aju_at = explode("/", $data->bno_permohonan);

                $no_aju_at = $no_aju_at[0];

                if ($no_aju_at == '') {

                    $no_aju_at = "-";
                }

                $no_sampel_rbt = explode("/", $data->ano_sampel);


                if (count($no_sampel_rbt) === 1 || count($no_sampel_rbt) === 0) {

                    $end_no_sampel_rbt = "-";

                }else{

                    $end_no_sampel_rbt = end($no_sampel_rbt);

                }
               
                $no_sampel_rbt = $no_sampel_rbt[0];

                if ($no_sampel_rbt == '') {

                    $no_sampel_rbt = "-";
                }

                $no_sampel_at = explode("/", $data->bno_sampel);

                if (count($no_sampel_at) === 1 || count($no_sampel_at) === 0) {

                    $end_no_sampel_at = "-";

                }else{

                    $end_no_sampel_at = end($no_sampel_rbt);

                }

                $no_sampel_at = $no_sampel_at[0];

                if ($no_sampel_at == '') {

                    $no_sampel_at = "-";
                }

                $no_agenda = explode("/", $data->ano_agenda);

                $no_agenda = $no_agenda[0];


          $content .='

          <tr>

            <td style="width: 5%;">'.$no++.'</td>

            <td style="width: 13%">'.$data->anama_pemilik.'</td> 

            <td style="width: 15%">'.$data->aalamat_pemilik.'</td>

            <td style="width: 5%">'.$data->ajumlah_sampel.'</td>

            <td style="width: 7%">'.$no_aju_rbt.'</td>

            <td style="width: 7%">'.$no_aju_at.'</td>

            <td style="width: 8%">'.$no_sampel_rbt.'</td>

            <td style="width: 8%">'.$end_no_sampel_rbt.'</td>

            <td style="width: 8%">'.$no_sampel_at.'</td>

            <td style="width: 8%">'.$end_no_sampel_at.'</td>

            <td style="width: 6%">'.$no_agenda.'</td>

            <td style="width: 6%"></td>

            <td style="width: 6%">'.str_replace("Darah", "", $data->anama_sampel).'</td>


          </tr>

      ';

       endwhile;
      $content .='

          
    </table>

</page>

';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('L','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Daftar Pengambilan Sampel-'.$objectTanggal->tgl_indo($_POST['tgl_a']).'-s/d-'.$objectTanggal->tgl_indo($_POST['tgl_b']).'.pdf');

require_once('footer.php');





?>