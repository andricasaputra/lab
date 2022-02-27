<?php 

use Lab\config\Database;

require_once ('../vendor/autoload.php');

$connection = Database::getInstance();
$connect = $connection->getConnection();
$message = '';
if(isset($_POST["import"])){

  $host = $connect->real_escape_string($_POST['host']);
  $username = $connect->real_escape_string($_POST['username']);
  $password = $connect->real_escape_string($_POST['password']);
  $nama_database = $connect->real_escape_string($_POST['nama_database']);

  if($_FILES["database"]["name"] != ''){

    $extensiValid = ['sql'];
    $extensi  = explode(".", $_FILES['database']['name']);
    $extensiDipakai = strtolower(end($extensi));

    if (!in_array($extensiDipakai, $extensiValid)) {

      echo '<script>alert("Hanya Format JPG dan PNG Yang Diperbolehkan!");
             window.location="?halaman=berita";
            </script>';
      
      return false;
      exit;
    }

    $filenya = $_FILES["database"]["tmp_name"];

    $message = Database::ImportTables($host, $username, $password, $nama_database, $filenya);

    $message = '<label class="text-success">'.$message.'</label>';
 }

 
}
?>
  
  <br /><br/>  
  <div class="container" style="width:700px;">  
   <h3 align="center">Restore Database</h3>  
   <br />
   <div><?php echo $message; ?></div>
   <form action="" method="post" enctype="multipart/form-data">
    <label for="host">Nama Host</label>
    <input type="text" placeholder="kosongkan jika tidak diisi" name="host" class="form-control">
    <label for="username">Nama Username</label>
    <input type="text" placeholder="kosongkan jika tidak diisi" name="username" class="form-control">
    <label for="password">Nama Password</label>
    <input type="text" placeholder="kosongkan jika tidak diisi" name="password" class="form-control">
    <label for="nama_database">Nama Database</label>
    <input type="text" placeholder="kosongkan jika tidak diisi" name="nama_database" class="form-control">
    <br />
    <p><label>Pilih File sql</label>
    <input type="file" name="database" /></p>
    <br/>
    <input type="submit" name="import" class="btn btn-info" value="Import" />
   </form>
  </div>  
