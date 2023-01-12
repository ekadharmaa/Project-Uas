<?php

require_once("config/config.php");

require_once("config/function.php");
$connection=new Connection() ;
$conn=$connection->getConnection();

if(isset($_POST['simpan'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $nama_admin=$_POST['nama_admin'];
    $nohp=$_POST['nohp'];
    $alamat=$_POST['alamat'];
    $tanggal_lahir=$_POST['tanggal_lahir'];
    
    $sql="INSERT INTO admin VALUES ('$username','$password','$nama_admin','$nohp','$alamat','$tanggal_lahir')" ;
    $conn->exec($sql);
   
   if($sql){
   
     echo "<script>alert(\"Data berhasil ditambahkan !\") ; window.location.href='?p=data_karyawan' ;</script>";
   }
   else {
     echo "<script>alert(\"Data gagal disimpan !\") ; window.location.href='?p=data_karyawan' ;</script>" ;
   }
   
   
   }


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
    url: "cek_username.php",
    data:'username='+$("#username").val(),
    type: "POST",
    success:function(data){
        $("#user-availability-status").html(data);
    },
    error:function (){}
    });
}
</script>
    <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Karyawan</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="?p=home" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Data Karyawan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
    </div>
    <!-- END -->
    <div class="container-fluid">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Tamu</h4>
                                <form method="post" action="<?php $_SERVER['PHP_SELF'] ; ?>" onSubmit="return confirm('Anda yakin akan menyimpan data ?')">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-2">Username</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" name="username" id="username"  class="form-control" placeholder="Masukan Username" onBlur="checkAvailability()"  required="required" oninvalid="this.setCustomValidity('Ex : B09')" oninput="setCustomValidity('')" required=""><span id="user-availability-status"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Nama Lengkap</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" name="nama_admin"  class="form-control" placeholder="Masukan Nama Lengkap" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Passowrd</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="password" name="password"  class="form-control" placeholder="Masukan Password" required>
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
                                            <label class="col-md-2">Tanggal Lahir</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                        <input type="date" name="tanggal_lahir"  class="form-control" required>
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