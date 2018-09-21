<?php

include_once ("header_source.php");

$col =array(

    0   =>  'id',
    1   =>  'tanggal_penyerahan_lab',
    2   =>  'kode_sampel',
    3   =>  'no_sampel',
    4   =>  'nama_sampel',
    5   =>  'target_pengujian2',
    6   =>  'tanggal_acu_permohonan'

);  

$othersql = $objectDataParasit->infoDataTeknis();

$fetch = $othersql->fetch_object();

if ($fetch != null) {
    
    $result_rekomendasi = $fetch->rekomendasi;

    $result_tanggal_pengujian = $fetch->tanggal_pengujian;

    $result_id = $fetch->id;

}else{


    $result_rekomendasi = '1';

    $result_tanggal_pengujian = '1';

    $result_id = 0;
} 

$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE kesiapan = 'Ya' AND ";

include_once ("sortir_hasil.php");

if(isset($_POST["search"]["value"])){

    $sql .=" (id LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR tanggal_penyerahan_lab LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR kode_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR nama_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR no_sampel LIKE '%".@$_POST['search']['value']."%' ";

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

    $isi = $data2->rekomendasi;

    $selesai = $data2->no_agenda;

    $sert = $data2->no_sertifikat; 

    $serah = $data2->yang_menerimalab;

    $tgl = $data2->tanggal_penyerahan;

    $kesiapan = $data2->kesiapan;

    $nmr = $nomor++;

    $bilangan = ucwords($objectNomorParasit->bilangan($data2->jumlah_sampel));

    $dat = array("no" => $nmr);

    $subdata = array();

        if ($kesiapan == "Tidak") {

            $subdata[] = "<span class='nonuji'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->tanggal_penyerahan_lab."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->kode_sampel."</span>";

            $subdata[] = "<span class='nonuji'>"."Ket :"."&nbsp;".$data2->saran."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->nama_sampel."</span>"; 

            if ($data2->target_pengujian3 != '') {

                 $subdata[] = "<span class='nonuji'><em>".$data2->target_pengujian2." & ".$data2->target_pengujian3."</em></span>";
            }else{

                 $subdata[] = "<span class='nonuji'><em>".$data2->target_pengujian2."</em></span>";

            }              



        }elseif (strlen($isi) == 0) {

            $subdata[] = "<span class='kosong'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->tanggal_penyerahan_lab."</span>";

            $subdata[] = "<span class='kosong'>".$data2->kode_sampel."</span>";

            $subdata[] = "<span class='kosong'>".$data2->no_sampel."</span>";

            $subdata[] = "<span class='kosong'>".$data2->nama_sampel."</span>"; 

            if ($data2->target_pengujian3 != '') {

                 $subdata[] = "<span class='kosong'><em>".$data2->target_pengujian2." & ".$data2->target_pengujian3."</em></span>";
            }else{

                 $subdata[] = "<span class='kosong'><em>".$data2->target_pengujian2."</em></span>";

            }              

              

        }elseif (strlen($selesai) == 0) {

            $subdata[] = "<span class='proses'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->tanggal_penyerahan_lab."</span>";

            $subdata[] = "<span class='proses'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->no_sampel."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->nama_sampel."</span>"; 

            if ($data2->target_pengujian3 != '') {

                 $subdata[] = "<span class='proses'><em>".$data2->target_pengujian2."  & ".$data2->target_pengujian3."</em></span>";
            }else{

                 $subdata[] = "<span class='proses'><em>".$data2->target_pengujian2."</em></span>";

            }
     

        }else{


            $subdata[] = "<span class='selsesai'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='selsesai'>".$data2->tanggal_penyerahan_lab."</span>";

            $subdata[] = "<span class='selsesai'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='selsesai'>".$data2->no_sampel."</span>";

            $subdata[] = "<span class='selsesai'>".$data2->nama_sampel."</span>"; 

            if ($data2->target_pengujian3 != '') {

                 $subdata[] = "<span class='selsesai'><em>".$data2->target_pengujian2."  & ".$data2->target_pengujian3."</em></span>";
            }else{

                 $subdata[] = "<span class='selsesai'><em>".$data2->target_pengujian2."</em></span>";

            }
     
    
        }


        if(strlen($serah) == 0){

            $subdata[] = '

                <i class="fa fa-exclamation-circle kosong"></i> <i>Pending </i>
                ';


        }/*elseif (empty($result_tanggal_pengujian) && empty($result_rekomendasi) && $id2 > $result_id) {
           
            $subdata[] = '

                <i class="fa fa-exclamation-circle kosong"></i> <i>Waiting In Order </i>

                ';

        }*/elseif (strlen($selesai) == 0) {

            if (strlen($isi) == 0) {

                $subdata[] = '

                <button type="button" id="tombol_input_data_teknis_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_input_data_teknis_kh" data-id="'.$data2->id.'"><i class="fa fa-plus-circle fa-fw"></i> Input</button>



                <a href="#"><button type="button" class="btn btn-warning btn-xs btn-not-allowed"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';

            }elseif(strlen($sert) == 0){


            $subdata[] = '

                <button type="button" id="tombol_edit_data_teknis_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_edit_data_teknis_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>

                
                <a href="#"><button type="button" class="btn btn-warning btn-xs btn-not-allowed" disabled><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';


        }   else{

                 $subdata[] = '
           
                <button type="button" id="tombol_edit_data_teknis_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_edit_data_teknis_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>
                
                <a href="./lab_parasit/report/print/print_data_teknis.php?id='.$data2->id.'&no_sampel='.$data2->no_sampel.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';
            }
             

        }else{

            if(isset($_SESSION['loginsuperkh']) || date("Y-m-d", strtotime($data2->waktu_apdate_sertifikat)) == $objectTanggal->now()){

                $subdata[] = '
                
                <button type="button" id="tombol_edit_data_teknis_kh" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_edit_data_teknis_kh" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>
                
                <a href="./lab_parasit/report/print/print_data_teknis.php?id='.$data2->id.'&no_sampel='.$data2->no_sampel.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';

            }else{

                $subdata[] = '

                <button type="button" id="tombol_edit_data_teknis_kh" class="btn btn-kusuccess btn-xs btn-not-allowed"><i class="fa fa-edit fa-fw"></i> Edit</button>

                <a href="./lab_parasit/report/print/print_data_teknis.php?id='.$data2->id.'&no_sampel='.$data2->no_sampel.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>';
            }

        }

      
  
    $data[] = $subdata;
}


function get_all_data($conn)
{
 $query = "SELECT id FROM input_permohonan_kh_lab_parasit";
 $result = $conn->query($query);
 return $result->num_rows;
}



$json_data = array(

    "draw"              =>  intval(@$_POST['draw']),
    "recordsTotal"      =>  get_all_data($conn),
    "recordsFiltered"   =>  $totalData,
    "data"              =>  $data
);

echo json_encode($objectDataParasit->utf8ize($json_data));;

$connection->destroy();
?>