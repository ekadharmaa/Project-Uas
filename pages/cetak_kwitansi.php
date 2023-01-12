
<?php 
require_once('../config/config.php');

                $connection= new Connection();
                $conn=$connection->getConnection();


$id=$_GET['id'];
    $query3 = $conn->prepare("SELECT * FROM reservasi LEFT JOIN tamu ON reservasi.id_tamu=tamu.id_tamu WHERE no_reservasi='$id'");
    $query3->execute();
    $data = $query3->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<title>Cetak Kwitansi</title>

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
<div class="container">


					<div class="row">
						<div class="col-md-12 text-center">
							<!-- RECENT PURCHASES -->

										<strong style="font-size:20px"> <u>KWITANSI RESERVASI XOXO HOTEL</u></strong>
                      </div>
                      <div class="col-sm-5">
                      <br><br>

                      <table class="table table-bordered">
                      <tr>
                      <td>No.Reservasi </td>
                      <td><?php echo $data['no_reservasi'] ; ?></td>
                      </tr>
                      <tr>
                      <td>Tanggal Reserasi </td>
                      <td><?php echo date('d M Y', strtotime($data['tgl_reservasi'])) ; ?></td>
                      </tr>
                      <tr>
                      <td>Tanggal Checkin</td>
                      <td><?php echo date('d M Y', strtotime($data['tgl_checkin'])) ; ?></td>
                      </tr>
                      <tr>
                      <td>Tanggal Checkout </td>
                      <td><?php echo date('d M Y', strtotime($data['tgl_checkout'])) ; ?></td>
                      </tr>
                      <tr>
                      <td>Lama </td>
                      <td><?php echo $data['jumlah_hari'] ; ?> Malam</td>
                      </tr>
                      <tr>
                      <td>Jumlah Kamar </td>
                      <td><?php echo $data['jumlah_kamar'] ; ?> Kamar</td>
                      </tr>
                      <tr>
                      <td>Tamu </td>
                      <td><?php echo $data['id_tamu']." - ".$data['nama_tamu'] ; ?> </td>
                      </tr>

                      </table>
                      </div>
                      </div>
                      <div class="row">

                          
                              <div class="col-sm-12">
                              <strong>Detail Kamar :</strong>
                                 <table class="table table-bordered">
                                 <tr align="center">
                                 <td><strong>No</strong></td>
                                 <td><strong>No Kamar</strong></td>
                                 <td><strong>Kelas</strong></td>
                                 <td><strong>Harga</strong></td>
                                 <td><strong>Jumlah Harga</strong></td>
                                 </tr>

                                 <?php


    $query = $conn->prepare("SELECT * FROM detail_reservasi LEFT JOIN kamar ON detail_reservasi.no_kamar=kamar.no_kamar WHERE no_reservasi='$id'");
    $query->execute();
    $no=0;
    while($data2 = $query->fetch(PDO::FETCH_ASSOC)) {
      $no++;
      $jb=$data2['harga']*$data['jumlah_hari'];


      echo "<tr align='center'><td>$no</td><td>$data2[no_kamar]</td><td>$data2[kelas]</td><td>".number_format($data2['harga'])." x $data[jumlah_hari]</td><td>Rp.".number_format($jb)."</td></tr>";
    }

?>
<tr>
<td colspan="4" align="right"><strong>Total Harga</strong></td>
<td align="center"><Strong>Rp.<?php echo number_format($data['jumlah_bayar']) ; ?></Strong><input type="hidden" value="<?php echo $total ; ?>" name="total"> <input type="hidden" name="kamar" value="<?php echo $kmr ; ?>" ></td>
</tr>


                                 </table>
                                 <div class="text-right">
                                 Hormat Kami,<br><br><br>
                                 (<u>Kelompok 1</u>)
                                 </div>
								</div>
                </div>
                </div>
                <script type="text/javascript">
                  window.print();
                </script>
                </body>
                </html>