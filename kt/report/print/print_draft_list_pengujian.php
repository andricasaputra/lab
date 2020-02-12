<?php

require_once ('header.php');

$content ='

<style>

    table{

        width: 100%;

    }


    .table1, th, td{

        width: 80%;

        border: 0.75px solid black;

        border-collapse: collapse;

        vertical-align: text-top;

        text-align: center;

        padding : 7px 3px;

        word-break : break-all;

    }


</style>

';

    if(@$_POST['print_draft']){

        $tampil = $objectPrint->print_pertanggal(@$_POST['tgl_a'], @$_POST['tgl_b'] );

    }else {

        $tampil=$objectPrint->tampil();

    }

    if ($tampil->num_rows === 0) {
        echo '<script>alert("Tidak Ada Data Untuk Di Cetak! Periksa Kembali Pemilihan Tanggal");window.close();</script>';
        return false;
    }

    $rtitle = "list sampel uji";

    $title = ucwords($rtitle);

    $num = $tampil->num_rows;

    $no = 1 ;

$content .='

<page backtop="35mm" backleft="12mm" backright="10mm" backbottom="10mm">

     <page_header> 

        <div style="margin-left: 34px">

             <strong><img src="'.$logo_horizontal.'" width="1000px; height:150px"></strong>

        </div>

    </page_header>



        <div align="center"><b>'.strtoupper($rtitle).'</b></div>

        <br>


    <table class="table1">

        <tr>
            <th style="width: 5%">No</th>
            <th style="width: 10%">Tanggal Permohonan</th>
            <th style="width: 15%">Nama Sampel</th>
            <th style="width: 10%">Jumlah Sampel</th>
            <th style="width: 10%">Patogen</th>
            <th style="width: 22%">Target Pengujian</th>
            <th style="width: 15%">Kode Sampel</th>
            <th style="width: 10%">Nomor Sampel</th>

        </tr>

         ';

    
    while ($data=$tampil->fetch_object()):

    $i = $data->yang_menyerahkan;

    $bag = $data->bagian_tumbuhan;

    
$content .= '


        <tr>

            <td style="width: 5%">'.$no++.'</td>
            <td style="width: 15%">'.$data->tanggal_permohonan.'</td>
            ';

                if ($bag !=='') {
                    $content .= '

                        <td style="width: 15%">'.$data->nama_sampel.'<br>('.$bag.')</td>

                    ';
                }else{

                    $content .= '

                        <td style="width: 15%">'.$data->nama_sampel.'</td>

                    ';

                }

            $content .='
            
            <td style="width: 18%">'.$data->jumlah_sampel.'&nbsp;'.$data->satuan.'</td>
            ';
                if ($data->target_optk2 !== '') {

                    $content .='
                        <td style="width: 17%">'.$data->nama_patogen.' '.$data->nama_patogen2.'</td>
                        <td style="width: 17%"><em>'.$data->target_optk.' & '.$data->target_optk2.'</em></td>

                    ';

                }elseif ($data->target_optk3 !== '') {

                    $content .='
                        <td style="width: 17%">'.$data->nama_patogen.', '.$data->nama_patogen2.', '.$data->nama_patogen3.'</td>
                        <td style="width: 17%"><em>'.$data->target_optk.', '.$data->target_optk2.', '.$data->target_optk3.'</em></td>

                    ';

                }else{

                     $content .='
                        <td style="width: 17%">'.$data->nama_patogen.'</td>
                        <td style="width: 17%"><em>'.$data->target_optk.'</em></td>

                    ';

                }

            $content .='
            
            <td style="width: 18%">'.$data->kode_sampel.'</td>
            <td style="width: 17%">'.$data->no_sampel.'</td>
        </tr>


        '; 
             

endwhile;

                  

    $content .='   


    </table>


</page>



';



require_once($html2pdf);

$html2pdf = new HTML2PDF ('L','A4','en', 'UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Draft_Penyerahan_Sampel_Pengujian.pdf');

require_once('footer.php');





?>