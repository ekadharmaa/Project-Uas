<?php

require_once("config/config.php");

require_once("config/function.php");
date_default_timezone_set("Asia/Jakarta");
$connection=new Connection() ;
$conn=$connection->getConnection();



if(isset($_POST['simpan'])){
$nores=$_POST['nores'];
$dar=$_POST['dari']. " 14:00:00";
$sam=$_POST['sampai']." 12:00:00";
$lam=$_POST['lama'];
$tamu=$_POST['tamu'];
$total=$_POST['total'];
$kmr=$_POST['kamar'];
$now=date('Y-m-d H:i:s');


 $sql="INSERT INTO reservasi VALUES ('$nores','$now','$dar','$sam','$tamu','$lam','$kmr','$total','Booked')" ;
 $conn->exec($sql);

$query7 = $conn->prepare("SELECT * FROM tmp_reservasi");
    $query7->execute();
    while($data7 = $query7->fetch(PDO::FETCH_ASSOC)) {

 $sql11="INSERT INTO detail_reservasi VALUES ('','$nores','$data7[no_kamar]','$data7[jumlah_harga]')" ;
 $conn->exec($sql11);

  echo "<script>alert(\"Databerhasil disimpan !\") ; window.location.href='?p=data_reservasi' ;</script>";



    }




 
}
  



$dari=$_GET['dari'];
$sampai=$_GET['sampai'];
$lama=$_GET['lama'];

//Kode buat tamu
$tgl=date('Ymd');

    $query1 = $conn->prepare("SELECT MAX(no_reservasi) as maxID FROM reservasi WHERE no_reservasi LIKE '$tgl%'");
    $query1->execute();
    $idMax = $query1->fetch(PDO::FETCH_COLUMN);

    $idm1 = (int) substr($idMax, 8, 4);



      $idm1++;
      $NoUrut=$idm1;

   //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
    $NewID = "$tgl" .sprintf('%04s', $NoUrut);

?>

<style>
#frmCheckUsername {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}

.dropdown-menu a {
    text-decoration: none;
    display: block;
    text-align: left;
}
#nou {
    text-decoration: none;

</style>

<script>
function checkAvailability() {  
    jQuery.ajax({
    url: "cek_available3.php",
    data:'noid='+$("#noid").val(),
    type: "POST",
    success:function(data){
        $("#user-availability-status").html(data);
    },
    error:function (){}
    });
}
</script>
<div class="container-fluid">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detail Reservasi</h4>
                                <form method="post" action="<?php $_SERVER['PHP_SELF'] ; ?>" onSubmit="return confirm('Anda yakin akan menyimpan data ?')">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-2">No Reservasi</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <input type="text" name="nores"  class="form-control"  readonly="readonly" value="<?php echo $NewID ; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Dari Tanggal</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <input type="date" name="dari" class="form-control" value="<?php echo $dari ; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Sampai Tanggal</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="date" name="sampai" class="form-control" value="<?php echo $sampai ; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Lama (Malam)</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                        <input type="text" name="lama" class="form-control" value="<?php echo $lama ; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-md-2">Tamu</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <select name="tamu" class="form-control" required="">
                                                        <option value="">Pilih Tamu</option>
                                                        <?php 
                                                        $sql9=$conn->prepare("SELECT * FROM tamu ORDER BY id_tamu DESC");
                                                        $sql9->execute();

                                                        while($tamu=$sql9->fetch(PDO::FETCH_ASSOC)){
                                                            echo "<option value='$tamu[id_tamu]'>$tamu[id_tamu] - $tamu[nama_tamu]</option>";
                                                        }


                                                        ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                            <label class="col-md-2">Detail Kamar :</label>
                                    </div>
                                    <div class="form-group row">
                                    <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">No</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">No Kamar</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Kelas</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Harga</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Jumlah Harga</th>
                                            </tr>
                                            <?php

                                            $query2 = $conn->prepare("SELECT SUM(jumlah_harga) FROM tmp_reservasi");
                                            $query2->execute(); 
                                            $total = $query2->fetch(PDO::FETCH_COLUMN) ;


                                            $query3 = $conn->prepare("SELECT COUNT(*) FROM tmp_reservasi");
                                            $query3->execute(); 
                                            $kmr = $query3->fetch(PDO::FETCH_COLUMN) ;


                                            $query = $conn->prepare("SELECT * FROM tmp_reservasi");
                                            $query->execute();
                                            $no=0;
                                            while($data = $query->fetch(PDO::FETCH_ASSOC)) {
                                            $no++;


                                            echo "<tr><td>$no</td><td>$data[no_kamar]</td><td>$data[kelas]</td><td>".number_format($data['harga'])." x $lama</td><td>".number_format($data['jumlah_harga'])."</td></tr>";
                                            }

                                        ?>
                                            <tr>
                                            <td colspan="4" align="right"><strong>Total Harga</strong></td>
                                            <td><?php echo number_format($total) ; ?><input type="hidden" value="<?php echo $total ; ?>" name="total"> <input type="hidden" name="kamar" value="<?php echo $kmr ; ?>" ></td>
                                            </tr>
                                            <tr>
                                            <td colspan="4" align="right"></td>
                                            <td><button type="submit" class="btn btn-success" name="simpan">Bayar</button></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div>