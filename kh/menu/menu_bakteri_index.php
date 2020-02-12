<div class="navbar-default navbar-static-side" role="navigation" id="side">

    <div class="sidebar-collapse">

        <ul class="nav" id="side-menu">

            <li>

                <a href="?lab=bakteri&page=dashboard"><i class="fa fa-home fa-fw"></i> Dashboard</a>

            </li>

            <li>

                <a href="?lab=bakteri&page=data_permohonan"><i class="fa fa-table fa-fw"></i> Data Permohonan</a>

            </li>

            <li>

                <a href="#"><i class="fa fa-tasks fa-fw"></i> Manajer Administrasi<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="?lab=bakteri&page=penerima_sampel"><i class="fa fa-user fa-fw"></i>Penerima Sampel</a>

                    </li>

                    <li>

                        <a href="?lab=bakteri&page=penyerahan_sampel"><i class="fa fa-leaf fa-fw"></i>Penyerahan Sampel </a>

                    </li>

                    <li>

                        <a href="?lab=bakteri&page=permintaan_kesiapan_pengujian"><i class="fa fa-dashboard fa-fw"></i>Permintaan Kesiapan</a>

                    </li>

                    <li>

                        <a href="?lab=bakteri&page=respon_permohonan"><i class="fa fa-file-text-o fa-fw"></i>Respon Permohonan </a>

                    </li>

                </ul>

                <!-- /.nav-second-level -->

            </li>

        </ul>

        <!-- /#side-menu -->



    </div>

    <!-- /.sidebar-collapse -->

</div>

<!-- /.navbar-static-side -->

</nav>

</div>



<div id="page-wrapper">

<div class="row">

<div class="col-lg-12">

    <?php

    if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {

        require_once "lab_bakteri/views/dashboard.php";

    } elseif (@$_GET['page'] == 'data_permohonan' && $_GET['lab'] == 'bakteri') {

        require_once "lab_bakteri/views/data_permohonan_kh.php";

    } elseif (@$_GET['page'] == 'penerima_sampel' && $_GET['lab'] == 'bakteri') {

        require_once "lab_bakteri/views/penerima_sampel.php";

    } elseif (@$_GET['page'] == 'permintaan_kesiapan_pengujian' && $_GET['lab'] == 'bakteri') {

        require_once "lab_bakteri/views/permintaan_kesiapan_pengujian_kh.php";

    } elseif (@$_GET['page'] == 'respon_permohonan' && $_GET['lab'] == 'bakteri') {

        require_once "lab_bakteri/views/respon_permohonan_pengujian_kh.php";

    } elseif (@$_GET['page'] == 'penyerahan_sampel' && $_GET['lab'] == 'bakteri') {

        require_once "lab_bakteri/views/penyerahan_sampel_kh.php";

    } elseif (@$_GET['page'] == 'lihat_data_permohonan') {

        require_once 'lab_bakteri/views/lihat_data_permohonan.php';

    }

    ?>



</div>

</div>

</div>