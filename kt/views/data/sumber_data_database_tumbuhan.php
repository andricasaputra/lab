<?php

include_once ('header_source.php');

$col =array(

    0   =>  'id',
    1   =>  'tanggal_lhu',
    2   =>  'no_sertifikat',
    3   =>  'no_agenda',
    4   =>  'no_lhu',
    5   =>  'nama_sampel'

);  

$sql = "SELECT * FROM input_permohonan";

$query = $conn->query($sql);

$totalData = $query->num_rows;

$totalFilter = $totalData;

//Search


$sql = "SELECT * FROM input_permohonan WHERE 1=1";

if(!empty(@$request['search']['value'])){

    $sql .=" AND (id LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR tanggal_lhu LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR no_sertifikat LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR nama_sampel LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR no_agenda LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR no_lhu LIKE '%".@$request['search']['value']."%' )";
}

$query = $conn->query($sql);

$totalData=$query->num_rows;

$a = @$col[@$request['order'][0]['column']];
$b = @$request['order'][0]['dir'];
$c = @$request['start'];
$d = @$request['length'];

$sql .=" ORDER BY id DESC,  ".$a."   ".$b."  LIMIT ".$c.", ".$d."  " ;

$sql2 ="SELECT * FROM input_permohonan ORDER BY id DESC";

$query = $conn->query($sql);

if ($query == false) {

    $query = $conn->query($sql2);
}

$nomor = 1;

$data = array();

while($data2 = $query->fetch_object()){


    $id2 =  $data2->id;

    $isi = $data2->no_sertifikat;

    $selesai = $data2->no_agenda;


    $nmr = $nomor++;


    $bilangan = ucwords($objectNomor->bilangan($data2->jumlah_sampel));

    $dat = array("no" => $nmr);

    $subdata = array();

        if (strlen($isi) == 0) {

            $subdata[] = "<span class='kosong'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->tanggal_lhu."</span>";

            $subdata[] = "<span class='kosong'>".$data2->no_sertifikat."</span>";

            $subdata[] = "<span class='kosong'>".$data2->no_agenda."</span>";

            $subdata[] = "<span class='kosong'>".$data2->no_lhu."</span>";

            $subdata[] = "<span class='kosong'>".$data2->nama_sampel."</span>";               


        

        }elseif (strlen($selesai) == 0) {

            $subdata[] = "<span class='proses'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->tanggal_lhu."</span>";

            $subdata[] = "<span class='proses'>".$data2->no_sertifikat."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->no_agenda."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->no_lhu."</span>";

            $subdata[] = "<span class='proses'>".$data2->nama_sampel."</span>"; 
     
            


        }else{


            $subdata[] = "<span class='selsesai'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='selsesai'>".$data2->tanggal_lhu."</span>";

            $subdata[] = "<span class='selsesai'>".$data2->no_sertifikat."</span>"; 

            $subdata[] = "<span class='selsesai'>".$data2->no_agenda."</span>";

            $subdata[] = "<span class='selesai'>".$data2->no_lhu."</span>";

            $subdata[] = "<span class='selsesai'>".$data2->nama_sampel."</span>"; 
     
              
        
    
        }


        if(strlen($isi) == 0){

            $subdata[] = '

                <button type="button" class="btn btn-kusuccess btn-xs btn-not-allowed" disabled><i class="fa fa-plus-circle fa-fw"></i> Input</button>

                <button type="button" class="btn btn-danger btn-xs btn-not-allowed" disabled><i class="fa fa-edit fa-fw"></i> Edit</button>

                <a href="#"><button type="button" class="btn btn-warning btn-xs btn-not-allowed" disabled><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';


        } else {

            if (strlen($selesai) == 0) {

                $subdata[] = '

                <button type="button" id="tombol_input_lhu" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_input_lhu" data-id="'.$data2->id.'"><i class="fa fa-plus-circle fa-fw"></i> Input</button>

                <button type="button" class="btn btn-danger btn-xs btn-not-allowed"><i class="fa fa-edit fa-fw"></i> Edit</button>

                <a href="#"><button type="button" class="btn btn-warning btn-xs btn-not-allowed"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';

            }else{


            $subdata[] = '

                 <button type="button" class="btn btn-kusuccess btn-xs btn-not-allowed" data-toggle="modal"><i class="fa fa-plus-circle fa-fw"></i> Input</button>
           
                <button type="button" id="tombol_edit_lhu" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_edit_lhu" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>
                
                <a href="./report/print/print_surat_hasil_uji.php?id='.$data2->id.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';


            }
             

        }

      
  
    $data[] = $subdata;
}



$json_data = array(

    "draw"              =>  intval(@$request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($objectData->utf8ize($json_data));

$connection->destroy();

?>