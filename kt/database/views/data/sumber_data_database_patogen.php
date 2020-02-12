<?php

include_once('header_data.php');

$request = $_REQUEST;

$col =array(

    0   =>  'id',
    1   =>  'patogen',
    2   =>  'nama_latin_penyakit'

);  

$sql = "SELECT * FROM penyakit ";

$query = $conn->query($sql);

$totalData = $query->num_rows;

$totalFilter = $totalData;

//Search


$sql = "SELECT * FROM penyakit WHERE 1=1";

if(!empty(@$request['search']['value'])){

    $sql .=" AND (id LIKE '".@$request['search']['value']."%' ";

    $sql .=" OR patogen LIKE '".@$request['search']['value']."%' ";

    $sql .=" OR nama_latin_penyakit LIKE '".@$request['search']['value']."%' )";
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

            $subdata[] = $data2->patogen;

            $subdata[] = "<em>".$data2->nama_latin_penyakit."</em>";

            $subdata[] = '

                <button type="button" id="tombol_edit_database_patogen" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#edit_database_patogen" data-id='.$data2->id.'><i class="fa fa-edit fa-fw"></i> Edit</button>


                <a href="?page=input_nama_patogen&act=del&id='.$data2->id.'" id="hapus_database_patogen">

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