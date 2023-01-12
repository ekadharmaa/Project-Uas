<?php
require_once('config/config.php');

session_start();
date_default_timezone_set("Asia/Jakarta");
 if (empty($_SESSION['username'])) {
 header("location:login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {

    $connection= new Connection();
    $conn=$connection->getConnection();
    $sql78=$conn->prepare("SELECT * FROM admin WHERE username='$_SESSION[username]'");
    $sql78->execute();
    $hasil78=$sql78->fetch(PDO::FETCH_ASSOC);
    $sql2=$conn->query("SELECT COUNT(*) FROM tamu");
    $tamu=$sql2->fetchColumn();
    $sql3=$conn->query("SELECT COUNT(*) FROM kamar");
    $kamar=$sql3->fetchColumn();
    $sql4=$conn->query("SELECT SUM(jumlah_bayar) FROM reservasi");
    $rev=$sql4->fetchColumn();
    $sql5=$conn->query("SELECT COUNT(*) FROM admin");
    $admin=$sql5->fetchColumn();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/libs/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/hm.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/images/hm.png">
    <!-- Custom CSS -->
    <link href="assets/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.0.0/animate.min.css">
</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
                <nav class="navbar top-navbar navbar-expand-md">
                    <div class="navbar-header" data-logobg="skin6">
                        <!-- This is for the sidebar toggle which is visible on mobile only -->
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                                class="ti-menu ti-close"></i></a>
                        <!-- ============================================================== -->
                        <!-- Logo -->
                        <!-- ============================================================== -->
                        <div class="navbar-brand">
                            <!-- Logo icon -->
                            <a href="?p=home">
                                <b class="logo-icon">
                                    <!-- Dark Logo icon -->
                                    <img src="assets/images/hm.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo icon -->
                                    <img src="assets/images/hm.png" alt="homepage" class="light-logo" />
                                </b>
                                <!--End Logo icon -->
                                <!-- Logo text -->
                                <span class="logo-text">
                                    <!-- dark Logo text -->
                                    <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                    <!-- Light Logo text -->
                                    <img src="assets/images/logo-text.png" class="light-logo" alt="homepage" />
                                </span>
                            </a>
                        </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1"></ul>
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="ml-2 d-none d-lg-inline-block"><span></span> <span
                                        class="text-dark"></span> <?php echo $hasil78['nama_admin'] ; ?> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i> My Profile </a>
                            </div>
                        </li>
                    </ul>
                </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="?p=home"
                                    aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                        class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Master Data</span></li>
                        <!-- Form Start -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Forms </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="?p=tamu" class="sidebar-link"><span
                                            class="hide-menu"> Form Tamu
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="?p=kamar" class="sidebar-link"><span
                                            class="hide-menu"> Form Kamar
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <!-- Form End -->
                        <!-- Reservasi Start -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="icon-wallet"></i><span
                                    class="hide-menu">Transaksi </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="?p=trx_reservasi7" class="sidebar-link"><span
                                            class="hide-menu"> Reservasi
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="?p=data_reservasi" class="sidebar-link"><span
                                            class="hide-menu"> Lihat Reservasi
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <!-- Reservasi End -->
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Master Karyawan</span></li>
                        <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="?p=data_karyawan"
                                aria-expanded="false"><i class="icon-user"></i><span
                                    class="hide-menu">Data Karyawan
                                </span></a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Master Laporan</span></li>
                        <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="?p=laporan"
                                aria-expanded="false"><i class="icon-printer"></i><span
                                    class="hide-menu">Data Laporan
                                </span></a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="?p=about"
                                aria-expanded="false"><i class="icon-info"></i><span
                                    class="hide-menu">About
                                </span></a> 
                        <li class="sidebar-item"><a class="sidebar-link sidebar-link" href="logout.php"
                                aria-expanded="false"><i class="icon-power"></i><span
                                    class="hide-menu">Log Out
                                </span></a> 
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- <div class="main"> -->
			<!-- MAIN CONTENT -->
			    <?php include ('isi.php') ; ?>
			<!-- END MAIN CONTENT -->
		    <!-- </div> -->
                <!-- Container fluid  -->
            <!-- ============================================================== -->
            
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center text-muted">
                All Rights Reserved by Kelompok 1. Designed and Developed by <a
                    href="https://resume-ekadharmaa.vercel.app/" target="_blank">ekadharma</a>.
                </footer> 
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
        </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            

    </div>


    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/extra-libs/c3/c3.min.js"></script>
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php } ?>