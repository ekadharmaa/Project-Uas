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
                                    <h4 class="card-title">Data Karyawan</h4>
                                </div>
                                    <a href="?p=tambah_karyawan"><button class="btn btn-info">Tambah Karyawan</button></a>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">Username</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Nama</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">No Hp</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Tanggal Lahir</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Alamat</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted" align="center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $sqlget=$conn->prepare("SELECT * FROM admin");
                                        $sqlget->execute();
                                        $no=0;

                                        while($data=$sqlget->fetch(PDO::FETCH_ASSOC)){
                                            $id=$data['username'];
					                        $no++;

                                            echo "<tr>
												<td>$data[username]</td>
												<td>$data[nama_admin]</td>
                                                <td>$data[nohp]</td>
                                                <td>$data[tanggal_lahir]</td>
                                                <td>$data[alamat]</td>
                                                <td>
                                                <a href='?p=edit_karyawan&&id=$data[username]'><button class='btn btn-warning'>Edit</button></a>
                                                <a href='?p=hapus_karyawan&&id=$data[username]' onClick='return confirm('Anda yakin akan menghapus data ini?')'><button class='btn btn-danger'>Hapus</button></a>
                                                </td>
											</tr>";
                                        ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="panel-footer">
									<div class="row">
										<div class="col-md-6">Total Data : <?php echo $total ; ?> | Pages ( <?php for($h=1;$h<=$maks;$h++){
                                    echo "<a href=?p=data_karyawan&hal=$h>$h</a> ";
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
