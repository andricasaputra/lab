<?php

include_once('header_data.php');

$request = $_REQUEST;

$col =array(

    0   =>  'id',
    1   =>  'nama_pelanggan',
    2   =>  'alamat_pelanggan'

);  

$sql = "SELECT * FROM pelanggan_kh";

$query = $conn->query($sql);

$totalData = $query->num_rows;

$totalFilter = $totalData;

//Search

$sql = "SELECT * FROM pelanggan_kh WHERE 1=1";

if(!empty(@$request['search']['value'])){

    $sql .=" AND (id LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR nama_pelanggan LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR alamat_pelanggan LIKE '%".@$request['search']['value']."%' )";
}

$query = $conn->query($sql);

$totalData=$query->num_rows;

$a = @$col[@$request['order'][0]['column']];
$b = @$request['order'][0]['dir'];
$c = @$request['start'];
$d = @$request['length'];  

if(isset($_POST["order"]))
{
    
  $sql .=" ORDER BY ".$a."   ".$b."  LIMIT ".$c.", ".$d."  " ;  

}


$query = $conn->query($sql);

$nomor = 1;

$data = array();

while($data2 = $query->fetch_object()){

    $nmr = $nomor++;

    $dat = array("no" => $nmr);

    $subdata = array();

        $subdata[] = $dat['no']; 

        $subdata[] = str_replace(";", "", $data2->nama_pelanggan);

        $subdata[] = str_replace(";", "", $data2->alamat_pelanggan);

        $subdata[] = '

            <button type="button" id="tombol_edit_database_pelanggan_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#edit_database_pelanggan_kh" data-id='.$data2->id.'><i class="fa fa-edit fa-fw"></i> Edit</button>


            <a href="?page=input_nama_pelanggan&act=del&id='.$data2->id.'" id="hapus_database_pelanggan_kh">

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