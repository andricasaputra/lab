<div class="navbar-default navbar-static-side" role="navigation" id="side">

    <div class="sidebar-collapse">

        <ul class="nav" id="side-menu" >

            <li>

                <a href="?page=dashboard"><i class="fa fa-home fa-fw"></i> Dashboard</a>

            </li>

            <li>
                <a href="?lab=bakteri&page=data_permohonan"><i class="fa fa-table fa-fw"></i> Data Permohonan</a>

            </li>

            <li>
                <a href="#"><i class="fa fa-gear fa-fw"></i> Database<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="?page=input_nama_pelanggan"><i class="fa fa-sitemap fa-fw"></i> Nama Pelanggan</a>

                    </li>

                    <li>

                        <a href="?page=input_nama_hewan"><i class="fa fa-suitcase fa-fw"></i> Nama Sampel</a>

                    </li>

                    <li>

                        <a href="?page=input_nama_patogen_kh"><i class="fa fa-bug fa-fw"></i>Nama Target</a>

                    </li>

                    <li>

                        <a href="?page=tambah_nama_user_kh"><i class="fa fa-user fa-fw"></i>Nama Pejabat</a>

                    </li>
                    <li>

                        <a href="?page=tambah_jabatan"><i class="fa fa-user fa-fw"></i>Jabatan Lab</a>

                    </li>

                    <li>

                        <a href="?page=tambah_jabfung"><i class="fa fa-user fa-fw"></i>Jabatan Fungsional</a>

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

                <a href="?page=reparasi"><i class="fa fa-gear fa-fw"></i>Reparasi Database</a>

            </li>

        </ul>

        <!-- /#side-menu -->

    </div>


</div>

<!-- /.navbar-static-side -->

</nav>

</div>

<div id="page-wrapper">

<div class="row">

<div class="col-lg-12">

    <?php

    if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {

        require_once "lab_bakteri/views/dashboard_superadmin.php";

    } elseif (@$_GET['page'] == 'data_permohonan' && $_GET['lab'] == 'bakteri') {

        require_once "lab_bakteri/views/data_permohonan_kh.php";

    }  elseif (@$_GET['page'] == 'input_nama_hewan') {

        require_once "database/views/input_database_nama_hewan.php";

    } elseif (@$_GET['page'] == 'input_nama_pelanggan') {

        require_once "database/views/pelanggan_kh.php";

    } elseif (@$_GET['page'] == 'input_nama_patogen_kh') {

        require_once "database/views/input_database_patogen_kh.php";

    } elseif (@$_GET['page'] === 'tambah_nama_user_kh') {

        require_once "database/views/tambah_nama_user_kh.php";

    }  elseif (@$_GET['page'] == 'reparasi') {

        require_once "database/views/reparasi.php";

    } elseif (@$_GET['page'] === 'backup_db') {

        require_once "../assets/binfile/backup_eksport_database.php";

    } elseif (@$_GET['page'] === 'restore_db') {

        require_once "../assets/binfile/backup_import_database.php";

    } elseif (@$_GET['page'] === 'delete_db') {

        require_once "../assets/binfile/delete_tables.php";

    } elseif (@$_GET['page'] === 'php_info') {

        echo '<div style="margin-top: 50px"></div>';

        echo phpinfo();

    }  elseif (@$_GET['page'] === 'tambah_jabatan') {

        require_once "./database/views/tambah_jabatan.php";

    } elseif (@$_GET['page'] === 'tambah_jabfung') {

        require_once "./database/views/tambah_jabfung.php";

    } elseif (@$_GET['page'] == 'lihat_data_permohonan' && isset($_GET['lab']) == 'bakteri' || !isset($_GET['lab'])) {

        require_once 'lab_bakteri/views/lihat_data_permohonan.php';

    }

    ?>

</div>

</div>

</div>

