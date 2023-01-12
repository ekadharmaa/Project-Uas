<?php
require_once("config/config.php");
require_once("config/function.php");

date_default_timezone_set("Asia/Jakarta");
$thi=date('Y-m-d');
$connection=new Connection() ;
$conn=$connection->getConnection();

$sql2="DELETE FROM tmp_reservasi";
  $delete2=$conn->exec($sql2);

if(isset($_POST['simpan'])){
$nk=$_POST['nokamar'];
$kelas=$_POST['kelas'];
$harga=$_POST['harga'];


        $sqlgetin6=$conn->prepare("SELECT * FROM kamar WHERE no_kamar='$nk'");
      $sqlgetin6->execute();
        $ada=$sqlgetin6->fetch(PDO::FETCH_COLUMN)+0;
if($ada==0){
 $sql="INSERT INTO kamar VALUES ('$nk','$kelas','$harga')" ;
 $conn->exec($sql);


  echo "<script>alert(\"Data berhasil disimpan !\") ; window.location.href='?p=kamar' ;</script>";

}
else {
  echo "<script>alert(\"Data gagal disimpan, coba lagi !\") ; window.location.href='?p=kamar' ;</script>";
  
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

<link href="assets/bs/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
                                <h4 class="card-title">Detail Reservasi</h4>
                                <form method="post" action="?p=trx_reservasi8">
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-2">Dari Tanggal :</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                         <div class="form-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                             <input class="form-control" size="16" type="date" name="dari" required="required" oninvalid="this.setCustomValidity('Silahkan Masukan Tanggal !!!')" oninput="setCustomValidity('')" value="<?php echo $thi ; ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2">Sampai Tanggal :</label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                            <input class="form-control" size="16" type="date" name="sampai" required="required" oninvalid="this.setCustomValidity('Silahkan Masukan Tanggal !!!')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success" name="btntanggal">Cek Kamar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div>


<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>