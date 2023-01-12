
<?php 
require_once('../config/config.php');
require_once('../config/function.php');

                $connection= new Connection();
                $conn=$connection->getConnection();



?>
<!DOCTYPE html>
<html>
<head>
<title>Cetak Laporan</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../assets_login/bs/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
  @media print {
tr.vendorListHeading {
    background-color: #1a4567 !important;
    -webkit-print-color-adjust: exact; 
}}

@media print {
    .vendorListHeading th {
    color: white !important;
}}
</style>
</head>
<body>
<?php
if(isset($_POST['btntanggal'])){

  $dr=$_POST['dari'];
  $sp=$_POST['sampai'];
  $dari=$dr." 00:00:00";
  $sampai=$sp." 23:59:59";




        $sqlgetin4=$conn->prepare("SELECT COUNT(*) FROM reservasi WHERE tgl_reservasi BETWEEN '$dari' AND '$sampai'");
      $sqlgetin4->execute();
        $ju=$sqlgetin4->fetch(PDO::FETCH_COLUMN)+0;

        $sqlgetin77=$conn->prepare("SELECT SUM(jumlah_bayar) FROM reservasi WHERE tgl_reservasi BETWEEN '$dari' AND '$sampai'");
      $sqlgetin77->execute();
        $jt=$sqlgetin77->fetch(PDO::FETCH_COLUMN)+0;



  ?>



<div class="container">


					<div class="row">
						<div class="col-md-12 text-center">
							<!-- RECENT PURCHASES -->

										<strong style="font-size:20px"> LAPORAN DATA TAMU <br>  XOXO HOTEL</strong><br>
                   
                      </div>
                      <div class="col-sm-5">
                      <br><br>

                      <table class="table table-bordered">
                      <tr>
                      <td><strong>Priode </strong></td>
                      <td><?php echo  date('d M Y', strtotime($dari))." s/d ".date('d M Y', strtotime($sampai)) ; ?></td>
                      </tr>
                      <tr>
                      <td><strong>Jumlah Tamu</strong> </td>
                      <td><?php echo number_format($ju) ; ?> Tamu</td>
                      </tr>
                      

                      </table>
                      </div>
                      </div>
                      <div class="row">

                          
                              <div class="col-sm-12">
                                 <table class="table table-bordered">
                                 <tr align="center">
                                 <td><strong>No</strong></td>
                                 <td><strong>Tanggal Reservasi</strong></td>
                                 <td><strong>No Reservasi</strong></td>
                                 <td><strong>Nama Tamu</strong></td>
                                 <td><strong>Checkin</strong></td>
                                 <td><strong>Checkout</strong></td>
                                 <td><strong>Jumlah Bayar</strong></td>
                                 </tr>

                                 <?php


    $query = $conn->prepare("SELECT * FROM reservasi LEFT JOIN tamu ON reservasi.id_tamu=tamu.id_tamu");
    $query->execute();
    $no=0;
    while($data2 = $query->fetch(PDO::FETCH_ASSOC)) {
      $no++;
      $jb=$data2['jumlah_bayar'];
      $tr=date('d-m-Y', strtotime($data2['tgl_reservasi']));
      $ti=date('d-m-Y', strtotime($data2['tgl_checkin']));
      $to=date('d-m-Y', strtotime($data2['tgl_checkout']));


      echo "<tr align='center'><td>$no</td><td>$tr</td><td>$data2[no_reservasi]</td><td>$data2[nama_tamu]</td><td>$ti</td><td>$to</td><td>Rp.".number_format($jb)."</td></tr>";
    }

?>
<tr>
<td colspan="6" align="center"><strong>Total </strong></td>
<td align="center"><Strong>Rp.<?php echo number_format($jt) ; ?></Strong></td>
</tr>


                                 </table>
                                 <div class="text-right">
                                 Mengetahui,<br><br><br>
                                 (<u>Kelompok 1</u>)
                                 </div>
								</div>
                </div>
                </div>
                <script type="text/javascript">
                  window.print();
                </script>

                <?php }
if(isset($_POST['btnbulan'])){

  $bln=$_POST['bulan'];
  $tahun=$_POST['tahun'];
  $priode=$tahun."-".$bln."-";
  $nb=namabulan($bln);





        $sqlgetin4=$conn->prepare("SELECT COUNT(*) FROM reservasi WHERE tgl_reservasi LIKE '%$priode%'");
      $sqlgetin4->execute();
        $ju=$sqlgetin4->fetch(PDO::FETCH_COLUMN)+0;

        $sqlgetin77=$conn->prepare("SELECT SUM(jumlah_bayar) FROM reservasi WHERE tgl_reservasi LIKE '%$priode%'");
      $sqlgetin77->execute();
        $jt=$sqlgetin77->fetch(PDO::FETCH_COLUMN)+0;



  ?>



<div class="container">


          <div class="row">
            <div class="col-md-12 text-center">
              <!-- RECENT PURCHASES -->

                    <strong style="font-size:20px"> LAPORAN DATA TAMU <br>  XOXO HOTEL</strong><br>
                   
                      </div>
                      <div class="col-sm-5">
                      <br><br>

                      <table class="table table-bordered">
                      <tr>
                      <td><strong>Priode </strong></td>
                      <td><?php echo $nb." ".$tahun ; ?></td>
                      </tr>
                      <tr>
                      <td><strong>Jumlah Tamu</strong> </td>
                      <td><?php echo number_format($ju) ; ?> Tamu</td>
                      </tr>
                      

                      </table>
                      </div>
                      </div>
                      <div class="row">

                          
                              <div class="col-sm-12">
                                 <table class="table table-bordered">
                                 <tr align="center">
                                 <td><strong>No</strong></td>
                                 <td><strong>Tanggal Reservasi</strong></td>
                                 <td><strong>No Reservasi</strong></td>
                                 <td><strong>Nama Tamu</strong></td>
                                 <td><strong>Checkin</strong></td>
                                 <td><strong>Checkout</strong></td>
                                 <td><strong>Jumlah Bayar</strong></td>
                                 </tr>

                                 <?php


    $query = $conn->prepare("SELECT * FROM reservasi LEFT JOIN tamu ON reservasi.id_tamu=tamu.id_tamu");
    $query->execute();
    $no=0;
    while($data2 = $query->fetch(PDO::FETCH_ASSOC)) {
      $no++;
      $jb=$data2['jumlah_bayar'];
      $tr=date('d-m-Y', strtotime($data2['tgl_reservasi']));
      $ti=date('d-m-Y', strtotime($data2['tgl_checkin']));
      $to=date('d-m-Y', strtotime($data2['tgl_checkout']));


      echo "<tr align='center'><td>$no</td><td>$tr</td><td>$data2[no_reservasi]</td><td>$data2[nama_tamu]</td><td>$ti</td><td>$to</td><td>Rp.".number_format($jb)."</td></tr>";
    }

?>
<tr>
<td colspan="6" align="center"><strong>Total </strong></td>
<td align="center"><Strong>Rp.<?php echo number_format($jt) ; ?></Strong></td>
</tr>


                                 </table>
                                 <div class="text-right">
                                 Mengetahui,<br><br><br>
                                 (<u>Kelompok 1</u>)
                                 </div>
                </div>
                </div>
                </div>
                <script type="text/javascript">
                  window.print();
                </script>
                
                <?php }
                ?>
                </body>
                </html>