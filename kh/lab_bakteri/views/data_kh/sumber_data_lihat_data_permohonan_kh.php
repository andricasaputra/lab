<?php

include_once ("header_source.php");

$request = $_REQUEST;

$col =array(

    0   =>  'id',
    1   =>  'tanggal_permohonan',
    2   =>  'no_permohonan',
    3   =>  'nama_sampel',
    4   =>  'lama_pengujian',
    5   =>  'tanggal_lhu'

);  



$sql = "SELECT * FROM input_permohonan_kh";

$query = $conn->query($sql);

$totalData = $query->num_rows;

$totalFilter = $totalData;

//Search


$sql = "SELECT * FROM input_permohonan_kh WHERE 1=1";

if(!empty(@$request['search']['value'])){

    $sql .=" AND (id LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR tanggal_permohonan LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR no_permohonan LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR nama_sampel LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR lama_pengujian LIKE '%".@$request['search']['value']."%' ";

    $sql .=" OR tanggal_lhu LIKE '%".@$request['search']['value']."%' )";
}

$query = $conn->query($sql);

$totalData=$query->num_rows;

$a = @$col[@$request['order'][0]['column']];
$b = @$request['order'][0]['dir'];
$c = @$request['start'];
$d = @$request['length'];

$sql .=" ORDER BY id DESC,  ".$a."   ".$b."  LIMIT ".$c.", ".$d."  " ;

$sql2 ="SELECT * FROM input_permohonan_kh ORDER BY id DESC";

$query = $conn->query($sql);

if ($query == false) {

    $query = $conn->query($sql2);
}


$nomor = 1;

$data = array();

while($data2 = $query->fetch_object()){

    $tanggal_diterima = $data2->tanggal_diterima;

    $kode_sampel = $data2->kode_sampel;

    $kondisi_sampel = $data2->kondisi_sampel;

    $penyelia = $data2->penyelia;

    $tanggal_penyerahan = $data2->tanggal_penyerahan;

    $tanggal_penunjukan = $data2->tanggal_penunjukan;

    $tanggal_penyerahan_lab = $data2->tanggal_penyerahan_lab;

    $tanggal_pengujian = $data2->tanggal_pengujian;

    $tanggal_sertifikat = $data2->tanggal_sertifikat;

    $kesiapan = $data2->kesiapan;

    $tgl = $data2->tanggal_lhu;

    $hasil = $data2->no_agenda; 

    if($tanggal_diterima == 0){

            $isi = 'Belum Diterima Oleh Penerima Sampel';

    }elseif(strlen($kode_sampel) == 0){

            $isi = 'Proses Permintaan Kesiapan Pengujian';

    }elseif(strlen($kondisi_sampel) == 0){

            $isi = 'Proses Kesiapan Laboratorium Penguji';

    }elseif(strlen($penyelia) == 0){

            $isi = 'Proses Penerbitan Respon Kesiapan Pengujian';

    }elseif($kesiapan == "Tidak"){

            $isi = 'Sampel Belum Dapat Diuji Di Laboratorium';

    }elseif(strlen($tanggal_penyerahan) == 0){

            $isi = 'Dokumen Administrasi Lengkap / Proses penyerahan Sampel Ke Laboratorium';

    }elseif(strlen($tanggal_penunjukan) == 0){

            $isi = 'Proses Penugasan Penyelia dan Analis oleh Manajer Teknis';

    }elseif(strlen($tanggal_penyerahan_lab) == 0){

            $isi = 'Sampel Dalam Proses Pengujian';

    }elseif(strlen($tanggal_pengujian) == 0){

            $isi = 'Sampel Dalam Proses Pengujian';

    }elseif(strlen($tanggal_sertifikat) == 0){

            $isi = 'Dalam Proses Pengujian';

    }elseif(strlen($tanggal_sertifikat) !== 0 && strlen($hasil) == 0 ){

            $isi = 'Proses Penerbitan Laporan Hasil Uji';

    }elseif (strlen($tgl) !== 0 && strlen($hasil) !== 0 ) {

            $isi = 'Selesai';
    }else{

             $isi = '-';
    }
           


    $nmr = $nomor++;

    $dat = array("no" => $nmr);

    $subdata = array();


            $subdata[] = $dat['no']; 

            if (!isset($_SESSION['loginlabkh'])) {  

                $subdata[] = $data2->tanggal_permohonan;

            }else{

                $subdata[] = $data2->kode_sampel;

            }

            $subdata[] = $data2->no_permohonan;

            $subdata[] = $data2->nama_sampel;

            $subdata[] = $data2->lama_pengujian;

            if ($isi == 'Selesai') {
                
                $subdata[] = "<span class='proses'>".$isi."</span>";

            }else{

                 $subdata[] = "<span class='kosong'>".$isi."</span>";
            }

            if (strlen($tgl) == 0) {

                $subdata[] = "-";

            }else{

                $subdata[] = $data2->tanggal_lhu;

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