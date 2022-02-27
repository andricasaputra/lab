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

                <a href="?lab=bakteri&page=surat_hasil_uji"><i class="fa fa-check-square fa-fw" ></i>Terbitkan Surat Hasil Uji</a>

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

        require_once "lab_bakteri/views/dashboard_lhu.php";

    } elseif (@$_GET['page'] == 'data_permohonan' && $_GET['lab'] == 'bakteri') {

        require_once "lab_bakteri/views/data_permohonan_kh.php";

    } elseif (@$_GET['page'] == 'surat_hasil_uji' && $_GET['lab'] == 'bakteri') {

        require_once "lab_bakteri/views/surat_hasil_uji.php";

    } elseif (@$_GET['page'] == 'lihat_data_permohonan') {

        require_once 'lab_bakteri/views/lihat_data_permohonan.php';

    }

    ?>

</div>

</div>

</div>