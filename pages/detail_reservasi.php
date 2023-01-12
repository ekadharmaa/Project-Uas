
<?php 
require_once('config/config.php');

                $connection= new Connection();
                $conn=$connection->getConnection();


$id=$_GET['id'];
    $query3 = $conn->prepare("SELECT * FROM reservasi LEFT JOIN tamu ON reservasi.id_tamu=tamu.id_tamu WHERE no_reservasi='$id'");
    $query3->execute();
    $data = $query3->fetch(PDO::FETCH_ASSOC);

?>
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
                                                            <input type="text" name="nores" class="form-control" readonly="readonly" value="<?php echo $data['no_reservasi'] ; ?>" required>
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
                                                            <input type="text" name="dari" class="form-control" value="<?php echo $data['tgl_checkin'] ; ?>" readonly>
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
                                                            <input type="text" name="sampai" class="form-control" value="<?php echo $data['tgl_checkout'] ; ?>" readonly>
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
                                                            <input type="text" name="lama" class="form-control" value="<?php echo $data['jumlah_hari'] ; ?>" readonly>
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
                                                            <input type="text" name="tamu" class="form-control" value="<?php echo $data['id_tamu'].' - '.$data['nama_tamu'] ; ?>" readonly>
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
                                                $query = $conn->prepare("SELECT * FROM detail_reservasi LEFT JOIN kamar ON detail_reservasi.no_kamar=kamar.no_kamar WHERE no_reservasi='$id'");
                                                $query->execute();
                                                $no=0;
                                                while($data2 = $query->fetch(PDO::FETCH_ASSOC)) {
                                                $no++;
                                                $jb=$data2['harga']*$data['jumlah_hari'];


                                                echo "<tr><td>$no</td><td>$data2[no_kamar]</td><td>$data2[kelas]</td><td>".number_format($data2['harga'])." x $data[jumlah_hari]</td><td>Rp.".number_format($jb)."</td></tr>";
                                                }

                                            ?>
                                            <tr>
                                            <td colspan="4" align="right"><strong>Total Harga</strong></td>
                                            <td><Strong>Rp.<?php echo number_format($data['jumlah_bayar']) ; ?></Strong><input type="hidden" value="<?php echo $total ; ?>" name="total"> <input type="hidden" name="kamar" value="<?php echo $kmr ; ?>" ></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <a class="btn btn-primary" href="?p=data_reservasi" role="button">Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div>