<?php  

namespace Lab\classes\kh\labbakteri;

use Lab\config\Database;
use Lab\classes\LegacyData;
use Lab\interfaces\SuperExport;

class Export extends LegacyData implements SuperExport{

	public function __construct(){

		parent::__construct();

	}
	
	public function mainExport($tgl1=null, $tgl2=null){


		$sql = "SELECT * FROM input_permohonan_kh";

		if ($tgl1 != null && $tgl2 !=null) {
			$sql .= " WHERE tanggal_acu_permohonan BETWEEN '$tgl1' AND '$tgl2'";
		}

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;


	}

	public function exportDataTeknis($tgl1=null, $tgl2=null){


		$sql = "SELECT input_permohonan_kh.id, input_permohonan_kh.tanggal_permohonan ,input_permohonan_kh.kode_sampel, input_permohonan_kh.tanggal_pengujian, input_permohonan_kh.nama_sampel, input_permohonan_kh.bagian_hewan, input_permohonan_kh.target_pengujian2, input_permohonan_kh.jumlah_sampel, input_permohonan_kh.satuan, input_permohonan_kh.metode_pengujian, input_permohonan_kh.nama_penyelia, input_permohonan_kh.nama_analis, input_permohonan_kh.nama_sampel_lab ,hasil_kh.id ,hasil_kh.positif_negatif, hasil_kh.no_sampel, hasil_kh.no_sertifikat FROM input_permohonan_kh LEFT JOIN hasil_kh ON input_permohonan_kh.id = hasil_kh.id";

		if ($tgl1 != null && $tgl2 !=null) {
			$sql .= " WHERE input_permohonan_kh.tanggal_acu_permohonan BETWEEN '$tgl1' AND '$tgl2'";
		}

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;


	}

	public function exportSertifikat($tgl1=null, $tgl2=null){


		$sql = "SELECT input_permohonan_kh.id, input_permohonan_kh.tanggal_permohonan ,input_permohonan_kh.kode_sampel, input_permohonan_kh.tanggal_pengujian, input_permohonan_kh.nama_sampel, input_permohonan_kh.bagian_hewan, input_permohonan_kh.target_pengujian2, input_permohonan_kh.jumlah_sampel, input_permohonan_kh.satuan, input_permohonan_kh.metode_pengujian, input_permohonan_kh.nama_penyelia, input_permohonan_kh.nama_analis , input_permohonan_kh.nama_sampel_lab,  input_permohonan_kh.ket_kesimpulan, input_permohonan_kh.tanggal_sertifikat, input_permohonan_kh.no_sertifikat ,hasil_kh.id ,hasil_kh.positif_negatif, hasil_kh.no_sampel, hasil_kh.no_sertifikat FROM input_permohonan_kh LEFT JOIN hasil_kh ON input_permohonan_kh.id = hasil_kh.id";

		if ($tgl1 != null && $tgl2 !=null) {
			$sql .= " WHERE input_permohonan_kh.waktu_apdate_sertifikat BETWEEN '$tgl1' AND '$tgl2'";
		}

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;


	}

	public function exportSuratHasilUji($tgl1=null, $tgl2=null){


		$sql = "SELECT input_permohonan_kh.id, input_permohonan_kh.no_permohonan , input_permohonan_kh.tanggal_permohonan , input_permohonan_kh.tanggal_pengujian ,  input_permohonan_kh.no_sampel_awal,  input_permohonan_kh.nama_sampel, input_permohonan_kh.bagian_hewan, input_permohonan_kh.target_pengujian2, input_permohonan_kh.jumlah_sampel, input_permohonan_kh.satuan, input_permohonan_kh.metode_pengujian, input_permohonan_kh.nama_penyelia, input_permohonan_kh.nama_analis , input_permohonan_kh.nama_sampel_lab,  input_permohonan_kh.ket_kesimpulan, input_permohonan_kh.tanggal_sertifikat, input_permohonan_kh.no_sertifikat, input_permohonan_kh.tanggal_lhu, input_permohonan_kh.no_lhu ,input_permohonan_kh.no_agenda , input_permohonan_kh.kepala_plh2 , input_permohonan_kh.nip_kepala_plh2 , hasil_kh.id ,hasil_kh.positif_negatif, hasil_kh.no_sampel, hasil_kh.no_sertifikat FROM input_permohonan_kh LEFT JOIN hasil_kh ON input_permohonan_kh.id = hasil_kh.id";

		if ($tgl1 != null && $tgl2 !=null) {
			$sql .= " WHERE input_permohonan_kh.tanggal_acu_permohonan BETWEEN '$tgl1' AND '$tgl2'";
		}

		$query = $this->db->query($sql) or die ($this->db->error);

		return $query;


	}



}


?>