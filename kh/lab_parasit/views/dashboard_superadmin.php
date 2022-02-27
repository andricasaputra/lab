<?php

if($_SESSION == $_SESSION['loginsuperkh']){

	$id = $_SESSION['loginsuperkh'];

}

?>



<div class="row selamat">

  	<div class="col-lg-12">

	  <h3>Selamat Datang <?php echo $data->nama;?></h3>

		<div class="alert alert-primary warna">

  			<h4>Halaman Utama</h4> 

		</div>	

  </div>

</div>


<?php 

require_once('body_dashboard.php');

?>



