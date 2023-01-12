<?php

Class Connection{
function getConnection(){

	$host="localhost";
	$pass="";
	$user="root";
	$db="hotel";

	try {
		$conn= new PDO ("mysql:host=$host;dbname=$db", $user,$pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	catch(PDOException $e){
		echo "Gagal Koneksi, Karena : ".$e->getMessage();
	}

}
}

?>