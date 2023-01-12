<?php
require_once('config/config.php');

$connection=new Connection();
$conn=$connection->getConnection();
$id=$_GET['id'];


    $query3 = $conn->prepare("SELECT * FROM reservasi  WHERE no_reservasi='$id'");
    $query3->execute();
    $data = $query3->fetch(PDO::FETCH_ASSOC);

    if($data['status']=="Checkin"){
    	echo "<script>alert(\"Mohon maaf data reservasi tidak bisa di hapus karena statusnya sedang Checkin\") ; window.location.href='?p=data_reservasi' ; </script>";
    }
    else {

$sql2="DELETE FROM reservasi WHERE no_reservasi='$id'";
	$delete2=$conn->exec($sql2);

$sql3="DELETE FROM detail_reservasi WHERE no_reservasi='$id'";
	$delete3=$conn->exec($sql3);
	?>
	<script>
					alert('Data berhasil dihapus');
					window.location.href="?p=data_reservasi";
					</script>
					<?php

    }


?>

				