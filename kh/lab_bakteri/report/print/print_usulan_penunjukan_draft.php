<?php

require_once ('header.php');

$content ='

<style>

    table {

        border: none;

        width: 100%;

        vertical-align: text-top;

    }



    th {

        border: none;

        border-collapse: collapse;

        padding: 3px;

    }



    td {

        border: none;

    }



    .tabel1 td {

        padding:5px;

    }


    .table2  {

        text-align: center;

    }


    .table2 td {

       vertical-align: text-top;

       padding-top: 10px;

       margin-bottom:20px;

       height : 400px;

       text-align: center;

    }

     
    div#garis {

        width: 90%;

        margin:auto;

        margin-left:-3px;

        padding-bottom: 20px

    }


    #garis {

        width: 95%;

        margin-left: 0px;

    }



    hr {

        border: none;

        height: 1px;

        color: black; 

        background-color: black;

    }


    div#lower{

        margin-left: 485px;

    }

</style>


<page backtop="35mm" backleft="5mm" backright="10mm" backbottom="10mm">

     <page_header> 

        <div style="margin-left: 34px">

            <strong></strong>

        </div>

    </page_header>

    <page_footer>

        <div id="garis">

        </div>



    </page_footer>

     ';



    $no=1;

                

    if(@$_GET['id'] !== ''){

        $tampil = $objectPrint->tampil(@$_GET['id']);


    } else {

       if(@$_SESSION['loginadminkh']) {

            echo "<script>alert('Nomor Sampel Masih Kosong!')

            window.location='../admin.php?page=penyelia_analis'</script>";

        }else {

            echo "<script>alert('Nomor Sampel Masih Kosong!')

            window.location='../manajer_teknis.php?page=penyelia_analis'</script>";

        }

        exit;

    }

    $rtitle = "Form Usulan Penunjukan Penyelia dan Analis Pengujian";

    while ($data=$tampil->fetch_object()){

        $title = ucwords($rtitle).' | '.$data->kode_sampel;

$content .= '


    <div align="center">

        <strong><h4></h4></strong>

    </div>

    <table cellpadding="10" class="tabel1">

    <tr>

        <td width="0"></td>

        <td width="18"  align="center"></td>

        <td width="0">
        <img src='.$check.' style="width: 35px;margin-left:65px"></td>

        <td width="200"></td>

        <td width="0"></td>

        <td width width="100"></td>

    </tr>


    <tr>

        <td width="0"></td>

        <td width="18" align="center"></td>

        <td width="202"><div style="margin-left: 70px">'.$data->tanggal_penunjukan.'</div></td>

        <td width="0"></td>

        <td width="0" align="left"> <span style="margin-left:-100px"></span></td>

        <td width="100"><span style="margin-left:-90px"><div style="margin-left: 70px">'.$data->bagian_hewan.'</div></span></td>

    </tr>


    <tr>

       <td width="0"></td>

        <td width="0" align="left">&nbsp;&nbsp;</td>

        <td width="130">
            <div style="margin-left: 70px">'.$data->kode_sampel.'</div>
        </td>

       <td width="0"></td>

        <td width="18" align="center" ><span style="margin-left:-104px"></span></td>

        <td width="105"><span style="margin-left:-90px">
            <div style="margin-left: 70px">'.$data->jumlah_sampel.'</div>
        </span></td>

    </tr>

    </table>

        <p></p>
        <p></p>
        <p></p>

        <table class="table2" >

              <tr>

                <th></th>

                <th></th>

                <th></th>

                <th></th>

                <th></th> 

                <th></th> 

                <th></th>

                <th></th>           

              </tr>


              <tr>
              
                <td style="width:5%">'.$no++.'</td>

                <td style="width:18%">'.$data->no_sampel.' </td>    

                <td style="width:16%">'.$data->nama_sampel.'</td> 

                <td style="width:12%"><em><b>'.$data->target_pengujian2.'</b></em></td>

                <td style="width:17%"">'.$data->metode_pengujian.'</td> 

                <td style="width:13%">'.$data->lab_penguji.'</td>  

                <td style="width:14%">'.$data->nama_penyelia.'</td>  

                <td style="width:11%">'.$data->nama_analis.'</td>  

              </tr>

        </table>


        <div id="lower" style="margin-top: 10px">

            <br/>
            <p></p>
            
           <div style="margin-left: 95px">'.$data->tanggal_penunjukan.' </div>
       
            <p></p>
            <p></p>
            <p></p>



            '.$data->mt.'<br/><br/>

            '.$data->nip_mt.'

        </div>


        ';

$a = $data->nama_sampel;

$b = $data->tanggal_penunjukan;                

}

$content .='    

</page>';

require_once($html2pdf);

$html2pdf = new HTML2PDF ('P','A4','en','UTF-8');

$html2pdf->WriteHTML($content);

$html2pdf->pdf->setTitle($title);

$html2pdf->Output('Form_Usulan_Penunjukan_Penyelia_&_Analis'.' '.$a.' '.$b.'.pdf');

require_once('footer.php');

?>