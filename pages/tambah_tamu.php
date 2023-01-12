<?php

require_once("config/config.php");

require_once("config/function.php");
$connection=new Connection() ;
$conn=$connection->getConnection();

if(isset($_POST['simpan'])){
$idtamu=$_POST['idtamu'];
$nama=$_POST['nama'];
$noid=$_POST['noid'];
$tanggal=$_POST['tanggal'];
$jk=$_POST['jk'];
$alamat=$_POST['alamat'];
$nohp=$_POST['nohp'];

$cek=cek("tamu","no_identitas",$noid);
if($cek==0){
 $sql="INSERT INTO tamu VALUES ('$idtamu','$noid','$nama','$tanggal','$jk','$alamat','$nohp')" ;
 $conn->exec($sql);


  echo "<script>alert(\"Databerhasil disimpan !\") ; window.location.href='?p=tamu' ;</script>";

}
else {
  echo "<script>alert(\"Data gagal disimpan, coba lagi !\") ; window.location.href='?p=tamu' ;</script>";
  
}

}

//Kode buat tamu
    $query1 = $conn->prepare("SELECT MAX(id_tamu) as maxID FROM tamu WHERE id_tamu LIKE 'T%'");
    $query1->execute();
    $idMax = $query1->fetch(PDO::FETCH_COLUMN);

    $idm1 = (int) substr($idMax, 1, 7);

    $query2 = $conn->prepare("SELECT MAX(id_tamu) as maxIDD FROM reservasi WHERE id_tamu LIKE 'T%'");
    $query2->execute();
    $idMax2 = $query2->fetch(PDO::FETCH_COLUMN);

    $idm2 = (int) substr($idMax2, 1, 7);


    if($idm1>=$idm2){
      $idm1++;
      $NoUrut=$idm1;
    }
    else {
      $idm2++;

      $NoUrut=$idm2;

    }

   //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
    $NewID = "T" .sprintf('%07s', $NoUrut);

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
    url: "cek_available.php",
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
                                <h4 class="card-title">Tambah Tamu</h4>
                                <form method="post" action="<?php $_SERVER['PHP_SELF'] ; ?>" onSubmit="return confirm('Anda yakin akan menyimpan data ?')">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-2">ID Tamu</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" name="idtamu"  class="form-control"  readonly="readonly" value="<?php echo $NewID ; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">No. Identitas (KTP)</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" name="noid" id="noid"  class="form-control" placeholder="Masukan No Identitas (KTP)" onBlur="checkAvailability()"  required="required" oninvalid="this.setCustomValidity('Ex : 3202280507880005')" oninput="setCustomValidity('')" required=""><span id="user-availability-status"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Nama Tamu</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" name="nama"  class="form-control" placeholder="Masukan Nama Tamu" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Tanggal Lahir</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                        <input type="date" name="tanggal" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-md-2">Jenis Kelamin</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <select class="form-control" name="jk" required >
                                                            <option value="">Silahkan Pilih</option>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                            <label class="col-md-2">Alamat</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                        <textarea class="form-control" name="alamat" placeholder="Contoh: Jl.Raya Sesetan"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-md-2">No Hp</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                        <input type="text" name="nohp"  class="form-control" placeholder="Masukan No HP" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button class="btn btn-warning" type="reset" name="reset">Reset</button>  
                                            <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div>