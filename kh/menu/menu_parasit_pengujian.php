<div class="navbar-default navbar-static-side" role="navigation" id="side">

    <div class="sidebar-collapse">

        <ul class="nav" id="side-menu">

            <li>

                <a href="?lab=parasit&page=dashboard"><i class="fa fa-home fa-fw"></i> Dashboard</a>

            </li>



            <li class="activE">

                <a><i class="fa fa-flask fa-fw" ></i>Pengujian</a>

            </li>

            <ul class="nav">

                <li>

                    <a href="?lab=parasit&page=data_teknis"><i class="fa fa-file-text fa-fw" ></i>Data Teknis</a>

                </li>

                <li>

                    <a href="?lab=parasit&page=sertifikat"><i class="fa fa-check-square fa-fw" ></i>Hasil Pengujian</a>

                </li>

            </ul>

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

    if (@$_GET['page'] == 'dashboard' && @$_GET['lab'] == 'parasit') {

        require_once "lab_parasit/views/dashboard_penguji.php";

    } elseif (@$_GET['page'] == 'penyelia_analis' && $_GET['lab'] == 'parasit') {

        require_once "lab_parasit/views/penyelia_analis.php";

    } elseif (@$_GET['page'] == 'data_teknis' && $_GET['lab'] == 'parasit') {

        require_once "lab_parasit/views/data_teknis.php";

    } elseif (@$_GET['page'] == 'sertifikat' && $_GET['lab'] == 'parasit') {

        require_once "lab_parasit/views/sertifikat.php";

    } elseif (@$_GET['page'] == 'lihat_data_permohonan') {

        require_once 'lab_parasit/views/lihat_data_permohonan.php';

    }

    ?>



</div>

</div>

</div>