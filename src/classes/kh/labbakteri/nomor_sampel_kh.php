<?php

$kosong = $objectData->KosongData();

if (!$kosong == 0) {

  $query = $objectNomor->NomorSampel();

  $result = $query->fetch_object();

  $jumlah_sampel = 2;

  $no_sampel = $result->no_sampel;

    //  Jika Jumlah Sampel Sama Dengan 1

    if($query){

        if($jumlah_sampel == 1){ 



          $x = explode("-", $no_sampel); 

              $k = $x[0];

              $cari = "-";

              // Jika Format No Sampel Sebelumnya n - n / memakai tanda -

              if(strpos($no_sampel, $cari) == true){

                $l = $x[1];

                $nomor_smpl = $l + $jumlah_sampel;


             // Jika Format No Sampel Sebelumnya n / tidak memakai tanda -


              }else{

                $nomor_smpl = $k + $jumlah_sampel;  

              }

       // Jika Jumlah Sampel Lebih Dari 1


        }else{

                $x = explode("-", $no_sampel); 

                $k = $x[0];

                $cari = "-";


                // Jika Format No Sampel Sebelumnya n - n / memakai tanda -


                if(strpos($no_sampel, $cari) == true){

                    $l = $x[1];

                    $jml2 = $l  + 1;

                    $jml = $l + $jumlah_sampel;

                    $nomor_smpl = $jml2 ."-". $jml; 


                  // Jika Format No Sampel Sebelumnya n / tidak memakai tanda -


                }else{


                    $jml2 = $k + 1;

                    $jml = $k + $jumlah_sampel;

                    $nomor_smpl = $jml2 ."-". $jml;     

                }
   

              }           

      }  


/*Jika Nomor Sampel Kosong*/

}else{


$nomor_smpl = "1-2";

}





?> 

