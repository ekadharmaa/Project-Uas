<?php
require_once("config/config.php");
$connection=new Connection() ;
$conn=$connection->getConnection();


if(!empty($_POST["username"])) {
  $sql2=$conn->query("SELECT * FROM admin WHERE username='" . $_POST["username"] . "'");
  $sql2->execute();
  $row2= $sql2->fetch(PDO::FETCH_ASSOC);
  $sql1=$conn->query("SELECT count(*) FROM admin WHERE username='" . $_POST["username"] . "'");
  $row = $sql1->fetchColumn();
  $user_count = $row[0];
    if($user_count>0) {
        echo "<span class='status-not-available'>Maaf, Username Telah Digunakan Oleh '".$row2['nama_admin']."'.</span>";
    }else{
        echo "<span class='status-available'> </span>";
    }
    }
?>