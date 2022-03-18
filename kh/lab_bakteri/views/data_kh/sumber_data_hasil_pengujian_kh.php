<?php

include_once ("header_source.php");

$col =array(

    0   =>  'id',
    1   =>  'tanggal_sertifikat',
    2   =>  'no_sertifikat',
    3   =>  'no_sampel',
    4   =>  'kode_sampel',
    5   =>  'nama_sampel_lab',
    6   =>  'waktu_apdate_sertifikat'


);  

$othersql = $objectData->infoHasilPengujian();

$fetch = $othersql->fetch_object();

if ($fetch != null) {
    
    $result_no_sertifikat = $fetch->no_sertifikat;

    $result_waktu_apdate_sertifikat = $fetch->waktu_apdate_sertifikat;

    $result_id = $fetch->id;

}else{

    $result_no_sertifikat = '1';

    $result_waktu_apdate_sertifikat = '1';

    $result_id = 0;
}

$sql = "SELECT * FROM input_permohonan_kh WHERE kesiapan = 'Ya' ";

include_once ("sortir_hasil.php");

if(@$_POST["search"]["value"] != NULL){

    $sql .=" AND (id LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR tanggal_sertifikat LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR no_sertifikat LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR kode_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR nama_sampel_lab LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR no_sampel LIKE '%".@$_POST['search']['value']."%' )";

}

if(isset($_POST["order"]))
{
 $sql .= 'ORDER BY '.$col[@$_POST['order']['0']['column']].' '.@$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= ' ORDER BY id DESC ';
}

$sql1 = '';

if(@$_POST["length"] != -1 && @$_POST["length"] !== NULL)
{
 $sql1 = 'LIMIT ' . @$_POST['start'] . ', ' . @$_POST['length'];
}

$query = $conn->query($sql);

if (! $query) {
    trigger_error($conn->error);
}

$totalData = $query->num_rows;

$query = $conn->query($sql . $sql1);

$data = array();

$nomor = 1;

while($data2 = $query->fetch_object()){

    $id2 =  $data2->id;

    $isi = $data2->no_sertifikat;

    $selesai = $data2->no_agenda;

    $rek = $data2->rekomendasi;

    /*Input Lebih Dari 1 Hasil Pengujian*/

    $banyak_sampel = $data2->jumlah_sampel;

    $j = $data2->no_sampel;

    if (strpos($data2->nama_sampel_lab, "Bibit") !== false) {

        $qu2 = $objectHasil->input_ulang_bibit($id2);

        $num = $qu2->num_rows;

        $qu = $objectHasil->tampil_hasil_bibit($id2);

        $has = $qu->fetch_assoc();

        $f = $has['positif_negatif'] ?? NULL;

        $r = $data2->no_sampel;


    }else{

        $qu2 = $objectHasil->input_ulang($id2);

        $num = $qu2->num_rows;

        $qu = $objectHasil->tampil_hasil($id2);

        $has = $qu->fetch_assoc();
       
        $f = $has['positif_negatif'] ?? NULL;
     
        if($banyak_sampel != 1 && $j !== ''){   

          $x = explode("-", $j);

          $k = $x[0];

          $l = $x[1] ?? 0;

          $r = $k.'-'.$l;

        }else{

          $r = $data2->no_sampel;

        }

    }

    $nmr = $nomor++;

    $bilangan = ucwords($objectNomor->bilangan($data2->jumlah_sampel));

    $dat = array("no" => $nmr);

    $subdata = array();

        if (strlen($f) === 0 || strlen($isi) === 0 ) {



            $subdata[] = "<span class='kosong'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->tanggal_sertifikat."</span>";

            $subdata[] = "<span class='kosong'>".$data2->no_sertifikat."</span>";

            $subdata[] = "<span class='kosong'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='kosong'><div style='word-wrap: break-word'>".$data2->no_sampel."</div></span>";

            $subdata[] = "<span class='kosong'>".$data2->nama_sampel_lab."</span>";

                          
            // || $banyak_sampel > $num
        }elseif (strlen($f) === 0) {

            $subdata[] = "<span class='nonuji'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->tanggal_sertifikat."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->no_sertifikat."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->kode_sampel."</span>";  

            $subdata[] = "<span class='nonuji'><div style='word-wrap: break-word'>".$data2->no_sampel."</div></span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->nama_sampel_lab."</span>";

              

        }elseif (strlen($selesai) === 0) {

            $subdata[] = "<span class='proses'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->tanggal_sertifikat."</span>";

            $subdata[] = "<span class='proses'>".$data2->no_sertifikat."</span>";

            $subdata[] = "<span class='proses'>".$data2->kode_sampel."</span>";  

            $subdata[] = "<span class='proses'><div style='word-wrap: break-word'>".$data2->no_sampel."</div></span>"; 

            $subdata[] = "<span class='proses'>".$data2->nama_sampel_lab."</span>";

              

        }else{


            $subdata[] = "<span class='selsesai'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='selsesai'>".$data2->tanggal_sertifikat."</span>";

            $subdata[] = "<span class='selsesai'>".$data2->no_sertifikat."</span>"; 

            $subdata[] = "<span class='selsesai'>".$data2->kode_sampel."</span>";

            $subdata[] = "<span class='selsesai'><div style='word-wrap: break-word'>".$data2->no_sampel."</div></span>";

            $subdata[] = "<span class='selesai'>".$data2->nama_sampel_lab."</span>";

         
        }


        if(strlen($rek) === 0){

            $subdata[] = '

                 <i class="fa fa-exclamation-circle kosong"></i> <i>Pending </i>
                ';


        }elseif (strlen($selesai) === 0) {
            //|| $banyak_sampel > $num
            if (strlen($f) === 0 ) {

                $subdata[] = '

                <a><button type="button" class="btn btn-kusuccess btn-xs btn-not-allowed" disabled><i class="fa fa-plus-circle fa-fw"></i> Input</button></a>

                <a id="input_hasil" class="btn btn-info btn-xs" href="./lab_bakteri/views/input_hasil_pengujian_kh.php?id='.$data2->id.'&no_sampel='.$r.'&nama_sampel='.$data2->nama_sampel.'" target="_blank"><i class="fa fa-flask fa-fw"></i>Input Hasil Uji</a> 

                <a href="#"><button type="button" class="btn btn-danger btn-xs btn-not-allowed" disabled><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';

            }elseif(strlen($isi) === 0){


            $subdata[] = '

                <a><button type="button" id="tombol_input_hasil_pengujian_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_input_hasil_pengujian_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Input</button></a>          

                <a class="btn btn-warning btn-xs btn-not-allowed" disabled><i class="fa fa-flask fa-fw"></i>&nbsp;&nbsp;Edit Hasil Uji</a>
                
                <a href="#"><button type="button" class="btn btn-danger btn-xs btn-not-allowed" disabled><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';


            }else{

                 $subdata[] = '

           
                <a><button type="button" id="tombol_edit_hasil_pengujian_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_edit_hasil_pengujian_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i>&nbsp;&nbsp;Edit</button></a>

                <a class="btn btn-warning btn-xs" href="./lab_bakteri/views/edit_hasil_pengujian_kh.php?id='.$data2->id.'&no_sampel='.$data2->no_sampel.'&nama_sampel='.$data2->nama_sampel.'" target="_blank"><i class="fa fa-pencil fa-fw"></i>&nbsp;&nbsp;Edit Hasil Uji</a>
                
                <a href="./lab_bakteri/report/print/print_sertifikat.php?id='.$data2->id.'&no_sertifikat='.$data2->no_sertifikat.'&nama_sampel='.$data2->nama_sampel.'" target="_blank"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';
            }
             

        }else{

            if(isset($_SESSION['loginsuperkh']) || date("Y-m-d", strtotime($data2->waktu_apdate_sertifikat)) == $objectTanggal->now()){

                $subdata[] = '

                
                <a><button type="button" id="tombol_edit_hasil_pengujian_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_edit_hasil_pengujian_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i>&nbsp;&nbsp;Edit</button></a>

                <a class="btn btn-warning btn-xs" href="./lab_bakteri/views/edit_hasil_pengujian_kh.php?id='.$data2->id.'&no_sampel='.$data2->no_sampel.'&nama_sampel='.$data2->nama_sampel.'" target="_blank"><i class="fa fa-pencil fa-fw"></i>&nbsp;&nbsp;Edit Hasil Uji</a>
                
                <a href="./lab_bakteri/report/print/print_sertifikat.php?id='.$data2->id.'&no_sertifikat='.$data2->no_sertifikat.'&nama_sampel='.$data2->nama_sampel.'" target="_blank"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';

            }else{

                $subdata[] = '


                <a><button type="button" id="tombol_edit_hasil_pengujian_kh" class="btn btn-kusuccess btn-xs btn-not-allowed"><i class="fa fa-edit fa-fw"></i>&nbsp;&nbsp;Edit</button></a>

                <a class="btn btn-warning btn-xs btn-not-allowed"><i class="fa fa-pencil fa-fw"></i>&nbsp;&nbsp;Edit Hasil Uji</a>

                <a href="./lab_bakteri/report/print/print_sertifikat.php?id='.$data2->id.'&no_sertifikat='.$data2->no_sertifikat.'&nama_sampel='.$data2->nama_sampel.'" target="_blank"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>';
            }

        }

    $data[] = $subdata;
}


function get_all_data($conn)
{
 $query = "SELECT id FROM input_permohonan_kh";
 $result = $conn->query($query);
 return $result->num_rows;
}

$json_data = array(

    "draw"              =>  intval(@$_POST['draw']),
    "recordsTotal"      =>  get_all_data($conn),
    "recordsFiltered"   =>  $totalData,
    "data"              =>  $data
);

echo json_encode($objectData->utf8ize($json_data));

$connection->destroy();
?>