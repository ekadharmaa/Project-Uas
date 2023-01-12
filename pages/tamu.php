
<?php 
require_once('config/config.php');

                $connection= new Connection();
                $conn=$connection->getConnection();

$pencarianSQL	= "";
# PENCARIAN DATA 
if(isset($_POST['btnCari'])) {
	$txtKataKunci	= trim($_POST['txtKataKunci']);

	// Menyusun sub query pencarian
	$pencarianSQL	= "WHERE id_tamu='$txtKataKunci' OR no_identitas='$txtKataKunci' OR nama_tamu LIKE '%$txtKataKunci%' ";
}

# Teks pada form
$dataKataKunci = isset($_POST['txtKataKunci']) ? $_POST['txtKataKunci'] : '';



				$baris	= 50;
				$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
				$sql2 = $conn->query("SELECT * FROM tamu $pencarianSQL ");
				$total = $sql2->rowCount();
				$maks	= ceil($total/$baris);
				$mulai	= $baris * ($hal-1); 
?>

				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-1">
                                    <h4 class="card-title">Form Tamu</h4>
                                </div>
                                    <a href="?p=tambah_tamu"><button class="btn btn-info">Tambah Tamu</button></a>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">ID Tamu</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Nama Lengkap</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">No Identitas</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Tanggal Lahir</th>
												<th class="border-0 font-14 font-weight-medium text-muted">Jenis Kelamin</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Alamat</th>
												<th class="border-0 font-14 font-weight-medium text-muted">No Hp</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Aksi</th>
                                            </tr>
                                        </thead>
										<?php $sqlget=$conn->prepare("SELECT * FROM tamu  $pencarianSQL ORDER BY id_tamu DESC LIMIT $mulai,$baris");
				$sqlget->execute();
				$no=0;

				while($data=$sqlget->fetch(PDO::FETCH_ASSOC)){
					$id=$data['no_identitas'];
					$no++;
	
				
				?>
										
											<tr>
												<td><a href="#"><?php echo $data['id_tamu'] ; ?></a></td>
												<td><?php echo $data['nama_tamu'] ; ?></td>
												<td><?php echo $data['no_identitas'] ; ?></td>
												<td><?php echo $data['tanggal_lahir'] ; ?></td>
												<td><?php echo $data['jk'] ; ?></td>
												<td><?php echo $data['alamat'] ; ?></td>
												<td><?php echo $data['nomer_hp'] ; ?></td>
												<td>
													<a href="?p=edit_tamu&&id=<?php echo $data['id_tamu'] ; ?>"><button class='btn btn-warning'>Edit</button></a>
													<a href="?p=hapus_tamu&&id=<?php echo $data['id_tamu'] ; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')"><button class='btn btn-danger'>Hapus</button></a>
												</td>
											</tr>

											<?php } ?>
											</tbody>
                                    </table>
                                </div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6">Total Data : <?php echo $total ; ?> | Pages ( <?php for($h=1;$h<=$maks;$h++){
										echo "<a href=?p=tamu&hal=$h>$h</a> ";
										
									} ?> )
                            </div>
                        </div>
                    </div>
                </div>
			</div>

			