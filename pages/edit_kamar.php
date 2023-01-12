<?php

require_once("config/config.php");

require_once("config/function.php");
$connection=new Connection() ;
$conn=$connection->getConnection();

if(isset($_POST['simpan'])){
$nk=$_POST['nokamar'];
$kelas=$_POST['kelas'];
$harga=$_POST['harga'];


 $sql="UPDATE kamar SET kelas='$kelas', harga='$harga'" ;
 $conn->exec($sql);


  echo "<script>alert(\"Data berhasil diupdate !\") ; window.location.href='?p=kamar' ;</script>";



}


$id=$_GET['id'];
    $query3 = $conn->prepare("SELECT * FROM kamar WHERE no_kamar='$id'");
    $query3->execute();
    $data = $query3->fetch(PDO::FETCH_ASSOC);

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
    url: "cek_available2.php",
    data:'nokamar='+$("#nokamar").val(),
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
                                <h4 class="card-title">Tambah Kamar</h4>
                                <form method="post" action="<?php $_SERVER['PHP_SELF'] ; ?>" onSubmit="return confirm('Anda yakin akan menyimpan data ?')">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-2">No. Kamar</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                        <input type="text" name="nokamar" id="nokamar" value="<?php echo $data['no_kamar'] ; ?>"  class="form-control" placeholder="Masukan No Kamar" readonly="readonly" required="required" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                            <label class="col-md-2">Kelas</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <select class="form-control" name="kelas" required >
                                                            <option value="<?php echo $data['kelas'] ; ?>"><?php echo $data['kelas'] ; ?></option>
                                                            <option value="Low Budget">Low Budget</option>
                                                            <option value="Full Service">Full Service</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                            <label class="col-md-2">Harga Per Malam</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                        <input type="text" name="harga" value="<?php echo $data['harga'] ; ?>"  class="form-control" placeholder="Masukan Harga" required>
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