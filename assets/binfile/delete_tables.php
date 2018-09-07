<?php 

use Lab\config\Database;

require_once ('../vendor/autoload.php');

$connection = Database::getInstance();

$connect = $connection->getConnection();

$message = '';

if (isset($_POST['delete'])) {

	  $host = $connect->real_escape_string($_POST['host']);
	  $username = $connect->real_escape_string($_POST['username']);
	  $password = $connect->real_escape_string($_POST['password']);
	  $nama_database = $connect->real_escape_string($_POST['nama_database']);

	if (!empty($host) && !empty($nama_database)) {

		$message = Database::DeleteTables($host, $username, $password, $nama_database);
		
	}

	$message = '<label class="text-success">'.$message.'</label>';
}

?>


  <br /><br />  
  <div class="container" style="width:700px;">  
   <h3 align="center">Delete Tabel Database</h3>  
   <br />
   <div><?php echo $message; ?></div>
   <form method="post">
   	<label for="host">Nama Host</label>
    <input type="text" placeholder="wajib terisi" name="host" class="form-control">
    <label for="username">Nama Username</label>
    <input type="text" placeholder="wajib terisi" name="username" class="form-control">
    <label for="password">Nama Password</label>
    <input type="text"  name="password" class="form-control">
    <label for="nama_database">Nama Database</label>
    <input type="text" placeholder="wajib terisi" name="nama_database" class="form-control">
    <br/><br/>
   	<button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Perhatian! Anda Akan Menghapus Semua Tabel Dan Isinya Pada Database')"><i class="fa fa-trash-o fa-fw"></i>Delete</button>
   </form>
  </div>  
