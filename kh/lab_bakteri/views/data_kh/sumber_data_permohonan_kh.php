<?php

include_once ("header_source.php");

$col =array(

    0   =>  'id',
    1   =>  'no_permohonan',
    2   =>  'tanggal_permohonan',
    3   =>  'nama_sampel',
    4   =>  'jumlah_sampel',
    5   =>  'target_pengujian2',
    6   =>  'tanggal_acu_permohonan'

);

$sql = "SELECT * FROM input_permohonan_kh WHERE ";


include_once ("sortir.php");


if(isset($_POST["search"]["value"])){

    $sql .=" (id LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR no_permohonan LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR tanggal_permohonan LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR nama_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR jumlah_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR tanggal_acu_permohonan LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR target_pengujian2 LIKE '%".@$_POST['search']['value']."%' )";
}else{

    $sql .=" id !='' ";

}


if(isset($_POST["order"]))
{
 $sql .= ' ORDER BY '.$col[@$_POST['order']['0']['column']].' '.@$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $sql .= ' ORDER BY id DESC ';
}

$sql1 = '';

if(@$_POST["length"] != -1)
{
 $sql1 = ' LIMIT ' . @$_POST['start'] . ', ' . @$_POST['length'];
}

$query = $conn->query($sql);

$totalData = $query->num_rows;

$query = $conn->query($sql . $sql1);

$data = array();


$nomor = 1;

while($data2 = $query->fetch_object()){


    $id2 =  $data2->id;

    $isi = $data2->tanggal_diterima;

    $selesai = $data2->no_agenda;

    $kesiapan = $data2->kesiapan;


    $bilangan = ucwords($objectNomor->bilangan($data2->jumlah_sampel));

    $dat = array("no" => $nomor++);

    $subdata = array();

        if ($kesiapan == 'Tidak') {

            $subdata[] = "<span class='nonuji'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->tanggal_permohonan."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->no_permohonan."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->nama_sampel."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->jumlah_sampel."&nbsp".$bilangan."</span>";  

            $subdata[] = "<span class='nonuji'><em>".$data2->target_pengujian2."</em></span>"; 


        }elseif (strlen($isi) == 0) {

            $subdata[] = "<span class='kosong'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->tanggal_permohonan."</span>";

            $subdata[] = "<span class='kosong'>".$data2->no_permohonan."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->nama_sampel."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->jumlah_sampel."&nbsp".$bilangan."</span>";  

            $subdata[] = "<span class='kosong'><em>".$data2->target_pengujian2."</em></span>"; 


        }elseif (strlen($selesai) == 0) {

            $subdata[] = "<span class='proses'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->tanggal_permohonan."</span>";

            $subdata[] = "<span class='proses'>".$data2->no_permohonan."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->nama_sampel."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->jumlah_sampel."&nbsp".$bilangan."</span>";  

            $subdata[] = "<span class='proses'><em>".$data2->target_pengujian2."</em></span>"; 



        }else{


            $subdata[] = "<span class='selesai'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='selesai'>".$data2->tanggal_permohonan."</span>";

            $subdata[] = "<span class='selesai'>".$data2->no_permohonan."</span>"; 

            $subdata[] = "<span class='selesai'>".$data2->nama_sampel."</span>"; 

            $subdata[] = "<span class='selesai'>".$data2->jumlah_sampel."&nbsp".$bilangan."</span>";  

            $subdata[] = "<span class='selesai'><em>".$data2->target_pengujian2."</em></span>"; 

    
        }

        if (isset($_SESSION['loginsuperkh'])) {

            if ($data2->kesiapan == 'Tidak') {

                $subdata[] = '

                <i class="fa fa-exclamation-circle kosong"></i> <i>Permohonan Ditolak (Laboratorium Tidak Siap)</i>

                ';

            }else{



                    $subdata[] = '<button type="button" id="tombol_edit_permohonan_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_permohonan_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>

                    
                    <a href="?lab=bakteri&page=data_permohonan&act=del&id='.$data2->id.'" id="hapus">
                    <button type="button" onclick="return confirm (\'Anda Yakin Ingin Menghapus Data Ini?\')" class="btn btn-danger btn-xs")"><i class="fa fa-trash-o fa-fw"></i> Delete</button></a>

                    <a href="./lab_bakteri/report/print/print_data_permohonan.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>';



            }

            
        }else{

            if ($data2->kesiapan == 'Tidak') {

                $subdata[] = '

                <i class="fa fa-exclamation-circle kosong"></i> <i>Permohonan Ditolak (Laboratorium Tidak Siap)</i>

                ';
                
            }else{

                
                $subdata[] = '

                <button type="button" id="tombol_edit_permohonan_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_permohonan_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>

                    <a href="./lab_bakteri/report/print/print_data_permohonan.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'" target="_blank">
                    <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>';


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