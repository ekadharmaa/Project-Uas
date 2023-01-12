<?php
require_once('config/config.php');


    $connection= new Connection();
    $conn=$connection->getConnection();
    $sql78=$conn->prepare("SELECT * FROM admin WHERE username='$_SESSION[username]'");
    $sql78->execute();
    $hasil78=$sql78->fetch(PDO::FETCH_ASSOC);

    $baris	= 50;
				$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
				$sql2 = $conn->query("SELECT * FROM admin");
				$total = $sql2->rowCount();
				$maks	= ceil($total/$baris);
				$mulai	= $baris * ($hal-1); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.min.css" rel="stylesheet">
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
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <!-- <li class="breadcrumb-item"><a href="index.php">Data Karyawan</a> -->
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    </div>
                </div>
                
                <!-- Container fluid  -->
                <!-- ============================================================== -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-1">
                                    <h4 class="card-title">Data Tamu</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">No Reservasi</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Tanggal Reservasi</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Tanggal Checkin</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Tanggal Checkout</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Tamu</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Pembayaran</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Status</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $sqlget=$conn->prepare("SELECT * FROM reservasi LEFT JOIN tamu ON reservasi.id_tamu=tamu.id_tamu ORDER BY no_reservasi DESC LIMIT $mulai,$baris");
				$sqlget->execute();
				$no=0;

				while($data=$sqlget->fetch(PDO::FETCH_ASSOC)){
					$id=$data['no_reservasi'];
					$no++;
					if($data['status']=="Booked"){
					$ci="";
					$co="disabled";}
					elseif ($data['status']=="Checkin") {

					$ci="disabled";
					$co="";
					}
					elseif ($data['status']=="Checkout") {

					$ci="disabled";
					$co="disabled";
					}
	
				
				?>
										
											<tr title="<?php echo $data['nama_tamu'] ; ?>">
												<td><a href="?p=detail_reservasi&&id=<?php echo $id ; ?>"><?php echo $id ; ?></a></td>
												<td><?php echo $data['tgl_reservasi'] ; ?></td><td><?php echo $data['tgl_checkin'] ; ?></td>
												<td><?php echo $data['tgl_checkout'] ; ?></td>
												<td><?php echo $data['id_tamu'] ; ?></td>
												<td>Rp.<?php echo number_format($data['jumlah_bayar']) ; ?></td>
												<td><?php echo $data['status'] ; ?></td>
												<td><div class='btn-group'>
						  <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
						    <span class="fa fa-cog"></span> &nbsp;<span class="fa fa-caret-down"></span>
						  </button>
						  <ul class="dropdown-menu dropdown-menu-right" role="menu" >
						    
						    <li><a href="?p=confirmin&&id=<?php echo $data['no_reservasi'] ; ?>" onClick="return confirm('Anda yakin akan mengkonfirmasi checkin?')" class="<?php echo $ci ; ?>">Konfirmasi Checkin</a></li>
						    <li><a href="?p=confirmout&&id=<?php echo $data['no_reservasi'] ; ?>" onClick="return confirm('Anda yakin akan mengkonfirmasi checkout?')" class="<?php echo $co ; ?>">Konfirmasi Checkout</a></li>
						    <li><a href="pages/cetak_kwitansi.php?id=<?php echo $data['no_reservasi'] ; ?>" target="_blank"">Cetak Kwitansi</a></li>
                            <li><a href="?p=hapus_reservasi&&id=<?php echo $data['no_reservasi'] ; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a></li>
						  </ul>
						</div></td>
											</tr>

											<?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="panel-footer">
									<div class="row">
										<div class="col-md-6">Total Data : <?php echo $total ; ?> | Pages ( <?php for($h=1;$h<=$maks;$h++){
                                    echo "<a href=?p=kamar&hal=$h>$h</a> ";
                                } ?> )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
                <!-- footer -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            



    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>
</html>
