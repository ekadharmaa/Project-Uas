<?php
require_once("config/config.php");
$connection=new Connection() ;
$conn=$connection->getConnection();


if(!empty($_POST["nokamar"])) {
  $sql2=$conn->query("SELECT * FROM kamar WHERE no_kamar='" . $_POST["nokamar"] . "'");
  $sql2->execute();
  $row2= $sql2->fetch(PDO::FETCH_ASSOC);
  $sql1=$conn->query("SELECT count(*) FROM kamar WHERE no_kamar='" . $_POST["nokamar"] . "'");
  $row = $sql1->fetchColumn();
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available'>Maaf, No Kamar sudah ada!!!.</span>";
  }else{
      echo "<span class='status-available'> </span>";
  }
}
?>