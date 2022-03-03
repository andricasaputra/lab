<?php

include_once ("header_source.php");

$col =array(

    0   =>  'id',
    1   =>  'tanggal_penyerahan',
    2   =>  'no_permohonan',
    3   =>  'kode_sampel',
    4   =>  'jumlah_sampel',
    5   =>  'target_pengujian2',
    6   =>  'tanggal_acu_permohonan'

);  

$othersql = $objectData->infoPenyerahanSampel();

$fetch = $othersql->fetch_object();

if ($fetch != null) {
    
    $result_kode_sampel = $fetch->kode_sampel;

    $result_id = $fetch->id;

}else{


    $result_kode_sampel = '1';

    $result_id = 0;
}


$sql = "SELECT * FROM input_permohonan_kh WHERE ";

include_once ("sortir.php");

if(isset($_POST["search"]["value"])){

    $sql .=" (id LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR tanggal_penyerahan LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR no_permohonan LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR kode_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR jumlah_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR target_pengujian2 LIKE '%".@$_POST['search']['value']."%' )";
}

if(isset($_POST["order"]))
{
 $sql .= 'ORDER BY '.$col[@$_POST['order']['0']['column']].' '.@$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= 'ORDER BY id DESC ';
}

$sql1 = '';

if(@$_POST["length"] != -1)
{
 $sql1 = 'LIMIT ' . @$_POST['start'] . ', ' . @$_POST['length'];
}

$query = $conn->query($sql);

$totalData = $query->num_rows;


$query = $conn->query($sql . $sql1);


$data = array();


$nomor = 1;


while($data2 = $query->fetch_object()){


    $id2 =  $data2->id;

    $kode_sampel = $data2->kode_sampel;

    $isi = $data2->tanggal_penyerahan;

    $selesai = $data2->no_agenda;

    $tgl = $data2->tanggal_diterima;

    $penerima = $data2->penerima_sampel;

    $kesiapan = $data2->kesiapan;

    $nmr = $nomor++;


    $bilangan = ucwords($objectNomor->bilangan($data2->jumlah_sampel));

    $dat = array("no" => $nmr);

    $subdata = array();

        if ($kesiapan == 'Tidak') {

            $subdata[] = "<span class='nonuji'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->tanggal_penyerahan."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->no_permohonan."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->jumlah_sampel."&nbsp(".$bilangan.")</span>";  

            $subdata[] = "<span class='nonuji'><em>".$data2->target_pengujian2."</em></span>"; 


        }elseif (strlen($isi) == 0) {

            $subdata[] = "<span class='kosong'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->tanggal_penyerahan."</span>";

            $subdata[] = "<span class='kosong'>".$data2->no_permohonan."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->jumlah_sampel."&nbsp(".$bilangan.")</span>";  

            $subdata[] = "<span class='kosong'><em>".$data2->target_pengujian2."</em></span>"; 



        }elseif (strlen($selesai) == 0) {

            $subdata[] = "<span class='proses'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->tanggal_penyerahan."</span>";

            $subdata[] = "<span class='proses'>".$data2->no_permohonan."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->jumlah_sampel."&nbsp(".$bilangan.")</span>";  

            $subdata[] = "<span class='proses'><em>".$data2->target_pengujian2."</em></span>"; 


        }else{


            $subdata[] = "<span class='selesai'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='selesai'>".$data2->tanggal_penyerahan."</span>";

            $subdata[] = "<span class='selesai'>".$data2->no_permohonan."</span>"; 

            $subdata[] = "<span class='selesai'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='selesai'>".$data2->jumlah_sampel."&nbsp(".$bilangan.")</span>";  

            $subdata[] = "<span class='selesai'><em>".$data2->target_pengujian2."</em></span>"; 
 
    
        }


        if($tgl == 0 && $penerima == 0){

            $subdata[] = '

                <i class="fa fa-exclamation-circle kosong"></i> <i>Pending </i>
                ';


        }elseif (empty($result_kode_sampel) && $id2 > $result_id) {
           
            $subdata[] = '

                <i class="fa fa-exclamation-circle kosong"></i> <i>Waiting In Order </i>

                ';

        }elseif (strlen($selesai) == 0) {

            if (strlen($isi) == 0) {

                $subdata[] = '

                <button type="button" id="tombol_input_penyerahan_sampel_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_input_penyerahan_sampel_kh" data-id="'.$data2->id.'"><i class="fa fa-plus-circle fa-fw"></i> Input</button>

                <a href="#"><button type="button" class="btn btn-warning btn-xs btn-not-allowed"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';

            }else{

                 $subdata[] = '
           
                <button type="button" id="tombol_edit_penyerahan_sampel_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_edit_penyerahan_sampel_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>
                
                <a href="./lab_bakteri/report/print/print_penyerahansampel.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';
            }
             

        }else{

            if(isset($_SESSION['loginsuperkh'])  || date("Y-m-d", strtotime($data2->waktu_apdate_sertifikat)) == $objectTanggal->now()){

                $subdata[] = '
                
                <button type="button" id="tombol_edit_penyerahan_sampel_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_edit_penyerahan_sampel_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>
                
                <a href="./lab_bakteri/report/print/print_penyerahansampel.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';

            }else{

                $subdata[] = '

                <button type="button" id="tombol_edit_penyerahan_sampel_kh" class="btn btn-kusuccess btn-xs btn-not-allowed"><i class="fa fa-edit fa-fw"></i> Edit</button>

                <a href="./lab_bakteri/report/print/print_penyerahansampel.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>';
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