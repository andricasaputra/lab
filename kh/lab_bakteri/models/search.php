<?php 
require'../../config/koneksi.php';	

if(isset($_POST["query"])){

	$output = '';

	$query = "SELECT * FROM tumbuhan WHERE nama_tumbuhan LIKE '%".$_POST["query"]."%' ";

	$result = mysqli_query($conn, $query);
	$output = '<ul class="list-unstyled">';

	if(mysqli_num_rows($result) > 0 ){

		while ($row = mysqli_fetch_array($result))
			{
		
			$output .='<li>'.$row["nama_tumbuhan"].'</li>';

			}
		}
		else 
		{

			$output .='<li>Nama Sampel Kosong</li>';
		}
	
		$output .= '</ul>';
		echo $output;

}
?>