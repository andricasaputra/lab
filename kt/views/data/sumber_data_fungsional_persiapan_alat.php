<?php

include_once ('header_source.php');

$col =array(

    0   =>  'id',
    1   =>  'tanggal_pengujian',
    2   =>  'kode_sampel',
    3   =>  'nama_sampel',
    4   =>  'no_sampel',
    5   =>  'target_optk',
    6   =>  'jumlah_sampel',
    7   =>  'tanggal_acu_permohonan'

);  

$sql = "SELECT * FROM input_permohonan WHERE tanggal_pengujian !='' AND ";

if(@$_POST["is_date_search"] == "yes" && @$_POST["choice"] == "all")
{
 $sql .= 'tanggal_acu_permohonan BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}
elseif(@$_POST["is_date_search"] == "onlyselected" && @$_POST["choice"] == "benih")
{
 $sql .= 'NOT (metode_pengujian = "Identifikasi Morfologi") AND bagian_tumbuhan IN ("Biji/Benih", "Buah") AND ';
}
elseif(@$_POST["is_date_search"] == "yes" && @$_POST["choice"] == "benih")
{
 $sql .= 'tanggal_acu_permohonan BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND NOT (metode_pengujian = "Identifikasi Morfologi") AND bagian_tumbuhan IN ("Biji/Benih", "Buah")  AND ';
}



if(isset($_POST["search"]["value"])){

    $sql .=" (id LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR tanggal_pengujian LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR kode_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR nama_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR no_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR jumlah_sampel LIKE '%".@$_POST['search']['value']."%' ";

    $sql .=" OR target_optk LIKE '%".@$_POST['search']['value']."%' )";
}

if(isset($_POST["order"]))
{
 $sql .= 'GROUP BY tanggal_pengujian  ORDER BY '.$col[@$_POST['order']['0']['column']].' '.@$_POST['order']['0']['dir'].'  
 ';
}
else
{
 $sql .= 'GROUP BY tanggal_pengujian ORDER BY id DESC  ';
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

    $isi      = $data2->yang_menyerahkanlab;

    $selesai  = $data2->no_agenda;

    $no_surat_tugas = $data2->no_surat_tugas;

    $tgl = $data2->tanggal_penyerahan;

    $kesiapan = $data2->kesiapan;


    $nmr = $nomor++;


    $bilangan = ucwords($objectNomor->bilangan($data2->jumlah_sampel));

    $dat = array("no" => $nmr);

    $subdata = array();

        if ($kesiapan == "Tidak") {

            $subdata[] = "<span class='nonuji'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='nonuji'>"."Ket :"."&nbsp;".$data2->saran."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->kode_sampel."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->jumlah_sampel."&nbsp".$data2->satuan."</span>"; 

            $subdata[] = "<span class='nonuji'>".$data2->no_sampel."</span>";

            $subdata[] = "<span class='nonuji'>".$data2->nama_sampel."</span>";               

            if ($data2->target_optk2 !=='') {

                $subdata[] = "<span class='nonuji'><em>".$data2->target_optk." & ".$data2->target_optk2."</em></span>"; 

            }elseif ($data2->target_optk3 !=='') {
                
                $subdata[] = "<span class='nonuji'><em>".$data2->target_optk.", ".$data2->target_optk2.", ".$data2->target_optk3."</em></span>"; 

            }else{

                 $subdata[] = "<span class='nonuji'><em>".$data2->target_optk."</em></span>"; 
            }

           

            


        }elseif (strlen($isi) == 0) {

            $subdata[] = "<span class='kosong'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->tanggal_pengujian."</span>";

            $subdata[] = "<span class='kosong'>".$data2->kode_sampel."</span>";

            $subdata[] = "<span class='kosong'>".$data2->jumlah_sampel."&nbsp".$data2->satuan."</span>"; 

            $subdata[] = "<span class='kosong'>".$data2->no_sampel."</span>";

            $subdata[] = "<span class='kosong'>".$data2->nama_sampel."</span>";               

            if ($data2->target_optk2 !=='') {

                $subdata[] = "<span class='kosong'><em>".$data2->target_optk." & ".$data2->target_optk2."</em></span>"; 

            }elseif ($data2->target_optk3 !=='') {
                
                $subdata[] = "<span class='kosong'><em>".$data2->target_optk.", ".$data2->target_optk2.", ".$data2->target_optk3."</em></span>"; 

            }else{

                 $subdata[] = "<span class='kosong'><em>".$data2->target_optk."</em></span>"; 
            }

           

            


        }elseif (strlen($selesai) == 0) {

            $subdata[] = "<span class='proses'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->tanggal_pengujian."</span>";

            $subdata[] = "<span class='proses'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->jumlah_sampel."&nbsp".$data2->satuan."</span>";  

            $subdata[] = "<span class='proses'>".$data2->no_sampel."</span>"; 

            $subdata[] = "<span class='proses'>".$data2->nama_sampel."</span>"; 
     

            if ($data2->target_optk2 !=='') {

                $subdata[] = "<span class='proses'><em>".$data2->target_optk." & ".$data2->target_optk2."</em></span>"; 

            }elseif ($data2->target_optk3 !=='') {
                
                $subdata[] = "<span class='proses'><em>".$data2->target_optk.", ".$data2->target_optk2.", ".$data2->target_optk3."</em></span>"; 

            }else{

                 $subdata[] = "<span class='proses'><em>".$data2->target_optk."</em></span>"; 
            }

             
            


        }else{


            $subdata[] = "<span class='selsesai'>".$dat['no']."</span>"; 

            $subdata[] = "<span class='selsesai'>".$data2->tanggal_pengujian."</span>";

            $subdata[] = "<span class='selsesai'>".$data2->kode_sampel."</span>"; 

            $subdata[] = "<span class='selsesai'>".$data2->jumlah_sampel."&nbsp".$data2->satuan."</span>"; 

            $subdata[] = "<span class='selsesai'>".$data2->no_sampel."</span>";

            $subdata[] = "<span class='selsesai'>".$data2->nama_sampel."</span>"; 
     

            if ($data2->target_optk2 !=='') {

                $subdata[] = "<span class='selsesai'><em>".$data2->target_optk." & ".$data2->target_optk2."</em></span>"; 

            }elseif ($data2->target_optk3 !=='') {
                
                $subdata[] = "<span class='selsesai'><em>".$data2->target_optk.", ".$data2->target_optk2.", ".$data2->target_optk3."</em></span>"; 

            }else{

                 $subdata[] = "<span class='selsesai'><em>".$data2->target_optk."</em></span>"; 
            }

              
        
    
        }


        if($tgl == 0){


                     $subdata[] = '


                    <a href="#"><button type="button" class="btn btn-warning btn-xs btn-not-allowed" disabled><i class="fa fa-print fa-fw"></i> Alat</button></a>


                
                    ';

          

        } elseif (strlen($selesai) == 0) {

            if (strlen($isi) == 0) {

                
                            $subdata[] = '

                              <a href="./report/fungsional/menyiapkan_tempat_alat_lab.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'&tanggal_pengujian='.$data2->tanggal_pengujian.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Alat</button></a>

                            
                            ';


            }else{

              
                            $subdata[] = '

                               <a href="./report/fungsional/menyiapkan_tempat_alat_lab.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'&tanggal_pengujian='.$data2->tanggal_pengujian.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Alat</button></a>

                            
                            ';


            }
             

        }else{


            if(isset($_SESSION['loginsuperkt'])){

           
                        $subdata[] = '

                          <a href="./report/fungsional/menyiapkan_tempat_alat_lab.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'&tanggal_pengujian='.$data2->tanggal_pengujian.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Alat</button></a>

                        
                        ';

                }else{

                    $subdata[] = '


                             <a href="./report/fungsional/menyiapkan_tempat_alat_lab.php?id='.$data2->id.'&no_permohonan='.$data2->no_permohonan.'&tanggal_pengujian='.$data2->tanggal_pengujian.'" target="_blank"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-print fa-fw"></i> Alat</button></a>

                          

                            ';

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