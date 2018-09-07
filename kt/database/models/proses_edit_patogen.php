<?php
include_once('header_proses.php');

if (isset($_SESSION['loginsuperkt'])) {

	$redirect = '../../super_admin.php?page=input_nama_patogen';

}elseif (isset($_SESSION['loginadminkt'])) {

	$redirect = '../../admin.php?page=input_nama_patogen';

}else{

	$redirect = '../../index.php?page=input_nama_patogen';
}

if (isset($_POST['input'])) :

	$id						=$_POST['id'];

	$patogen	=htmlspecialchars($conn->real_escape_string(trim($_POST['patogen'])));

	$nama_latin_penyakit	=htmlspecialchars($conn->real_escape_string(trim($_POST['nama_latin_penyakit'])));

	if ($patogen == 'Serangga' ||  $patogen == 'Lalat Buah') {
            
            $id_patogen = 1;

         }elseif ($patogen == 'Myte/Tungau' ) {

            $id_patogen = 2;

         }elseif ($patogen == 'Cendawan' ) {
          
            $id_patogen = 3;

         }elseif ($patogen == 'Bakteri' ) {
          
            $id_patogen = 4;

         }elseif ($patogen == 'Nematoda' ) {
          
            $id_patogen = 5;
            
         }elseif ($patogen == 'Virus' ) {
          
            $id_patogen = 6;
            
         }  

		

 if($patogen !=="" && $nama_latin_penyakit !=="") {


	 $objectSource->edit("UPDATE penyakit SET nama_latin_penyakit='$nama_latin_penyakit', id_patogen ='$id_patogen', patogen ='$patogen' WHERE id ='$id'");

	 	echo "<script>window.alert('Source Patogen Berhasil Diubah')

	 	window.location='".$redirect."';</script>";

	 

 }else{



		echo "<script>window.alert('Source Patogen Gagal Diubah!')

	 	window.location='".$redirect."';</script>";

	 

 }


endif;



?>	