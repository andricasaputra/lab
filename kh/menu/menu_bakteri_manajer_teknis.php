<div class="navbar-default navbar-static-side" role="navigation" id="side">

    <div class="sidebar-collapse">

        <ul class="nav" id="side-menu">

            <li>

                <a href="?lab=bakteri&page=dashboard"><i class="fa fa-home fa-fw"></i> Dashboard</a>

            </li>

            <li class="activE"><a><i class="fa fa-tasks fa-fw"></i> Manajer Teknis</a></li>

            <ul class="nav ">

                <li>

                    <a href="?lab=bakteri&page=kesiapan_pengujian"><i class="fa fa-dashboard fa-fw"></i>Kesiapan Pengujian</a>

                </li>

                <li>

                    <a href="?lab=bakteri&page=penyelia_analis"><i class="fa fa-pencil fa-fw"></i>Penunjukan Petugas</a>

                </li>

                <li>

                    <a href="?lab=bakteri&page=pengelola_sampel"><i class="fa fa-user fa-fw"></i>Pengelola Sampel</a>

                </li>

                <!-- /.nav-second-level -->

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

            require_once "lab_bakteri/views/dashboard_mt.php";

        } elseif (@$_GET['page'] == 'kesiapan_pengujian' && $_GET['lab'] == 'bakteri') {

            require_once "lab_bakteri/views/kesiapan_pengujian.php";

        } elseif (@$_GET['page'] == 'penyelia_analis' && $_GET['lab'] == 'bakteri') {

            require_once "lab_bakteri/views/penyelia_analis.php";

        } elseif (@$_GET['page'] == 'pengelola_sampel' && $_GET['lab'] == 'bakteri') {

            require_once "lab_bakteri/views/pengelola_sampel.php";

        } elseif (@$_GET['page'] == 'lihat_data_permohonan') {

            require_once 'lab_bakteri/views/lihat_data_permohonan.php';

        }

        ?>



    </div>

</div>

</div>