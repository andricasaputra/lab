<?php 

namespace Lab\classes\kh\labparasit;

use Lab\config\Database;
use Lab\classes\LegacyCetak; 

class Cetak extends LegacyCetak{

	public function __construct(){

		parent::__construct();

	}

	public function tampil($id=null){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit";
		if($id !=null){
			$sql .= " WHERE id=$id";
		}
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function tampilHasil($id=null){
		$sql = "SELECT * FROM hasil_kh_lab_parasit";
		if($id !=null){

			$sql .= " WHERE id=$id";
		}
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	/*MULTIPLE PRINT PAGES BEGINS*/

	public function print_pertanggal($tgl1, $tgl2){

		$sql2 = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE tanggal_acu_permohonan BETWEEN '$tgl1' AND '$tgl2'";
		$query = $this->db->query($sql2) or die ($this->db->error);
		return $query;
	}

	public function print_penerimaan_sampel($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE penerima_sampel !=''AND tanggal_acu_permohonan BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function print_penyerahan_sample($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE kode_sampel !=''AND tanggal_acu_permohonan BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function print_permintaan_kesiapan($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE ma !=''AND tanggal_acu_permohonan BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function print_respon_permohonan($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE penyelia !=''AND analis !='' AND tanggal_acu_permohonan BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}


	public function print_kesiapan_pengujian($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE mt !=''AND tanggal_acu_permohonan BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function print_surat_tugas($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE no_surat_tugas !=''AND tanggal_acu_permohonan BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function print_usulan_penunjukan($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE lab_penguji !=''AND tanggal_acu_permohonan BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function print_distribusi_sampel($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE yang_menyerahkanlab !='' AND yang_menerimalab !='' AND tanggal_acu_permohonan BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function print_multi_sertifikat($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE no_sertifikat !='' AND DATE(waktu_apdate_sertifikat) BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function print_multi_lhu($tgl, $tgl2){
		$sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE no_lhu !='' AND DATE(waktu_apdate_sertifikat) BETWEEN '$tgl' AND '$tgl2'";
		$query = $this->db->query($sql) or die ($this->db->error);
		return $query;
	}

	public function print_agenda($tgl1=null, $tgl2=null){


		$sql = "SELECT input_permohonan_kh_lab_parasit.id, input_permohonan_kh_lab_parasit.tanggal_penyerahan_lab ,input_permohonan_kh_lab_parasit.kode_sampel, input_permohonan_kh_lab_parasit.tanggal_pengujian, input_permohonan_kh_lab_parasit.nama_sampel, input_permohonan_kh_lab_parasit.target_pengujian2,input_permohonan_kh_lab_parasit.target_pengujian3, input_permohonan_kh_lab_parasit.metode_pengujian, input_permohonan_kh_lab_parasit.nama_penyelia, input_permohonan_kh_lab_parasit.nama_analis, input_permohonan_kh_lab_parasit.nama_sampel_lab, input_permohonan_kh_lab_parasit.tanggal_sertifikat ,hasil_kh_lab_parasit.id ,hasil_kh_lab_parasit.positif_negatif,hasil_kh_lab_parasit.positif_negatif_target3, hasil_kh_lab_parasit.no_sampel, hasil_kh_lab_parasit.no_sertifikat FROM input_permohonan_kh_lab_parasit INNER JOIN hasil_kh_lab_parasit ON input_permohonan_kh_lab_parasit.id = hasil_kh_lab_parasit.id";

		if ($tgl1 != null && $tgl2 !=null) {
			$sql .= " WHERE DATE(input_permohonan_kh_lab_parasit.waktu_apdate_sertifikat) BETWEEN '$tgl1' AND '$tgl2'";
		}

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;


	}


	/*MULTIPLE PRINT PAGES END*/

	/*PRINT KESIAPAN PENGUJIAN*/

	public function cetak($tanggal){

		$sql2 = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE tanggal_acu_permohonan BETWEEN '$tanggal' AND '$tanggal' GROUP BY tanggal_acu_permohonan";

		$query2 = $this->db->query($sql2) or die ($this->db->error);

		return $query2;

	}

	public function cetakKode($tanggal){

		$sql2 = "SELECT kode_sampel, kode_sampel_sapi, kode_sampel_kerbau, kode_sampel_kuda, kode_sampel_lain, kode_sampel_sapi_bibit FROM input_permohonan_kh_lab_parasit WHERE tanggal_acu_permohonan BETWEEN '$tanggal' AND '$tanggal'";

		$query2 = $this->db->query($sql2) or die ($this->db->error);

		return $query2;

	}

	public function cetakTargetTbKesiapan($tanggal){

		$sql2 = "SELECT target_pengujian2 FROM input_permohonan_kh_lab_parasit WHERE tanggal_acu_permohonan BETWEEN '$tanggal' AND '$tanggal' GROUP BY target_pengujian2";

		$query2 = $this->db->query($sql2) or die ($this->db->error);

		return $query2;

	}

	public function cetakMetodeTbKesiapan($tanggal){

		$sql2 = "SELECT metode_pengujian FROM input_permohonan_kh_lab_parasit WHERE tanggal_acu_permohonan BETWEEN '$tanggal' AND '$tanggal' GROUP BY metode_pengujian";

		$query2 = $this->db->query($sql2) or die ($this->db->error);

		return $query2;

	}

	public function cetakLamaTbKesiapan($tanggal){

		$sql2 = "SELECT lama_pengujian FROM input_permohonan_kh_lab_parasit WHERE tanggal_acu_permohonan BETWEEN '$tanggal' AND '$tanggal' GROUP BY lama_pengujian";

		$query2 = $this->db->query($sql2) or die ($this->db->error);

		return $query2;

	}

	/*END PRINT KESIAPAN PENGUJIAN*/

	public function cetak2($tanggal){

		$sql2 = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE tanggal_acu_permohonan = '$tanggal' order by nama_sampel <> 'Darah Sapi'";

		$query2 = $this->db->query($sql2) or die ($this->db->error);

		return $query2;

	}

	public function cetakSuratTugas($tanggal){

		$sql2 = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE tanggal_acu_permohonan IN('$tanggal')";

		$query2 = $this->db->query($sql2) or die ($this->db->error);

		return $query2;

	}

	/*Scan Tanda Tangan*/

	public function Scan($id){

		$sql = "SELECT * FROM scan_ttd_kh_lab_parasit WHERE id= '$id'";

		$query = $this->db->query($sql) or die ($this->db->error);

		$data = $query->fetch_object();

		$scan = array(

			"ttd_yang_menyerahkan_pengelola_sampel" 
			=> $data->ttd_yang_menyerahkan_pengelola_sampel,
			"ttd_yang_menerima_pengelola_sampel" 
			=> $data->ttd_yang_menerima_pengelola_sampel,
			"ttd_penyelia_data_teknis" 
			=> $data->ttd_penyelia_data_teknis,
			"ttd_analis_data_teknis" 
			=> $data->ttd_analis_data_teknis,
			"ttd_penyelia_hasil_uji" 
			=> $data->ttd_penyelia_hasil_uji,
			"ttd_mt_hasil_uji" 
			=> $data->ttd_mt_hasil_uji,

		);

		return $scan;
	}
}

?>