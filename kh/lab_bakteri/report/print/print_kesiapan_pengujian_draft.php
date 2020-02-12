<?php

require_once ('header.php');

$content ='

<style>

    table {

        border: none

        width: 100%;

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

    .pad{
        padding-bottom: 15px
    }

    .penyelia1{
        margin-left:305px;
    }

    .penyelia1 td{
        padding-right: 115px
    }

    .penyelia2, .analis2, .bahan2, .alat2{
        margin-left:305px;
        margin-top: -15px
    }

    .penyelia2 td, .analis2 td, .bahan2 td, .alat2 td{
        padding-right: 115px
    }

    .analis1, .bahan1, .alat1{
        margin-left:305px;
        margin-top: 20px
    }

    .analis1 td, .bahan1 td, .alat1 td{
        padding-right: 115px
    }


    .bahan1{
        margin-top: 5px;
    }





</style>

<page backtop="35mm" backleft="12mm" backright="5mm" backbottom="10mm">

';

$no=1;   

    if(@$_GET['id'] !=''){

        $tampil = $objectPrint->tampil(@$_GET['id']);


    } else {

        $tampil=$objectPrint->cetak(date('Y-m-d'));

    }

    $rtitle = "kesiapan pengujian";

    while ($data=$tampil->fetch_object()):

        $title = ucwords($rtitle).' | '.$data->no_permohonan;

$content .='

<br>

<div class="pad" style="margin-left: 310px">
    <img src='.$check.' style="width: 30px">
</div>


<div>
    <div class="pad" style="margin-left: 200px">
        '.$data->kode_sampel.'
    </div>

    <div class="pad" style="margin-left: 200px">
        '.$data->kondisi_sampel.'
    </div>

    <div class="pad" style="margin-left: 200px">
        '.$data->jumlah_sampel.'
    </div>
</div>

<div style="padding-bottom:50px"></div>

<table style="width: 100%; text-align: center">

    <tr>
        <td style="width:5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1</td>
        <td style="width:35%">'.$data->target_pengujian.'</td>
        <td style="width:20%">'.$data->metode_pengujian.'</td>
        <td style="width:40%">'.$data->lama_pengujian.'</td>
    </tr>

</table>

';

if ($data->kesiapan == 'Ya') {
    $content .='

        <div style="margin-left: 195px;margin-top: 95px;margin-bottom: 15px">
            <span style=" text-decoration: line-through">---</span>
            <span style=" text-decoration: line-through">---</span>
        </div>

    ';
}else{

    $content .='

        <div style="margin-left: 145px;margin-top: 95px;margin-bottom: 15px">
            <span style=" text-decoration: line-through">---</span>
            <span style=" text-decoration: line-through">---</span>
        </div>

    ';

}

$content .='

<table class="penyelia1">
    
    <tr>
        ';

        if ($data->penyelia == 'Kompeten') {

            $content .='

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

                <td>
                    <div style="width: 30px"></div>
                </td>

            ';
            
        } else {

            $content .='

                <td>
                    <div style="width: 30px"></div>
                </td>

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

            ';

        }


        $content .='
        
    </tr>

</table>

<table class="penyelia2">
    
    <tr>
        ';

        if ($data->penyelia2 == 'Ada') {

            $content .='

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

                <td>
                    <div style="width: 30px"></div>
                </td>

            ';
            
        } else {

            $content .='

                <td>
                    <div style="width: 30px"></div>
                </td>

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

            ';

        }


        $content .='
    </tr>

</table>

<table class="analis1">
    
    <tr>
        ';

        if ($data->analis == 'Kompeten') {

            $content .='

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

                <td>
                    <div style="width: 30px"></div>
                </td>

            ';
            
        } else {

            $content .='

                <td>
                    <div style="width: 30px"></div>
                </td>

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

            ';

        }


        $content .='
    </tr>

</table>

<table class="analis2">
    
    <tr>
        ';

        if ($data->analis2 == 'Ada') {

            $content .='

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

                <td>
                    <div style="width: 30px"></div>
                </td>

            ';
            
        } else {

            $content .='

                <td>
                    <div style="width: 30px"></div>
                </td>

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

            ';

        }


        $content .='
    </tr>

</table>

<table class="bahan1">
    
    <tr>
        ';

        if ($data->bahan == 'Baik') {

            $content .='

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

                <td>
                    <div style="width: 30px"></div>
                </td>

            ';
            
        } else {

            $content .='

                <td>
                    <div style="width: 30px"></div>
                </td>

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

            ';

        }


        $content .='
    </tr>

</table>

<table class="bahan2">
    
    <tr>
        ';

        if ($data->bahan2 == 'Ada') {

            $content .='

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

                <td>
                    <div style="width: 30px"></div>
                </td>

            ';
            
        } else {

            $content .='

                <td>
                    <div style="width: 30px"></div>
                </td>

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

            ';

        }


        $content .='
    </tr>

</table>

<table class="alat1">
    
    <tr>
        ';

        if ($data->alat == 'Ada') {

            $content .='

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

                <td>
                    <div style="width: 30px"></div>
                </td>

            ';
            
        } else {

            $content .='

                <td>
                    <div style="width: 30px"></div>
                </td>

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

            ';

        }


        $content .='
    </tr>

</table>

<table class="alat2">
    
    <tr>
        ';

        if ($data->alat2 == 'Baik') {

            $content .='

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

                <td>
                    <div style="width: 30px"></div>
                </td>

            ';
            
        } else {

            $content .='

                <td>
                    <div style="width: 30px"></div>
                </td>

                <td>
                    <img src='.$check.' style="width: 30px">
                </td>

            ';

        }


        $content .='
    </tr>

</table>

';

if ($data->kesiapan == 'Ya') {
    $content .='

        <div style="margin-left: 345px;margin-top:80px">
            <span style=" text-decoration: line-through">---</span>
            <span style=" text-decoration: line-through">---</span>
        </div>

    ';
}else{

    $content .='

        <div style="margin-left: 290px;margin-top:80px">
            <span style=" text-decoration: line-through">---</span>
            <span style=" text-decoration: line-through">---</span>
        </div>

    ';

}

$content.= '

<div style="margin-left: 500px;margin-top:60px">
    '.$data->tanggal_diterima.'
</div>

<div style="margin-left: 420px;margin-top:53px">
    '.$data->mt.'
</div>

<div style="margin-left: 430px;">
    '.$data->nip_mt.'
</div>



';

$a = $data->nama_sampel;

$b = $data->tanggal_diterima;                

endwhile;
            
    $content .='    

</page>

';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Kesiapan_Pengujian'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');


?>