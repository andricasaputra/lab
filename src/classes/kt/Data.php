<?php

namespace Lab\classes\kt;

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
        $sql = "SELECT * FROM input_permohonan";
        if ($id != null) {
            $sql .= " WHERE id=$id";
        }
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    /*End*/

    /*Tampil Tabel Utama*/

    public function tampil1($jml = null, $id = null)
    {
        if ($jml == null) {
            $sql2 = "SELECT * FROM input_permohonan ORDER BY id DESC LIMIT 0,100";
        } else {
            $sql2 = "SELECT * FROM input_permohonan ORDER BY id DESC LIMIT 0,$jml";
        }
        if ($id != null) {
            $sql2 .= "WHERE id=$id";
        }
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    public function tampil2($id = null)
    {
        $sql2 = "SELECT * FROM input_permohonan ORDER BY id DESC";
        if ($id != null) {
            $sql2 .= " WHERE id=$id";
        }
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    public function tampil3()
    {
        $sql2   = "SELECT * FROM input_permohonan";
        $query  = $this->db->query($sql2) or die($this->db->error);
        $jumlah = $query->num_rows;
        return $jumlah;
    }

    public function tampil4($id)
    {
        $sql2   = "SELECT * FROM input_permohonan WHERE id=$id ";
        $query2 = $this->db->query($sql2) or die($this->db->error);
        return $query2;
    }

    public function tampil_surat_tugas()
    {
        $sql2   = "SELECT id,kode_sampel,no_surat_tugas,no_sampel,tanggal_penunjukan,nama_sampel,jumlah_sampel,target_optk,target_optk2,target_optk3 FROM input_permohonan ORDER BY id DESC";
        $query2 = $this->db->query($sql2) or die($this->db->error);
        return $query2;
    }

    public function button()
    {
        $sql   = "SELECT max(id) as maxkode, kode_sampel FROM input_permohonan";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function tampil_nama($id)
    {
        $sql2  = "SELECT * FROM user WHERE id=$id";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    public function tampil_tumbuhan()
    {
        $sql   = "SELECT * FROM tumbuhan GROUP BY nama_tumbuhan ORDER BY nama_tumbuhan ASC";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function tampil_ilmiah_tumbuhan()
    {
        $sql   = "SELECT * FROM tumbuhan GROUP BY nama_ilmiah_tumbuhan ORDER BY nama_ilmiah_tumbuhan ASC";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function tampil_patogen()
    {
        $sql   = "SELECT id_patogen,patogen FROM penyakit GROUP BY id_patogen ORDER BY patogen ASC";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function tampil_penyakit()
    {
        $sql   = "SELECT * FROM penyakit ORDER BY nama_latin_penyakit ASC";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function tampil_pejabat()
    {
        $sql   = "SELECT * FROM pejabat2 GROUP BY nama_pejabat ORDER BY nama_pejabat ASC";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function tampil_jabatan()
    {
        $sql   = "SELECT * FROM pejabat GROUP BY nama_pejabat ORDER BY id_pejabat ASC";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function ambil_id()
    {
        $id     = "SELECT id FROM input_permohonan";
        $query1 = $this->db->query($id) or die($this->db->error);
        return $query1;
    }

    public function tampil_timeline()
    {
        $sql   = "SELECT * FROM input_permohonan ORDER BY id DESC LIMIT 0,1 ";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function lama_pengujian()
    {
        $sql   = "SELECT * FROM tbl_lamapengujian";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function cara_pengiriman()
    {
        $sql   = "SELECT * FROM tbl_carapengiriman";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function tanggal()
    {
        $tgl    = date('m');
        $thn    = date('Y');
        $sql    = "SELECT tanggal_acu_permohonan FROM input_permohonan WHERE MONTH(tanggal_acu_permohonan) = $tgl AND YEAR(tanggal_acu_permohonan) = $thn";
        $query  = $this->db->query($sql) or die($this->db->error);
        $jumlah = $query->num_rows;
        return $jumlah;
    }

    /*Dashboard Info*/

    public function tanggal_lalu()
    {
        $tgl    = date('m', strtotime('first day of last month'));
        $thn    = date('Y');
        $sql    = "SELECT tanggal_acu_permohonan FROM input_permohonan WHERE MONTH(tanggal_acu_permohonan) = $tgl AND YEAR(tanggal_acu_permohonan) = $thn";
        $query  = $this->db->query($sql) or die($this->db->error);
        $jumlah = $query->num_rows;
        return $jumlah;
    }

    public function per_selesai()
    {
        $sql    = "SELECT tanggal_lhu FROM input_permohonan WHERE tanggal_lhu IS NOT NULL";
        $query  = $this->db->query($sql) or die($this->db->error);
        $jumlah = $query->num_rows;
        return $jumlah;
    }

    public function per_pending()
    {
        $sql    = "SELECT tanggal_lhu FROM input_permohonan WHERE tanggal_lhu IS NULL AND kesiapan='Ya'";
        $query  = $this->db->query($sql) or die($this->db->error);
        $jumlah = $query->num_rows;
        return $jumlah;
    }

    public function per_nonuji()
    {
        $sql    = "SELECT kesiapan FROM input_permohonan WHERE kesiapan='Tidak'";
        $query  = $this->db->query($sql) or die($this->db->error);
        $jumlah = $query->num_rows;
        return $jumlah;
    }

    /*End Dashsboard Info*/

    /*INSERT QUERY BEGIN HERE*/

    public function input($no_permohonan, $tanggal_permohonan, $tanggal_acu_permohonan, $nama_sampel, $nama_ilmiah, $jumlah_sampel, $satuan, $bagian_tumbuhan, $media, $vektor, $daerah_asal, $nama_patogen, $nama_patogen2, $nama_patogen3, $target_optk, $target_optk2, $target_optk3, $metode_pengujian, $metode_pengujian2, $metode_pengujian3, $nama_pemilik, $alamat_pemilik, $dokumen_pendukung, $pemohon, $nip, $no_sampel)
    {
        $kd  = $this->db->query("SELECT no_permohonan FROM input_permohonan WHERE no_permohonan ='$no_permohonan'") or die($this->db->error);
        $cek = $kd->num_rows;

        if ($cek > 0) {
            echo '<script>alert("Nomor Permohonan Sudah Terpakai")</script>';

        } else {
            $this->db->query("INSERT INTO input_permohonan (no_permohonan, tanggal_permohonan, tanggal_acu_permohonan ,nama_sampel, nama_ilmiah, jumlah_sampel, satuan, bagian_tumbuhan, media, vektor, daerah_asal,  nama_patogen,  nama_patogen2,  nama_patogen3, target_optk, target_optk2, target_optk3, metode_pengujian, metode_pengujian2, metode_pengujian3, nama_pemilik, alamat_pemilik, dokumen_pendukung, pemohon, nip, no_sampel) VALUES ('$no_permohonan', '$tanggal_permohonan', now() ,'$nama_sampel', '$nama_ilmiah', '$jumlah_sampel',  '$satuan', '$bagian_tumbuhan', '$media', '$vektor', '$daerah_asal',  '$nama_patogen',  '$nama_patogen2',  '$nama_patogen3', '$target_optk', '$target_optk2', '$target_optk3', '$metode_pengujian', '$metode_pengujian2', '$metode_pengujian3', '$nama_pemilik', '$alamat_pemilik', '$dokumen_pendukung', '$pemohon', '$nip', '$no_sampel')") or die($this->db->error);

        }

    }

    public function input_ttd($id)
    {
        $this->db->query("INSERT INTO scan_ttd (id) VALUES ('$id')") or die($this->db->error);

    }

    public function export_all()
    {
        $sql2  = "SELECT * FROM input_permohonan ORDER BY tanggal_acu_permohonan ASC";
        $query = $this->db->query($sql2) or die($this->db->error);
        return $query;
    }

    /*INSERT QUERY END HERE*/

    /*DELETE QUERY*/

    public function hapus($id)
    {
        $this->db->query("DELETE FROM input_permohonan WHERE id=$id") or die($this->db->error);
    }

    public function KosongData()
    {
        $sql   = "SELECT id FROM input_permohonan LIMIT 1";
        $query = $this->db->query($sql) or die($this->db->error);
        $num   = $query->num_rows;

        return $num;

    }

    public function KosongDataSertifikat()
    {
        $sql   = "SELECT id FROM input_permohonan WHERE no_sertifikat IS NOT NULL LIMIT 1";
        $query = $this->db->query($sql) or die($this->db->error);
        $num   = $query->num_rows;

        return $num;

    }

    public function set_button()
    {
        $sql = "SELECT max(id) as maxkode FROM input_permohonan";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    /*FOR SUMBER DATA ON FOLDER DATA_KH*/

    public function infoPenerimaSampel($select = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,jabatan,nama_patogen,nama_patogen2,nama_patogen3 FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE jabatan IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == "select") {
            $sql   = "SELECT id,jabatan,nama_patogen,nama_patogen2,nama_patogen3,pemohon FROM input_permohonan WHERE jabatan IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {
            $sql   = "SELECT id,jabatan,nama_patogen,nama_patogen2,nama_patogen3 FROM input_permohonan WHERE jabatan IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoPenyerahanSampel($select = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,kode_sampel FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE jabatan IS NOT NULL AND kode_sampel IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {
            $sql   = "SELECT id,nama_sampel, kode_sampel FROM input_permohonan WHERE jabatan IS NOT NULL AND kode_sampel IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {
            $sql   = "SELECT id,kode_sampel FROM input_permohonan WHERE jabatan IS NOT NULL AND kode_sampel IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoPermintaanKesiapanPengujian($select = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,ma FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE ma IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {
            $sql   = "SELECT id,nama_sampel,ma FROM input_permohonan WHERE ma IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {
            $sql   = "SELECT id,ma FROM input_permohonan WHERE kode_sampel IS NOT NULL AND ma IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoResponPermohonanPengujian($select = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,penyelia,analis,saran,tanggal_selesai FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE saran IS NULL AND tanggal_selesai IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {
            $sql   = "SELECT id,penyelia,penyelia2,analis,analis2,bahan,bahan2,alat,alat2,saran,tanggal_selesai,ma,nip_ma FROM input_permohonan WHERE id IN (SELECT id FROM input_permohonan WHERE mt IS NOT NULL AND saran IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {
            $sql   = "SELECT id FROM input_permohonan WHERE mt IS NULL AND saran IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoKesiapanPengujian($select = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,kondisi_sampel,mt FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE kondisi_sampel IS NULL AND mt IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {
            $sql   = "SELECT id,nama_sampel,kondisi_sampel,mt FROM input_permohonan WHERE kondisi_sampel IS NULL AND mt IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {
            $sql   = "SELECT id,kondisi_sampel,mt FROM input_permohonan WHERE kondisi_sampel IS NULL AND mt IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoPenunjukanPetugas($select = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,lab_penguji,nama_penyelia,nama_analis, no_surat_tugas FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE kesiapan = 'Ya' AND mt IS NOT NULL AND lab_penguji IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {
            $sql   = "SELECT id,nama_sampel,lab_penguji,nama_penyelia,nama_analis, no_surat_tugas,mt,nip_mt FROM input_permohonan WHERE id = (SELECT max(id) FROM input_permohonan WHERE kesiapan = 'Ya' AND no_surat_tugas IS NOT NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {
            $sql   = "SELECT id,lab_penguji,nama_penyelia,nama_analis, no_surat_tugas,mt,nip_mt,nama_patogen FROM input_permohonan WHERE kesiapan = 'Ya' AND mt IS NOT NULL AND no_surat_tugas IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {
            $sql   = "SELECT id,lab_penguji,nama_penyelia,nama_analis, no_surat_tugas FROM input_permohonan WHERE kesiapan = 'Ya' AND mt IS NOT NULL AND lab_penguji IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoPengelolaSampel($select = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,yang_menerimalab,no_sampel,nama_sampel,nama_analis FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE lab_penguji IS NOT NULL AND yang_menerimalab IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {
            $sql   = "SELECT id,nama_sampel,yang_menerimalab,no_sampel,nama_sampel,nama_analis FROM input_permohonan  WHERE lab_penguji IS NOT NULL AND yang_menerimalab IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {
            $sql   = "SELECT id FROM input_permohonan WHERE lab_penguji IS NOT NULL AND yang_menerimalab IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {
            $sql   = "SELECT id,yang_menerimalab,no_sampel,nama_sampel,nama_analis FROM input_permohonan WHERE lab_penguji IS NOT NULL AND yang_menerimalab IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoDataTeknis($select = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,tanggal_pengujian,rekomendasi,ket_kesimpulan,nama_penyelia,nama_analis,tanggal_penyerahan FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE yang_menerimalab IS NOT NULL AND tanggal_pengujian IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {
            $sql   = "SELECT id,nama_sampel,tanggal_pengujian,rekomendasi,ket_kesimpulan,nama_penyelia,nama_analis,tanggal_penyerahan FROM input_permohonan  WHERE yang_menerimalab IS NOT NULL AND tanggal_pengujian IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {
            $sql   = "SELECT id FROM input_permohonan WHERE yang_menerimalab IS NOT NULL AND tanggal_pengujian IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {
            $sql   = "SELECT id,tanggal_pengujian,rekomendasi,ket_kesimpulan,nama_penyelia,nama_analis,tanggal_penyerahan FROM input_permohonan WHERE yang_menerimalab IS NOT NULL AND tanggal_pengujian IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoHasilPengujian($select = null, $id = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,no_sertifikat,waktu_apdate_sertifikat,nama_penyelia,nama_analis,tanggal_pengujian,rekomendasi,ket_kesimpulan,mt,nip_penyelia,nip_analis,nip_mt,jumlah_sampel,no_sampel,kode_sampel,target_optk,target_optk2,target_optk3 FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE tanggal_pengujian IS NOT NULL AND no_sertifikat IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {
            $sql   = "SELECT id,nama_sampel,no_sertifikat,waktu_apdate_sertifikat,nama_penyelia,nama_analis,tanggal_pengujian,rekomendasi,ket_kesimpulan,mt,nip_penyelia,nip_analis,nip_mt,jumlah_sampel,no_sampel,kode_sampel,target_optk,target_optk2,target_optk3 FROM input_permohonan  WHERE tanggal_pengujian IS NOT NULL AND hasil_pengujian IS NULL AND no_sertifikat IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'anotherselect') {
            $sql   = "SELECT id,nama_sampel,no_sertifikat,waktu_apdate_sertifikat,nama_penyelia,nama_analis,tanggal_pengujian,rekomendasi,ket_kesimpulan,mt,nip_penyelia,nip_analis,nip_mt,jumlah_sampel,no_sampel,kode_sampel,target_optk,target_optk2,target_optk3 FROM input_permohonan  WHERE tanggal_pengujian IS NOT NULL  AND no_sertifikat IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {
            $sql   = "SELECT id,no_sertifikat FROM input_permohonan WHERE id = (SELECT max(id) FROM input_permohonan WHERE tanggal_pengujian IS NOT NULL  AND no_sertifikat IS NOT NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getminid') {
            $sql   = "SELECT id,no_sertifikat FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE tanggal_pengujian IS NOT NULL AND no_sertifikat IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($id != null) {
            $sql   = "SELECT id,no_sertifikat,waktu_apdate_sertifikat,nama_penyelia,nama_analis,tanggal_pengujian,rekomendasi,ket_kesimpulan,mt,nip_penyelia,nip_analis,nip_mt,jumlah_sampel,no_sampel,kode_sampel,target_optk,target_optk2,target_optk3 FROM input_permohonan WHERE id = $id";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    public function infoLHU($select = null)
    {
        if ($select == null) {
            $sql   = "SELECT id,no_sertifikat,no_agenda,kepala_plh2,nip_kepala_plh2 FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE no_sertifikat IS NOT NULL AND no_agenda IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'select') {
            $sql   = "SELECT id,no_permohonan,nama_sampel,no_sertifikat,no_agenda,kepala_plh2,nip_kepala_plh2 FROM input_permohonan  WHERE no_sertifikat IS NOT NULL AND no_agenda IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getid') {
            $sql   = "SELECT id,no_sertifikat FROM input_permohonan WHERE id = (SELECT max(id) FROM input_permohonan WHERE no_sertifikat IS NOT NULL AND no_agenda IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } elseif ($select == 'getminid') {
            $sql   = "SELECT id,no_sertifikat FROM input_permohonan WHERE id = (SELECT min(id) FROM input_permohonan WHERE no_sertifikat IS NOT NULL AND no_agenda IS NULL)";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query;

        } else {
            $sql   = "SELECT id,no_sertifikat,no_agenda,kepala_plh2,nip_kepala_plh2 FROM input_permohonan WHERE tanggal_pengujian IS NOT NULL AND no_agenda IS NULL";
            $query = $this->db->query($sql) or die($this->db->error);
            return $query->num_rows;

        }

    }

    /*New Query Builder*/

    public function update($data, $where)
    {
        $query = " UPDATE input_permohonan SET ";

        foreach ($data as $key => $value) {
            $query .= "" . $key . "= '" . $value . "',";
        }

        $query = substr($query, 0, -1);

        $query .= " WHERE ";

        foreach ($where as $key => $value) {
            $query .= "" . $key . "= '" . $value . "',";
        }

        $query = substr($query, 0, -1);

        /*$data += $where;*/

        $this->db->query($query) or die($this->db->error);

    }

    public function InsertScanttd($data)
    {
        $query = " INSERT INTO scan_ttd (id)";

        $query .= " VALUES ";

        foreach ($data as $key => $value) {
            $query .= "('" . $value . "'),";
        }

        $query = substr($query, 0, -1);

        /*$data += $where;*/

        $this->db->query($query) or die($this->db->error);

    }

    public function updateScanttd($data, $where)
    {
        $query = " UPDATE scan_ttd SET ";

        foreach ($data as $key => $value) {
            $query .= "" . $key . "= '" . $value . "',";
        }

        $query = substr($query, 0, -1);

        $query .= " WHERE ";

        foreach ($where as $key => $value) {
            $query .= "" . $key . "= '" . $value . "',";
        }

        $query = substr($query, 0, -1);

        $this->db->query($query) or die($this->db->error);

    }

}
