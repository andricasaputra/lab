<div class="navbar-default navbar-static-side" role="navigation" id="side">

    <div class="sidebar-collapse">

        <ul class="nav" id="side-menu">

            <li>

                <a href="?lab=parasit&page=dashboard"><i class="fa fa-home fa-fw"></i> Dashboard</a>

            </li>

            <li>

                <a href="?lab=parasit&page=data_permohonan"><i class="fa fa-table fa-fw"></i> Data Permohonan</a>

            </li>

            <li>

                <a href="?lab=parasit&page=surat_hasil_uji"><i class="fa fa-check-square fa-fw" ></i>Terbitkan Surat Hasil Uji</a>

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

    if (@$_GET['page'] == 'dashboard' && @$_GET['lab'] == 'parasit') {

        require_once "lab_parasit/views/dashboard_lhu.php";

    } elseif (@$_GET['page'] == 'data_permohonan' && $_GET['lab'] == 'parasit') {

        require_once "lab_parasit/views/data_permohonan_kh.php";

    } elseif (@$_GET['page'] == 'surat_hasil_uji' && $_GET['lab'] == 'parasit') {

        require_once "lab_parasit/views/surat_hasil_uji.php";

    } elseif (@$_GET['page'] == 'lihat_data_permohonan') {

        require_once 'lab_parasit/views/lihat_data_permohonan.php';

    }

    ?>

</div>

</div>

</div>