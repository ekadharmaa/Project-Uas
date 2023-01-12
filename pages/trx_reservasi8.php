<?php
require_once('config/config.php');
$connection= new Connection();
$conn=$connection->getConnection();


$dari1=$_POST['dari'];
$sampai1=$_POST['sampai'];
$dari=strtotime($dari1);
$sampai=strtotime($sampai1);

$darifix=date('d-m-Y',$dari);
$sampaifix=date('d-m-Y',$sampai);


$ti= new DateTime($dari1);
$tepika= new DateTime($sampai1);


$jumlah_hari = $ti->diff($tepika);
$jmlh =$jumlah_hari->days;

?>

<script language="JavaScript">
function checkChoice(whichbox){
 with (whichbox.form){
  if (whichbox.checked == false)
   hiddentotal.value = eval(hiddentotal.value) - 1;
  else
   hiddentotal.value = eval(hiddentotal.value) + 1;
	 document.getElementById('update').innerHTML = hiddentotal.value;
   return(hiddentotal.value);
 }
}
</script>

<script type = "text/javascript">
function isChecked(checkbox, sub1) {
    var button = document.getElementById(sub1);
    var tot = myform.hiddentotal.value;

    if (tot==0) {
        button.disabled = "disabled";
    } else {
        button.disabled = "";
    }
}
</script>
<div class="container-fluid">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Detail Reservasi</h4>
                                <p class="text-center">
                                    Menampilkan data tanggal : </br>
                                    <strong><?php echo date('d-m-Y', strtotime($dari1))." s/d ".date('d-m-Y', strtotime($sampai1)) ; ?></strong>
                                </p>
                                <form name="myform" method="post" action="?p=trx_confirm">
                                <input type="hidden" name="jml" value="<?php echo $jmlh ; ?>">
                                <input type="hidden" name="dari" value="<?php echo $dari1 ; ?>">
                                <input type="hidden" name="sampai" value="<?php echo $sampai1 ; ?>">
                                    <div class="form-body">
                                    <div class="form-group row">
                                    <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                            <tr class="border-1">
                                                <th class="border-0 font-14 font-weight-medium text-muted">No Kamar</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Kelas</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Harga Per Malam</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Status</th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Pilih Kamar</th>
                                            </tr>
                                            <?php
                                                $sql1=$conn->prepare("SELECT * FROM kamar ");
                                                $sql1->execute();
                              
                                                while($data=$sql1->fetch(PDO::FETCH_ASSOC) ){
                                                $status=$data['status_kamar'];
                                                $harga=number_format($data['harga']);
                                    
                                                    //
                                                    if ($status=="Kosong"){
                                                        $cek="";
                                                    }
                                                    else {
                                                        $cek="disabled";
                                                    }
                              
                                                    echo "<tr><td>$data[no_kamar]</td><td>$data[kelas]</td><td>$harga</td><td>$data[status_kamar]</td><td ><input type='checkbox' name='cek[]'  id='termsChkbx'  value='$data[no_kamar]'  onClick='this.form.total.value=checkChoice(this)' onChange='isChecked(this, \"sub1\")' $cek ></td></tr>";
                                                }

                                            ?>
                                            <tr>
                                            <td colspan="4" align="right"><strong>Total Kamar yang dipilih : <input type="hidden" name="hiddentotal" value="0">
                                            <span id="update"></span></strong></td>
                                            <td><a href="?p=tambah_tamu" title="Klik disini jika data tamu belum dimasukan!" target="_blank">Tambah Data Tamu</a></td>
                                            </tr>
                                            <tr>
                                            <td colspan="5" align="right"><button name="apply" class="btn btn-info" id="sub1" disabled="disabled" onClick="return confirm('Apakah anda sudah menginput data tamu?')">Pilih Kamar</button></td>
                                            </tr>
                                    </table>
                                </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>