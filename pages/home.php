<?php
require_once('config/config.php');

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
    <!-- Custom CSS -->
    <link href="assets/css/style.min.css" rel="stylesheet">
</head>
<body>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome <?php echo $hasil78['nama_admin'] ; ?> 😊 </h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="?p=home">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                </div>

    <div class="container-fluid">
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium"><?php echo number_format($tamu) ; ?></h2>
                         </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Tamu</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium"><?php echo number_format($kamar) ; ?></h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kamar</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i class="fas fa-bed"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo number_format($admin) ; ?></h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Karyawan</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i class=" icon-people"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                class="set-doller">Rp.</sup><?php echo number_format($rev*01) ; ?> </h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Pembayaran
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Status Kamar Saat Ini</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">No. Kamar</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Kelas</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Harga</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Status</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $sqlget=$conn->prepare("SELECT * FROM kamar");
                                        $sqlget->execute();
                                        $no=0;

                                        while($data=$sqlget->fetch(PDO::FETCH_ASSOC)){
                                            $dr=date('d M Y', strtotime($data['dari']));
                                            $sm=date('d M Y', strtotime($data['sampai']));
                                            if($data['status_kamar']=="Kosong"){
                                                $cl="btn btn-rounded btn-success";

                                                $ket ="-";
                                            }
                                            else {
                                                $cl="btn btn-rounded btn-danger";

                                                $ket = $dr." s/d ".$sm;

                                            }


                                            echo "<tr>
                                                <td>$data[no_kamar]</td>
                                                <td>$data[kelas]</td>
                                                <td>".number_format($data['harga'])."</td>
                                                <td><span class='$cl'>$data[status_kamar]</span></td>
                                                <td>$ket</span></td>
                                            </tr>";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



</body>
</html>
