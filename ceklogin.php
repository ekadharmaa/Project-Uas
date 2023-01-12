<?php
require_once('config/config.php');

class ceklogin{
	function getceklogin(){
		$connection= new Connection();
		$conn=$connection->getConnection();
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		try{
	$query=$conn->prepare("select * from admin where username=:user and password=:pass");
	$query->BindParam(":user",$user);
	$query->BindParam(":pass",$pass);
	$query->execute();
	if ($query->rowCount()>0){
		session_start();
		$data=$query->fetch();
			$_SESSION['username']=$data['username'];
			header('location:index.php');
		
	}
	else{
		echo "<script>alert(\"Username atau Password tidak ada !\"); window.location.href='login.php';</script>";
	}
		}
		catch (PDOException $e){
			echo "tidak ada : " .$e->getMessage();
			
		}
	}
}
$cek=new ceklogin();
$cek->getceklogin();
?>