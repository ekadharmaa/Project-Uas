<?php

require_once("config/config.php");

require_once("config/function.php");
$connection=new Connection() ;
$conn=$connection->getConnection();


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
    <div class="main-content">
        <div class="container-fluid">
                <div class="d-flex align-items-center mb-1">
                    <h3 class="card-title"><strong>Data Laporan</strong></h3>
                </div>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row">
          		<div class="col-lg-6">
                  <div class="panel">
                  <div class="panel-heading">
                  	  <h4 class="mb"><strong> Laporan Periode Tanggal</strong></h4>
                      </div>
                      <div class="panel-body">

        <form method="post" action="pages/cetak_laporan.php" class="form-horizontal" target="_blank" >

		<div class="form-group">
			<label class="col-sm-8 col-sm-8 control-label text-center">Dari Tanggal :</label>
			<div class="col-sm-8">
			              <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="date" name="dari"  required="required" oninvalid="this.setCustomValidity('Silahkan Masukan Tanggal !!!')" oninput="setCustomValidity('')">
                </div>
                </div>
		</div>
		<div class="form-group">
			<label class="col-sm-8 col-sm-8 control-label text-center">Sampai Tanggal :</label>
			<div class="col-sm-8">
			              <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="date" name="sampai" required="required" oninvalid="this.setCustomValidity('Silahkan Masukan Tanggal !!!')" oninput="setCustomValidity('')">
                </div>
                </div>
		</div>
		<div class="form-group text-right">
    <div class="col-lg-5">
			<button class="btn btn-success" type="submit" name="btntanggal"> Cetak</button>
		</div>
    </div>
		</form>
<script type="text/javascript" src="assets/bs/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/bs/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/bs/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="assets/bs/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
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
						
                          </div>
                          
                  </div>
                  </div>
              <!-- col-lg-12-->  
              <div class="col-lg-6">
               <div class="panel">
                  <div class="panel-heading">
                      <h4 class="mb"><strong> Laporan Periode Bulan</strong></h4>
                      </div>
                      <div class="panel-body">

<form method="post" action="pages/cetak_laporan.php" class="form-horizontal" target="_blank" >

    <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label text-center">Bulan</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="bulan" required >
                                    <option value="">Silahkan Pilih</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                  </select>
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-8 col-sm-8 control-label text-center">Tahun</label>
                              <div class="col-sm-9">
                                  <select   class="form-control" name="tahun" required >
                                    <option value="">Silahkan Pilih</option>
                        <?php
                        $year=date('Y');
                        for($i=$year;$i>=2022;$i--){
                        echo "<option value='$i'>$i</option>";
                        }
                        ?>
                                    
                                   
                                  </select>
                              </div>
                          </div>
                          
                          <div class="form-group">
                          <div class="col-sm-5 text-right"> 
                         
                          <button class="btn btn-success" type="submit" name="btnbulan">Cetak</button>
                          </div>
                          </div>
            
                          </div>
                          
                  </div>

              </div>    	
          	</div><!-- /row -->
            </div>
            </div>
            </div>
            </div>
