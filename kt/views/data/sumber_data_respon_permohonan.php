<?php

include_once ('header_source.php');

$col =array(

    0   =>  'id',
    1   =>  'tanggal_permohonan',
    2   =>  'kode_sampel',
    3   =>  'nama_sampel',
    4   =>  'jumlah_sampel',
    5   =>  'target_optk',
    6   =>  'tanggal_acu_permohonan'

);

$othersql = $objectData->infoResponPermohonanPengujian();

$fetch = $othersql->fetch_object();

if ($fetch != null) {
    
    $result_saran = $fetch->saran;

    $result_tanggal_selesai = $fetch->tanggal_selesai;

    $result_id = $fetch->id;

}else{


    $result_saran = '1';

    $result_tanggal_selesai = '1';

    $result_id = 0;
}  

$sql = "SELECT * FROM input_permohonan WHERE ";

include_once ("sortir.php");

if(isset($_POST["search"]["value"])){

    $sql .=" (id LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR tanggal_permohonan LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR kode_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR nama_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR jumlah_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR target_optk LIKE '%".@$_POST['search']['value']."%' )";
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

    $isi     = $data2->tanggal_selesai;

    $selesai = $data2->no_agenda;

    $kode    = $data2->kode_sampel;

    $pejabat = $data2->ma;

    $pejabat2 = $data2->mt;

    $kesiapan = $data2->kesiapan;

    $nmr = $nomor++;


    $bilangan = ucwords($objectNomor->bilangan($data2->jumlah_sampel));

    $dat = array("no" => $nmr);

    $subdata = array();

        if ($kesiapan == "Tidak") {

            $subdata[] = "<span class='nonuji'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->tanggal_permohonan."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->nama_sampel."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->jumlah_sampel."&nbsp".$data2->satuan."</span>";  

            if ($data2->target_optk2 !=='') {

                $subdata[] = "<span class='nonuji'><em>".$data2->target_optk." & ".$data2->target_optk2."</em></span>"; 

            }elseif ($data2->target_optk3 !=='') {
                
                $subdata[] = "<span class='nonuji'><em>".$data2->target_optk.", ".$data2->target_optk2.", ".$data2->target_optk3."</em></span>"; 

            }else{

                 $subdata[] = "<span class='nonuji'><em>".$data2->target_optk."</em></span>"; 
            }

           

            


        }elseif (strlen($isi) == 0) {

            $subdata[] = "<span class='kosong'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->tanggal_permohonan."</span>";

            $subdata[] = "<span class='kosong'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->nama_sampel."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->jumlah_sampel."&nbsp".$data2->satuan."</span>";  

            if ($data2->target_optk2 !=='') {

                $subdata[] = "<span class='kosong'><em>".$data2->target_optk." & ".$data2->target_optk2."</em></span>"; 

            }elseif ($data2->target_optk3 !=='') {
                
                $subdata[] = "<span class='kosong'><em>".$data2->target_optk.", ".$data2->target_optk2.", ".$data2->target_optk3."</em></span>"; 

            }else{

                 $subdata[] = "<span class='kosong'><em>".$data2->target_optk."</em></span>"; 
            }

           

            


        }elseif (strlen($selesai) == 0) {

            $subdata[] = "<span class='proses'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->tanggal_permohonan."</span>";

            $subdata[] = "<span class='proses'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->nama_sampel."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->jumlah_sampel."&nbsp".$data2->satuan."</span>";  

            if ($data2->target_optk2 !=='') {

                $subdata[] = "<span class='proses'><em>".$data2->target_optk." & ".$data2->target_optk2."</em></span>"; 

            }elseif ($data2->target_optk3 !=='') {
                
                $subdata[] = "<span class='proses'><em>".$data2->target_optk.", ".$data2->target_optk2.", ".$data2->target_optk3."</em></span>"; 

            }else{

                 $subdata[] = "<span class='proses'><em>".$data2->target_optk."</em></span>"; 
            }

             
            


        }else{


            $subdata[] = "<span class='selesai'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='selesai'>".$data2->tanggal_permohonan."</span>";

            $subdata[] = "<span class='selesai'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='selesai'>".$data2->nama_sampel."</span>"; 

            $subdata[] = "<span class='selesai'>".$data2->jumlah_sampel."&nbsp".$data2->satuan."</span>";  

            if ($data2->target_optk2 !=='') {

                $subdata[] = "<span class='selesai'><em>".$data2->target_optk." & ".$data2->target_optk2."</em></span>"; 

            }elseif ($data2->target_optk3 !=='') {
                
                $subdata[] = "<span class='selesai'><em>".$data2->target_optk.", ".$data2->target_optk2.", ".$data2->target_optk3."</em></span>"; 

            }else{

                 $subdata[] = "<span class='selesai'><em>".$data2->target_optk."</em></span>"; 
            }

              
        
    
        }


        if($kode == '' && $data2->mt == ''){

            $subdata[] = '

                <i class="fa fa-exclamation-circle kosong"></i> <i>Pending </i>
                ';


        }elseif ($data2->mt != '' && empty($result_saran) && $id2 > $result_id) {
           
            $subdata[] = '

                <i class="fa fa-exclamation-circle kosong"></i> <i>Waiting In Order </i>

                ';

        }elseif(strlen($pejabat2) == 0){

            $subdata[] = '

                <i class="fa fa-exclamation-circle kosong"></i> <i>Pending </i>
                ';


        } elseif (strlen($selesai) == 0) {

            if (strlen($isi) == 0) {

                $subdata[] = '

                <button type="button" id="tombol_input_respon_permohonan" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_input_respon_permohonan" data-id="'.$data2->id.'"><i class="fa fa-plus-circle fa-fw"></i> Input</button>

                <a href="#"><button type="button" class="btn btn-warning btn-xs btn-not-allowed"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';

            }else{

                 $subdata[] = '
         
                <button type="button" id="tombol_edit_respon_permohonan" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_edit_respon_permohonan" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>
                
                <a href="./report/print/print_respon_permohonan_pengujian.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';
            }
             

        }else{

            if(isset($_SESSION['loginsuperkt']) || date("Y-m-d", strtotime($data2->waktu_apdate_sertifikat)) == $objectTanggal->now()){

                $subdata[] = '
                
                <button type="button" id="tombol_edit_respon_permohonan" class="btn btn-kusuccess btn-xs" data-toggle="modal" data-target="#modal_edit_respon_permohonan" data-id="'.$data2->id.'"><i class="fa fa-edit fa-fw"></i> Edit</button>
                
                <a href="./report/print/print_respon_permohonan_pengujian.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>
                ';

            }else{

                $subdata[] = '

                <button type="button" id="tombol_edit_respon_permohonan" class="btn btn-kusuccess btn-xs btn-not-allowed"><i class="fa fa-edit fa-fw"></i> Edit</button>

                <a href="./report/print/print_respon_permohonan_pengujian.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Print</button></a>';
            }

        }

      
  
    $data[] = $subdata;
}


function get_all_data($conn)
{
 $query = "SELECT id FROM input_permohonan";
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