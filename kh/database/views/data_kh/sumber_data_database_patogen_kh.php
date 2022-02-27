<?php

include_once('header_data.php');

$request = $_REQUEST;

$col =array(

    0   =>  'id',
    1   =>  'nama_penyakit',
    2   =>  'nama_latin_penyakit'

);  

$sql = "SELECT * FROM patogen_kh";

$query = $conn->query($sql);

$totalData = $query->num_rows;

$totalFilter = $totalData;

//Search


$sql = "SELECT * FROM patogen_kh WHERE 1=1 ";

if(!empty(@$request['search']['value'])){

    $sql .=" AND (id_patogen LIKE '".@$request['search']['value']."%' ";

    $sql .=" OR nama_penyakit LIKE '".@$request['search']['value']."%' ";

    $sql .=" OR nama_latin_penyakit LIKE '".@$request['search']['value']."%' )";
}

$query = $conn->query($sql);

$totalData = $query->num_rows;

$query = $conn->query($sql);

$nomor = 1;

$data = array();

while($data2 = $query->fetch_object()){

    $nmr = $nomor++;

    $dat = array("no" => $nmr);

    $subdata = array();

            $subdata[] = $dat['no']; 

            $subdata[] = $data2->nama_penyakit;

            $subdata[] = "<em>".$data2->nama_latin_penyakit."</em>";

            $subdata[] = '

                <button type="button" id="tombol_edit_database_patogen_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#edit_database_patogen_kh" data-id='.$data2->id_patogen.'><i class="fa fa-edit fa-fw"></i> Edit</button>


                <a href="?page=input_nama_patogen_kh&act=del&id='.$data2->id_patogen.'" id="hapus_database_patogen_kh">

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