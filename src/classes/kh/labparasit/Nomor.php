<?php

namespace Lab\classes\kh\labparasit;

use Lab\classes\LegacyNomor;
use Lab\interfaces\SuperNomor;

class Nomor extends LegacyNomor implements SuperNomor
{

    public function __construct()
    {

        parent::__construct();

    }

    // Nomor Permohonan

    public function no_permohonan()
    {

        $sql = "SELECT no_permohonan FROM input_permohonan_kh_lab_parasit ORDER BY id DESC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    // Kode Sampel

    public function kode_sampel()
    {

        $sql = "SELECT kode_sampel FROM input_permohonan_kh_lab_parasit WHERE id = (SELECT max(id) FROM input_permohonan_kh_lab_parasit WHERE kode_sampel != '')";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    // Nomor Surat Tugas

    public function no_surat_tugas()
    {

        $sql = "SELECT no_surat_tugas FROM input_permohonan_kh_lab_parasit ORDER BY no_surat_tugas DESC";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function set_maxno()
    {

        $sql   = "SELECT max(id) as Maxid FROM input_permohonan_kh_lab_parasit WHERE no_surat_tugas !=''";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;

    }

    public function max_no($no_surat_tugas = null)
    {
        if ($no_surat_tugas != null) {
            $sql = "SELECT max(id) as Maxid FROM input_permohonan_kh_lab_parasit WHERE no_surat_tugas !=''";
        } else {
            $sql = "SELECT max(id) as Maxid FROM input_permohonan_kh_lab_parasit";
        }
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;

    }

    public function max_nomor($id)
    {

        $sql = "SELECT no_surat_tugas FROM input_permohonan_kh_lab_parasit WHERE id=$id";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    // Nomor Sertifikat

    public function NomorSertifikat($noser=null)
    {
        $sql   = "SELECT no_sertifikat FROM input_permohonan_kh_lab_parasit WHERE id  = (SELECT max(id) FROM input_permohonan_kh_lab_parasit WHERE no_sertifikat != '' AND no_sertifikat)";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    /*public function NomorSertifikat($noser)
    {
        $sql   = "SELECT no_sertifikat FROM input_permohonan_kh_lab_parasit WHERE id = $noser AND no_sertifikat !=''";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }*/

    public function set_maxnoSer()
    {
        $sql   = "SELECT max(id) as Maxid FROM input_permohonan_kh_lab_parasit WHERE no_sertifikat !=''";
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;
    }

    public function max_noSer($no_sertifikat = null)
    {
        if ($no_sertifikat != null) {
            $sql = "SELECT max(id) as Maxid FROM input_permohonan_kh_lab_parasit WHERE no_sertifikat !=''";
        } else {
            $sql = "SELECT max(id) as Maxid FROM input_permohonan_kh_lab_parasit";
        }
        $query = $this->db->query($sql) or die($this->db->error);
        return $query;

    }

    public function max_nomorSer($id)
    {

        $sql = "SELECT no_sertifikat FROM input_permohonan_kh_lab_parasit WHERE id=$id";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    // Nomor Sampel Khusus Potong

    public function NomorSampel()
    {

        $sql = "SELECT no_sampel, jumlah_sampel FROM input_permohonan_kh_lab_parasit WHERE  id = (SELECT max(id) as maxid FROM input_permohonan_kh_lab_parasit WHERE no_sampel !='' AND nama_sampel NOT LIKE '%Bibit%')";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function PilihNoSampel($id)
    {

        $sql = "SELECT no_sampel FROM input_permohonan_kh_lab_parasit WHERE kesiapan = 'Ya' AND nama_sampel NOT LIKE '%Bibit%' AND id = $id ";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function getIdForEdit($id)
    {

        $sql = "SELECT id FROM input_permohonan_kh_lab_parasit WHERE kesiapan = 'Ya' AND id > $id";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function PilihJumlahSampel($id)
    {

        $sql = "SELECT jumlah_sampel,no_sampel FROM input_permohonan_kh_lab_parasit WHERE id = $id ";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    // Nomor Agenda

    public function set_maxnoAgenda()
    {

        $sql = "SELECT max(id) as Maxid FROM input_permohonan_kh_lab_parasit WHERE no_agenda !=''";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function max_noAgenda($no_agenda = null)
    {

        if ($no_agenda != null) {

            $sql = "SELECT max(id) as Maxid FROM input_permohonan_kh_lab_parasit WHERE no_agenda !=''";

        } else {

            $sql = "SELECT max(id) as Maxid FROM input_permohonan_kh_lab_parasit";

        }

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function max_nomorAgenda($id)
    {

        $sql = "SELECT no_agenda FROM input_permohonan_kh_lab_parasit WHERE id=$id";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;
    }

    public function Kosongdata()
    {

        $sql = "SELECT id, no_surat_tugas, no_sertifikat, no_agenda FROM input_permohonan_kh_lab_parasit";

        $query = $this->db->query($sql) or die($this->db->error);

        return $query;

    }

    public function bilangan($bilangan)
    {

        return parent::setbilangan($bilangan);

    }

}
