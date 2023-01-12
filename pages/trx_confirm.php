<?php
$cek=$_POST['cek'];
$dari=$_POST['dari'];
$sampai=$_POST['sampai'];
$jmlh=$_POST['jml'];
for ($i=0; $i<sizeof($cek); $i++){

	$sqlget=$conn->prepare("SELECT * FROM kamar WHERE no_kamar='$cek[$i]'");
				$sqlget->execute();
				$data=$sqlget->fetch(PDO::FETCH_ASSOC);
					$nk=$data['no_kamar'];
					$kelas=$data['kelas'];
					$harga=$data['harga'];
					$tot=$harga*$jmlh ;


 $sql="INSERT INTO tmp_reservasi VALUES ('','$nk','$kelas','$harga','$jmlh','$tot')" ;
 $conn->exec($sql);

}

?>
<script type="text/javascript">
	window.location.href="?p=trx_review&&dari=<?php echo $dari ; ?>&&sampai=<?php echo $sampai ; ?>&&lama=<?php echo $jmlh ; ?>";
</script>