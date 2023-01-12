
<?php 
require_once('config/config.php');

                $connection= new Connection();
                $conn=$connection->getConnection();

$pencarianSQL	= "";
# PENCARIAN DATA 
if(isset($_POST['btnCari'])) {
	$txtKataKunci	= trim($_POST['txtKataKunci']);

	// Menyusun sub query pencarian
	$pencarianSQL	= "WHERE no_kamar LIKE '%$txtKataKunci%' ";
}

# Teks pada form
$dataKataKunci = isset($_POST['txtKataKunci']) ? $_POST['txtKataKunci'] : '';



				$baris	= 50;
				$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
				$sql2 = $conn->query("SELECT * FROM kamar $pencarianSQL ");
				$total = $sql2->rowCount();
				$maks	= ceil($total/$baris);
				$mulai	= $baris * ($hal-1); 
?>
				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-1">
                                    <h4 class="card-title">Form Kamar</h4>
                                </div>
                                    <a href="?p=tambah_kamar"><button class="btn btn-info">Tambah Kamar</button></a>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">No Kamar</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Kelas</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Harga</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Aksi</th>
                                            </tr>
                                        </thead>
										<?php $sqlget=$conn->prepare("SELECT * FROM kamar  $pencarianSQL ORDER BY no_kamar DESC LIMIT $mulai,$baris");
				$sqlget->execute();
				$no=0;

				while($data=$sqlget->fetch(PDO::FETCH_ASSOC)){
					$id=$data['no_kamar'];
					$no++;
	
				
				?>
										
											<tr>
												<td><a href="#"><?php echo $data['no_kamar'] ; ?></a></td>
												<td><?php echo $data['kelas'] ; ?></td>
												<td>Rp.<?php echo number_format($data['harga']) ; ?></td>
												<td>
													<a href="?p=edit_kamar&&id=<?php echo $data['no_kamar'] ; ?>"><button class='btn btn-warning'>Edit</button></a>
													<a href="?p=hapus_kamar&&id=<?php echo $data['no_kamar'] ; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')"><button class='btn btn-danger'>Hapus</button></a>
												</td>
											</tr>

											<?php } ?>
											</tbody>
                                    </table>
                                </div>
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