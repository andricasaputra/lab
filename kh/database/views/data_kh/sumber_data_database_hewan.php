<?php

include_once('header_data.php');

$request = $_REQUEST;

$col =array(

    0   =>  'id_hewan',
    1   =>  'nama_hewan',
    2   =>  'nama_ilmiah_hewan'

);  

$sql = "SELECT * FROM hewan";

$query = $conn->query($sql);

$totalData = $query->num_rows;

$totalFilter = $totalData;

//Search

$sql = "SELECT * FROM hewan WHERE 1=1";

if(!empty(@$request['search']['value'])){

    $sql .=" AND (id_hewan LIKE '".@$request['search']['value']."%' ";

    $sql .=" OR nama_hewan LIKE '".@$request['search']['value']."%' ";

    $sql .=" OR nama_ilmiah_hewan LIKE '".@$request['search']['value']."%' )";
}

$query = $conn->query($sql);

$totalData=$query->num_rows;

$a = @$col[@$request['order'][0]['column']];
$b = @$request['order'][0]['dir'];
$c = @$request['start'];
$d = @$request['length'];

$sql .=" ORDER BY ".$a."   ".$b."  LIMIT ".$c.", ".$d."  " ;

$query = $conn->query($sql);

$nomor = 1;

$data = array();

while($data2 = $query->fetch_object()){


    $nmr = $nomor++;

    $dat = array("no" => $nmr);

    $subdata = array();


            $subdata[] = $dat['no']; 

            $subdata[] = $data2->nama_hewan;

            $subdata[] = $data2->nama_ilmiah_hewan;

            $subdata[] = '

                <button type="button" id="tombol_edit_database_hewan" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#edit_database_hewan" data-id='.$data2->id_hewan.'><i class="fa fa-edit fa-fw"></i> Edit</button>


                <a href="?page=input_nama_hewan&act=del&id_hewan='.$data2->id_hewan.'" id="hapus_database_hewan">

                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o fa-fw"></i>Hapus</button></a>

                ';

  
    $data[] = $subdata;
}



$json_data = array(

    "draw"              =>  intval(@$request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

$connection->destroy();

?>