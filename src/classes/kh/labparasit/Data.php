<?php

namespace Lab\classes\kh\labparasit;

use Lab\classes\LegacyData;
use Lab\interfaces\SuperData;

class Data extends LegacyData implements SuperData
{

    public function __construct()
    {

        parent::__construct();

    }

    public function tampil($id = null)
    {

        $sql = "SELECT * FROM input_permohonan_kh_lab_parasit";

        if ($id != null) {

            $sql .= " WHERE id=$id";

        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil1($id = null)
    {

        $sql2 = "SELECT * FROM input_permohonan_kh_lab_parasit ";

        if ($id != null) {

            $sql2 .= " WHERE id=$id  ORDER BY id DESC";

        } else {

            $sql2 .= "  ORDER BY id DESC ";

        }

        $query = $this->db->query($sql2) or die($this->db->error);

        return $query;

    }

    public function tampil2($id = null)
    {

        $sql2 = "SELECT * FROM input_permohonan_kh_lab_parasit";

        if ($id != null) {

            $sql2 .= " WHERE id=$id ORDER BY id DESC";

        } else {
            $sql2 .= " ORDER BY id DESC";
        }

        $query = $this->db->query($sql2) or die($this->db->error);

        return $query;

    }

    public function tampil3()
    {

        $sql2 = "SELECT * FROM input_permohonan_kh_lab_parasit";

        $query = $this->db->query($sql2) or die($this->db->error);

        $jumlah = $query->num_rows;

        return $jumlah;

    }

    public function tampil4($id)
    {

        $sql2 = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE id=$id ";

        $query2 = $this->db->query($sql2) or die($this->db->error);

        return $query2;

    }

    public function tampil_surat_tugas()
    {
        $sql2   = "SELECT id,kode_sampel,no_surat_tugas,no_sampel,tanggal_penunjukan,nama_sampel,jumlah_sampel,target_pengujian2,target_pengujian3 FROM input_permohonan_kh_lab_parasit ORDER BY id DESC";
        $query2 = $this->db->query($sql2) or die($this->db->error);
        return $query2;
    }

    public function set_button()
    {

        $sql = "SELECT max(id) as maxkode FROM input_permohonan_kh_lab_parasit";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function button($id)
    {

        $sql = "SELECT max(id) as maxkode, kode_sampel, kode_sampel_sapi, kode_sampel_sapi_bibit, kode_sampel_kerbau, kode_sampel_kuda, kode_sampel_lain, nama_sampel  FROM input_permohonan_kh_lab_parasit WHERE id=$id";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil_patogen()
    {

        $sql = "SELECT * FROM patogen_kh ORDER BY nama_latin_penyakit ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil_pejabat()
    {

        $sql = "SELECT * FROM pejabat_kh WHERE kategori = 'nonjabfung' GROUP BY nama_pejabat ORDER BY nama_pejabat ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil_pejabat_all()
    {

        $sql = "SELECT * FROM pejabat_kh GROUP BY nama_pejabat ORDER BY nama_pejabat ASC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil_jabatan()
    {

        $sql = "SELECT * FROM pejabat_kh WHERE kategori = 'jabfung' GROUP BY nama_pejabat ORDER BY id_pejabat  DESC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tampil_jabfung()
    {

        $sql = "SELECT * FROM pejabat_kh WHERE kategori = 'jabfung' GROUP BY nama_pejabat ORDER BY id_pejabat  DESC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function ambil_id()
    {

        $id = "SELECT id FROM input_permohonan_kh_lab_parasit WHERE kesiapan = 'Ya' ORDER BY id ASC";

        $query1 = $this->db->query($id) or die($this->db->error);

        return $query1;

    }

    public function tampil_timeline()
    {

        $sql = "SELECT * FROM input_permohonan_kh_lab_parasit ORDER BY id DESC LIMIT 0,1 ";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function tanggal()
    {

        $tgl = date('m');

        $thn = date('Y');

        $sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE MONTH(tanggal_acu_permohonan) = $tgl AND YEAR(tanggal_acu_permohonan) = $thn";

        $query = $this->db->query($sql) or die($this->db->error);

        $jumlah = $query->num_rows;

        return $jumlah;

    }

    public function tanggal_lalu()
    {

        $tgl = date('m', strtotime('first day of last month'));

        $thn = date('Y');

        $sql = "SELECT * FROM input_permohonan_kh_lab_parasit WHERE MONTH(tanggal_acu_permohonan) = $tgl AND YEAR(tanggal_acu_permohonan) = $thn";

        $query = $this->db->query($sql) or die($this->db->error);

        $jumlah = $query->num_rows;

        return $jumlah;

    }

    public function per_selesai()
    {

        $sql = "SELECT tanggal_lhu FROM input_permohonan_kh_lab_parasit WHERE tanggal_lhu !=''";

        $query = $this->db->query($sql) or die($this->db->error);

        $jumlah = $query->num_rows;

        return $jumlah;

    }

    public function per_pending()
    {

        $sql = "SELECT tanggal_lhu FROM input_permohonan_kh_lab_parasit WHERE tanggal_lhu=''";

        $query = $this->db->query($sql) or die($this->db->error);

        $jumlah = $query->num_rows;

        return $jumlah;

    }

    public function per_nonuji()
    {
        $sql    = "SELECT kesiapan FROM input_permohonan_kh_lab_parasit WHERE kesiapan='Tidak'";
        $query  = $this->db->query($sql) or die($this->db->error);
        $jumlah = $query->num_rows;
        return $jumlah;
    }

    public function input($no_permohonan, $tanggal_permohonan, $tanggal_acu_permohonan, $jenis_permohonan, $nama_sampel, $jumlah_sampel, $satuan, $no_sampel_awal, $bagian_hewan, $produk_hewan, $metode_pengujian, $biaya_pengujian, $waktu_pengambilan_sampel, $area_asal, $cara_pengambilan_sampel, $target_pengujian, $lama_pengujian, $nama_pemilik, $alamat_pemilik, $dokumen_pendukung, $pemohon, $nip_pemohon, $no_sampel)
    {

        $this->db->query("INSERT INTO input_permohonan_kh_lab_parasit (id, no_permohonan, tanggal_permohonan, tanggal_acu_permohonan , jenis_permohonan , nama_sampel, jumlah_sampel, satuan ,no_sampel_awal, bagian_hewan, produk_hewan, metode_pengujian, biaya_pengujian, waktu_pengambilan_sampel, area_asal, cara_pengambilan_sampel, target_pengujian, lama_pengujian, nama_pemilik, alamat_pemilik, dokumen_pendukung ,pemohon, nip_pemohon, nama_pelanggan, alamat_pelanggan, no_sampel) VALUES ('', '$no_permohonan', '$tanggal_permohonan', '$tanggal_acu_permohonan', '$jenis_permohonan' ,'$nama_sampel', '$jumlah_sampel', '$satuan', '$no_sampel_awal', '$bagian_hewan', '$produk_hewan', '$metode_pengujian', '$biaya_pengujian', '$waktu_pengambilan_sampel', '$area_asal', '$cara_pengambilan_sampel', '$target_pengujian', '$lama_pengujian', '$nama_pemilik', '$alamat_pemilik', '$dokumen_pendukung', '$pemohon', '$nip_pemohon', '$nama_pemilik', '$alamat_pemilik', '$no_sampel')") or die($this->db->error);

    }

    public function input_ttd($id)
    {

        $this->db->query("INSERT INTO scan_ttd_kh_lab_parasit (id) VALUES ('$id')") or die($this->db->error);

    }

    public function hapus($id)
    {
        $this->db->query("DELETE FROM input_permohonan_kh_lab_parasit WHERE id='$id'") or die($this->db->error);
    }

    public function KosongData()
    {
        $sql   = "SELECT id FROM input_permohonan_kh_lab_parasit LIMIT 5";
        $query = $this->db->query($sql) or die($this->db->error);
        $num   = $query->num_rows;

        return $num;

    }

    public function KosongDataSertifikat()
    {
        $sql   = "SELECT id FROM input_permohonan_kh_lab_parasit WHERE no_sertifikat !='' LIMIT 5";
        $query = $this->db->query($sql) or die($this->db->error);
        $num   = $query->num_rows;

        return $num;

    }

    /*FOR SUMBER DATA ON FOLDER DATA_KH*/

    public function infoPenerimaSampel($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,penerima_sampel,no_sampel_awal FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE penerima_sampel = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == "select") {

            $sql   = "SELECT id,penerima_sampel,no_sampel_awal FROM input_permohonan_kh_lab_parasit WHERE penerima_sampel = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,penerima_sampel,no_sampel_awal FROM input_permohonan_kh_lab_parasit WHERE penerima_sampel = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoPenyerahanSampel($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,kode_sampel FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE penerima_sampel !='' AND kode_sampel = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {

            $sql   = "SELECT id,nama_sampel, kode_sampel FROM input_permohonan_kh_lab_parasit WHERE penerima_sampel !='' AND kode_sampel = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,kode_sampel FROM input_permohonan_kh_lab_parasit WHERE penerima_sampel !='' AND kode_sampel = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoPermintaanKesiapanPengujian($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,ma FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE ma = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {

            $sql   = "SELECT id,nama_sampel,ma FROM input_permohonan_kh_lab_parasit WHERE ma = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,ma FROM input_permohonan_kh_lab_parasit WHERE kode_sampel !='' AND ma = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoResponPermohonanPengujian($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,penyelia,analis,saran,tanggal_selesai FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE saran = '' AND tanggal_selesai = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {

            $sql   = "SELECT id,nama_sampel,penyelia,analis FROM input_permohonan_kh_lab_parasit WHERE saran = '' AND tanggal_selesai = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,penyelia,analis FROM input_permohonan_kh_lab_parasit WHERE mt != '' AND saran = '' ";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoKesiapanPengujian($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,kondisi_sampel,mt FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE kondisi_sampel = '' AND mt = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {

            $sql   = "SELECT id,nama_sampel,kondisi_sampel,mt FROM input_permohonan_kh_lab_parasit WHERE kondisi_sampel = '' AND mt = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,kondisi_sampel,mt FROM input_permohonan_kh_lab_parasit WHERE kondisi_sampel = '' AND mt = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoPenunjukanPetugas($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,lab_penguji,nama_penyelia,nama_analis, no_surat_tugas FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE kesiapan = 'Ya' AND mt != '' AND lab_penguji = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {

            $sql   = "SELECT id,nama_sampel,lab_penguji,nama_penyelia,nama_analis, no_surat_tugas FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT max(id) FROM input_permohonan_kh_lab_parasit WHERE kesiapan = 'Ya' AND no_surat_tugas != '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {

            $sql   = "SELECT id FROM input_permohonan_kh_lab_parasit WHERE kesiapan = 'Ya' AND mt != '' AND no_surat_tugas = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,lab_penguji,nama_penyelia,nama_analis, no_surat_tugas FROM input_permohonan_kh_lab_parasit WHERE kesiapan = 'Ya' AND mt != '' AND lab_penguji = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoPengelolaSampel($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,nama_sampel_lab,yang_menerimalab,no_sampel,nama_sampel,nama_analis FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE lab_penguji != '' AND yang_menerimalab = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {

            $sql   = "SELECT id,nama_sampel,nama_sampel_lab,yang_menerimalab,no_sampel,nama_sampel,nama_analis FROM input_permohonan_kh_lab_parasit  WHERE lab_penguji != '' AND yang_menerimalab = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {

            $sql   = "SELECT id FROM input_permohonan_kh_lab_parasit WHERE lab_penguji != '' AND yang_menerimalab = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,nama_sampel_lab,yang_menerimalab,no_sampel,nama_sampel,nama_analis FROM input_permohonan_kh_lab_parasit WHERE lab_penguji != '' AND yang_menerimalab = '' AND yang_menyerahkanlab = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoDataTeknis($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,tanggal_pengujian,rekomendasi,ket_kesimpulan,nama_penyelia,nama_analis,tanggal_penyerahan FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE yang_menerimalab != '' AND tanggal_pengujian = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {

            $sql   = "SELECT id,nama_sampel,tanggal_pengujian,rekomendasi,ket_kesimpulan,nama_penyelia,nama_analis,tanggal_penyerahan FROM input_permohonan_kh_lab_parasit  WHERE yang_menerimalab != '' AND tanggal_pengujian = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {

            $sql   = "SELECT id FROM input_permohonan_kh_lab_parasit WHERE yang_menerimalab != '' AND tanggal_pengujian = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,tanggal_pengujian,rekomendasi,ket_kesimpulan,nama_penyelia,nama_analis,tanggal_penyerahan FROM input_permohonan_kh_lab_parasit WHERE yang_menerimalab != '' AND tanggal_pengujian = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoHasilPengujian($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,no_sertifikat,waktu_apdate_sertifikat,nama_penyelia,nama_analis,tanggal_pengujian,rekomendasi,ket_kesimpulan,mt,nip_penyelia,nip_analis,nip_mt,jumlah_sampel,no_sampel,kode_sampel,target_pengujian2,target_pengujian3 FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE tanggal_pengujian != '' AND no_sertifikat = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {

            $sql   = "SELECT id,nama_sampel,no_sertifikat,waktu_apdate_sertifikat,nama_penyelia,nama_analis,tanggal_pengujian,rekomendasi,ket_kesimpulan,mt,nip_penyelia,nip_analis,nip_mt,jumlah_sampel,no_sampel,kode_sampel,target_pengujian2,target_pengujian3 FROM input_permohonan_kh_lab_parasit  WHERE tanggal_pengujian != '' AND hasil_pengujian = '' AND no_sertifikat = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'anotherselect') {

            $sql   = "SELECT id,nama_sampel,no_sertifikat,waktu_apdate_sertifikat,nama_penyelia,nama_analis,tanggal_pengujian,rekomendasi,ket_kesimpulan,mt,nip_penyelia,nip_analis,nip_mt,jumlah_sampel,no_sampel,kode_sampel,target_pengujian2 FROM input_permohonan_kh_lab_parasit  WHERE tanggal_pengujian != ''  AND no_sertifikat = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {

            $sql   = "SELECT id,no_sertifikat FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT max(id) FROM input_permohonan_kh_lab_parasit WHERE tanggal_pengujian != '' AND no_sertifikat != '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getminid') {

            $sql   = "SELECT id,no_sertifikat FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE tanggal_pengujian != '' AND no_sertifikat = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,no_sertifikat,waktu_apdate_sertifikat,nama_penyelia,nama_analis,tanggal_pengujian,rekomendasi,ket_kesimpulan,mt,nip_penyelia,nip_analis,nip_mt,jumlah_sampel,no_sampel,kode_sampel,target_pengujian2,target_pengujian3 FROM input_permohonan_kh_lab_parasit WHERE tanggal_pengujian != '' AND no_sertifikat = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoLHU($select = null)
    {

        if ($select == null) {

            $sql   = "SELECT id,no_sertifikat,no_agenda,kepala_plh2,nip_kepala_plh2 FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE no_sertifikat != '' AND no_agenda = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {

            $sql   = "SELECT id,no_permohonan,nama_sampel,no_sertifikat,no_agenda,kepala_plh2,nip_kepala_plh2 FROM input_permohonan_kh_lab_parasit  WHERE no_sertifikat != '' AND no_agenda = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {

            $sql   = "SELECT id,no_sertifikat FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT max(id) FROM input_permohonan_kh_lab_parasit WHERE no_sertifikat != '' AND no_agenda = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getminid') {

            $sql   = "SELECT id,no_sertifikat FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT min(id) FROM input_permohonan_kh_lab_parasit WHERE no_sertifikat != '' AND no_agenda = '')";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {

            $sql   = "SELECT id,no_sertifikat,no_agenda,kepala_plh2,nip_kepala_plh2 FROM input_permohonan_kh_lab_parasit WHERE tanggal_pengujian != '' AND no_agenda = ''";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

}
