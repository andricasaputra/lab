<?php
session_start();
if (!isset($_SESSION['loginsuperkt'])) {
    header("Location: ../index.php");

    exit;
}
require_once 'templates/header.php';
?>
<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top " role="navigation" >

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                </button>

                <button id="menu-toggle" type="button" data-toggle="button" class="btn btn-info2 btn-xs btn-circle">

                <span class="push"><i class="fa fa-chevron-left"></i></span>

                </button>

                <button id="menu-toggle2" type="button" data-toggle="button" class="btn btn-info2 btn-xs btn-circle">

                <span class="push"><i class="fa fa-chevron-right"></i></span>

                </button>

                <a class="navbar-brand" href="#"><img src="../assets/img/silelogo.jpg" width="40px" class="gambarBrand"><span class="brand2">Sistem Informasi</span> <span class="brand">LABORATORIUM Elektronik</span></a>

            </div>

            <ul class="nav navbar-top-links navbar-right">

                <?php

                if (isset($_SESSION['loginsuperkt'])) {
                    $id = $_SESSION['loginsuperkt'];

                }

                $tampil = $objectData->tampil_nama($id);

                $data = $tampil->fetch_object();

                echo $data->nama;

                ?>

                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>

                    </a>

                    <ul class="dropdown-menu dropdown-user">

                        <li><i class="fa fa-gear fa-fw"></i><?php echo $data->nama_jabatan; ?>

                        </li>

                        <li class="divider"></li>

                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

                    </li>

                </ul>
            </li>
        </ul>

        <div class="navbar-default navbar-static-side" role="navigation" id="side">

            <div class="sidebar-collapse">

                <ul class="nav" id="side-menu" >

                    <li>

                        <a href="?page=dashboard"><i class="fa fa-home fa-fw"></i> Dashboard</a>

                    </li>

                    <li>

                        <a href="?page=data_permohonan" id="fff"><i class="fa fa-table fa-fw"></i> Data Permohonan</a>

                    </li>

                    <li>

                        <a href="#"><i class="fa fa-tasks fa-fw"></i> Manajer Administrasi<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">

                            <li>

                                <a href="?page=penerima_sampel"><i class="fa fa-user fa-fw"></i>Penerima Sampel</a>

                            </li>

                            <li>

                                <a href="?page=penyerahan_sampel"><i class="fa fa-leaf fa-fw"></i>Penyerahan Sampel </a>

                            </li>


                            <li>

                                <a href="?page=permintaan_kesiapan_pengujian"><i class="fa fa-dashboard fa-fw"></i>Permintaan Kesiapan</a>

                            </li>


                            <li>

                                <a href="?page=respon_permohonan"><i class="fa fa-file-text-o fa-fw"></i>Respon Permohonan </a>

                            </li>


                        </ul>

                        <!-- /.nav-second-level -->

                    </li>

                    <li>

                        <a href="#"><i class="fa fa-tasks fa-fw"></i> Manajer Teknis<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">

                            <li>

                                <a href="?page=kesiapan_pengujian"><i class="fa fa-dashboard fa-fw"></i>Kesiapan Pengujian</a>

                            </li>

                            <li>

                                <a href="?page=penyelia_analis"><i class="fa fa-pencil fa-fw"></i>Penunjukan Petugas</a>

                            </li>

                            <li>

                                <a href="?page=pengelola_sampel"><i class="fa fa-user fa-fw"></i>Pengelola Sampel</a>

                            </li>

                        </ul>

                        <!-- /.nav-second-level -->

                    </li>

                    <li>

                        <a href="#"><i class="fa fa-flask fa-fw" ></i>Pengujian<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">

                            <li>

                                <a href="?page=data_teknis"><i class="fa fa-file-text fa-fw" ></i>Data Teknis</a>

                            </li>

                            <li>

                                <a href="?page=sertifikat"><i class="fa fa-file-text-o fa-fw" ></i>Hasil Pengujian</a>

                            </li>

                        </ul>

                        <!-- /.nav-second-level -->

                    </li>

                    <li>

                        <a href="?page=surat_hasil_uji"><i class="fa fa-check-square fa-fw" ></i>Surat Hasil Uji</a>

                    </li>

                    <li>

                        <a href="#"><i class="fa fa-gear fa-fw"></i> Database<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">

                            <li>

                                <a href="?page=input_nama_tumbuhan"><i class="fa fa-leaf fa-fw"></i>Nama Sampel</a>

                            </li>

                            <li>

                                <a href="?page=input_nama_patogen"><i class="fa fa-bug fa-fw"></i></i>Nama Target</a>

                            </li>

                            <li>

                                <a href="?page=tambah_nama_user"><i class="fa fa-user fa-fw"></i>Nama User</a>

                            </li>

                        </ul>

                        <!-- /.nav-second-level -->

                    </li>

                    <li>

                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Seeting Aplikasi<span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level">

                            <li>

                                <a href="?page=backup_db"><i class="fa fa-long-arrow-down fa-fw"></i> Backup Database</a>

                            </li>

                            <li>

                                <a href="?page=restore_db"><i class="fa fa-long-arrow-up fa-fw"></i> Restore Database</a>

                            </li>

                            <li>

                                <a href="?page=delete_db"><i class="fa fa-trash-o fa-fw"></i> Delete Database</a>

                            </li>

                            <li>

                                <a href="?page=php_info"><i class="fa fa-info-circle fa-fw"></i> PHP Info</a>

                            </li>

                        </ul>

                        <!-- /.nav-second-level -->



                    </li>

                    <li>

                        <a href="?page=input"><i class="fa fa-gear fa-fw"></i>Pesan</a>

                    </li>

                </ul>
            </div>
        </div>
    </nav>

</div>

<div id="page-wrapper">

    <div class="row">

        <div class="col-lg-12">
            <?php
            if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {
                require_once "views/dashboard_superadmin.php";

            } elseif (@$_GET['page'] == 'data_permohonan') {
                require_once "views/data_permohonan.php";

            } elseif (@$_GET['page'] == 'penerima_sampel') {
                require_once "views/penerima_sampel.php";

            } elseif (@$_GET['page'] == 'permintaan_kesiapan_pengujian') {
                require_once "views/permintaan_kesiapan_pengujian.php";

            } elseif (@$_GET['page'] == 'kesiapan_pengujian') {
                require_once "views/kesiapan_pengujian.php";

            } elseif (@$_GET['page'] == 'input_nama_tumbuhan') {
                require_once "database/views/input_database_nama_tumbuhan.php";

            } elseif (@$_GET['page'] == 'input_nama_patogen') {
                require_once "database/views/input_database_patogen.php";

            } elseif (@$_GET['page'] == 'tambah_nama_user') {
                require_once "database/views/tambah_nama_user.php";

            } elseif (@$_GET['page'] == 'respon_permohonan') {
                require_once "views/respon_permohonan_pengujian.php";

            } elseif (@$_GET['page'] == 'penyerahan_sampel') {
                require_once "views/penyerahan_sampel.php";

            } elseif (@$_GET['page'] == 'penyelia_analis') {
                require_once "views/penyelia_analis.php";

            } elseif (@$_GET['page'] == 'pengelola_sampel') {
                require_once "views/pengelola_sampel.php";

            } elseif (@$_GET['page'] == 'data_teknis') {
                require_once "views/data_teknis.php";

            } elseif (@$_GET['page'] == 'sertifikat') {
                require_once "views/sertifikat.php";

            } elseif (@$_GET['page'] == 'surat_hasil_uji') {
                require_once "views/surat_hasil_uji.php";

            } elseif (@$_GET['page'] == 'input') {
                require_once "views/pesan.php";

            } elseif (@$_GET['page'] == 'lihat_data_permohonan') {
                require_once 'views/lihat_data_permohonan.php';

            } elseif (@$_GET['page'] == 'fungsional') {
                require_once 'views/fungsional/fungsional.php';

            } elseif (@$_GET['page'] == 'penyemaian_benih') {
                require_once 'views/fungsional/penyemaian_benih.php';

            } elseif (@$_GET['page'] == 'persiapan_alat') {
                require_once 'views/fungsional/persiapan_alat.php';

            } elseif (@$_GET['page'] == 'penanganan_spesimen') {
                require_once 'views/fungsional/penanganan_spesimen.php';

            } elseif (@$_GET['page'] == 'preparat') {
                require_once 'views/fungsional/preparat.php';

            } elseif (@$_GET['page'] === 'backup_db') {
                require_once "../assets/binfile/backup_eksport_database.php";

            } elseif (@$_GET['page'] === 'restore_db') {
                require_once "../assets/binfile/backup_import_database.php";

            } elseif (@$_GET['page'] === 'delete_db') {
                require_once "../assets/binfile/delete_tables.php";

            } elseif (@$_GET['page'] === 'php_info') {
                echo '<div style="margin-top: 50px"></div>';

                echo phpinfo();

            }

            ?>

        </div>
    </div>
</div>
<?php require_once 'templates/footer.php';?>
</body>
</html>