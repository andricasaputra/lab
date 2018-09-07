<?php 

namespace Lab\classes\kh\labbakteri;

use Lab\config\Database;
use Lab\classes\LegacyData;
use Lab\interfaces\SuperHasil;

class Hasil extends LegacyData implements SuperHasil{

	public function __construct(){

		parent::__construct();

	}


	public function tampil($id=null){

		$sql = "SELECT * FROM hasil_kh";

		if($id !=null){

			$sql .= " WHERE id=$id";

		}

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;

	}

	public function tampil3(){
		$tgl = date('m');
		$sql = "SELECT no_sertifikat FROM input_permohonan_kh WHERE no_sertifikat !=' ' ORDER BY id DESC ";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}



	public function tampil4(){
		$tgl = date('m');
		$sql = "SELECT no_sertifikat FROM input_permohonan_kh ORDER BY id ASC ";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}



	public function tampil5(){

		$sql = "SELECT max(tanggal_acu_hasil) as maxSampel FROM hasil_kh ORDER BY id DESC";

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;

	}


	public function tampil_hasil($id){
		
		$sql = "SELECT positif_negatif FROM hasil_kh WHERE id = $id";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}


	public function input_ulang($id2){
		
		$sql = "SELECT no_sampel FROM hasil_kh WHERE id = $id2";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}


	public function print_pertanggal_hasil($tgl1, $tgl2){

		$sql2 = "SELECT * FROM hasil_kh WHERE  tanggal_acu_hasil BETWEEN '$tgl1' AND '$tgl2' GROUP BY no_sampel";

		$query = $this->db->query($sql2) or die ($this->db->error);

		return $query;

	}

	public function input($id, $tanggal_acu_hasil, $no_sampel,  $positif_negatif){



		$kd = $this->db->query("SELECT * FROM hasil_kh WHERE no_sampel='$no_sampel'");

		$cek = $kd->num_rows;



		if ($cek > 0){

			 return 'no_sampel_terpakai';

			 

		 }else{

		$this->db->query("INSERT INTO hasil_kh (id, tanggal_acu_hasil, no_sampel,  positif_negatif) VALUES ('$id', '$tanggal_acu_hasil', '$no_sampel', '$positif_negatif')") or die ($this->db->error);

		}

	}



	public function print_pertanggal_hasil2($id){

		$sql2 = "SELECT  no_sampel, bagian_hewan,  jumlah_sampel, target_pengujian2,  metode_pengujian,  positif_negatif FROM hasil_kh WHERE id='$id' ";

		$query = $this->db->query($sql2) or die ($this->db->error);

		return $query;

	}



	public function print_pertanggal_hasil3($kode_sampel, $kode_sampel2){

		$tgl = date('m');

		$sql2 = "SELECT * FROM hasil_kh WHERE kode_sampel BETWEEN '$kode_sampel 'AND '$kode_sampel2' AND MONTH(tanggal_acu_hasil) = $tgl GROUP BY kode_sampel  ORDER BY no_sampel ASC ";

		$query = $this->db->query($sql2) or die ($this->db->error);

		return $query;

	}



	public function print_pertanggal_hasil4($no_sertifikat, $no_sertifikat2){

		$tgl = date('m');

		$sql2 = "SELECT * FROM hasil_kh WHERE no_sertifikat BETWEEN '$no_sertifikat 'AND '$no_sertifikat2' AND MONTH(tanggal_acu_hasil) = $tgl GROUP BY no_sertifikat  ORDER BY no_sampel ASC ";

		$query = $this->db->query($sql2) or die ($this->db->error);

		return $query;

	}



	public function print_pertanggal_hasil5($no_agenda, $no_agenda2){

		$tgl = date('m');

		$sql2 = "SELECT * FROM hasil_kh WHERE no_agenda BETWEEN '$no_agenda 'AND '$no_agenda2' AND MONTH(tanggal_acu_hasil) = '$tgl' GROUP BY no_agenda  ORDER BY no_sampel ASC ";

		$query = $this->db->query($sql2) or die ($this->db->error);

		return $query;

	}


	public function print_pertanggal_sertifikat($id){
		
		$sql2 = "SELECT * FROM hasil_kh WHERE id='$id' ";
		$query = $this->db->query($sql2) or die ($this->db->error);
		return $query;
	}
		

	public function hapus($id){

		$this->db->query("DELETE FROM hasil_kh WHERE id='$id'") or die ($this->db->error);
	}

	public function checkHasilPengujian($id = null){
		$sql = "SELECT id,no_sertifikat, positif_negatif FROM hasil_kh WHERE positif_negatif != '' AND id = (SELECT max(id) FROM input_permohonan_kh WHERE no_sertifikat = '')";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}


} 



?>