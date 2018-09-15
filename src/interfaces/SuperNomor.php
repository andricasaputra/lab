<?php

namespace Lab\interfaces;

interface SuperNomor
{

    public function no_permohonan();

    public function kode_sampel();

    public function no_surat_tugas();

    public function NomorSertifikat($params);

    /*No Sampel Method*/

    public function PilihJumlahSampel($params);

    public function NomorSampel();

    public function PilihNoSampel($params);

    public function getIdForEdit($params);

    /*No agenda*/

    public function set_maxnoAgenda();

    /*Data on Null*/

    public function Kosongdata();

}
