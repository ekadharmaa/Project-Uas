<?php

//** Created By : ekadharma **//

include_once('config.php');

function insertThreeTable($table,$one,$two,$three,$page){
	$connection=new Connection();
$con=$connection->getConnection();
	try{
	$sql="INSERT INTO $table VALUES ('$one','$two','$three')";
	$insert=$con->exec($sql);
		
	if($insert){
		echo "<script> alert(\"Succesfully inserted data\");
		window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
 }
function insertFourTable($table,$one,$two,$three,$four,$page){
	$connection=new Connection();
$con=$connection->getConnection();
	try{
	$sql="INSERT INTO $table VALUES ('$one','$two','$three','$four')";
	$insert=$con->exec($sql);
		
	if($insert){
		echo "<script> alert(\"Succesfully inserted data\");
		window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
 }

function insertTwoTableAI($table,$one,$page){
	$connection=new Connection();
$con=$connection->getConnection();
	try{
	$sql="INSERT INTO $table VALUES ('','$one')";
	$insert=$con->exec($sql);
		
	if($insert){
		echo "<script> alert(\"Succesfully inserted data\");
		window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
 }


function insertThreeTableAI($table,$one,$two,$page){
	$connection=new Connection();
$con=$connection->getConnection();
	try{
	$sql="INSERT INTO $table VALUES ('','$one','$two')";
	$insert=$con->exec($sql);
		
	if($insert){
		echo "<script> alert(\"Succesfully inserted data\");
		window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
 }


function insertFourTableAI($table,$one,$two,$three,$page){
	$connection=new Connection();
$con=$connection->getConnection();
	try{
	$sql="INSERT INTO $table VALUES ('','$one','$two','$three')";
	$insert=$con->exec($sql);
		
	if($insert){
		echo "<script> alert(\"Succesfully inserted data\");
		window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
 }
function insertFiveTableAI($table,$one,$two,$three,$four,$page){
	$connection=new Connection();
	$con=$connection->getConnection();
	try{
		$sql="INSERT INTO $table VALUES ('','$one','$two','$three','$four')";
		$insert=$con->exec($sql);
		
		if($insert){
			echo "<script> alert(\"Succesfully inserted data\");
			window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
}
function insertSixTableAI($table,$one,$two,$three,$four,$five,$page){
	$connection=new Connection();
	$con=$connection->getConnection();
	try{
		$sql="INSERT INTO $table VALUES ('','$one','$two','$three','$four','$five')";
		$insert=$con->exec($sql);
		
		if($insert){
			echo "<script> alert(\"Succesfully inserted data\");
			window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
}
function insertSevenTableAI($table,$one,$two,$three,$four,$five,$six,$page){
	$connection=new Connection();
	$con=$connection->getConnection();
	try{
		$sql="INSERT INTO $table VALUES ('','$one','$two','$three','$four','$five','$six')";
		$insert=$con->exec($sql);
		
		if($insert){
			echo "<script> alert(\"Succesfully inserted data\");
			window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
}
function insertEightTableAI($table,$one,$two,$three,$four,$five,$six,$seven,$page){
	$connection=new Connection();
	$con=$connection->getConnection();
	try{
		$sql="INSERT INTO $table VALUES ('','$one','$two','$three','$four','$five','$six','$seven')";
		$insert=$con->exec($sql);
		
		if($insert){
			echo "<script> alert(\"Succesfully inserted data\");
			window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
}
function insertNineTableAI($table,$one,$two,$three,$four,$five,$six,$seven,$eight,$page){
	$connection=new Connection();
	$con=$connection->getConnection();
	try{
		$sql="INSERT INTO $table VALUES ('','$one','$two','$three','$four','$five','$six','$seven','$eight')";
		$insert=$con->exec($sql);
		
		if($insert){
			echo "<script> alert(\"Succesfully inserted data\");
			window.location.href='?p=$page';</script>";
		}
	}
	catch(PDOException $e){
		echo "Error : " .$e->getMessage();
	}
}
function deleteTable($table,$pk,$id,$page){
	$connection=new Connection();
	$con=$connection->getConnection();
try{
	
	$sql="DELETE FROM $table WHERE $pk='$id'";
	$delete=$con->exec($sql);
	
	echo "<script>
			alert('Data hasbeen deleted');
			window.location.href='?p=$page';
			</script>";

}
catch(PDOException $e){
	echo "Error : " .$e->getMessage();
}
}
function deleteTableImage($table,$pk,$id,$image,$page){
	$connection=new Connection();
	$con=$connection->getConnection();
try{
	$dir=$image;
	$sql="DELETE FROM $table WHERE $pk='$id'";
	$delete=$con->exec($sql);
	unlink($dir) ;
	echo "<script>
			alert('Data hasbeen deleted');
			window.location.href='?p=$page';
			</script>";

}
catch(PDOException $e){
	echo "Error : " .$e->getMessage();
}
}

function deletedir($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}
function deleteTableDirDua($table,$tabledua,$pk,$id,$directory,$page){
	$connection=new Connection();
	$con=$connection->getConnection();
try{
	
	$sql="DELETE FROM $table WHERE $pk='$id'";
	$delete=$con->exec($sql);
	$sql2="DELETE FROM $tabledua WHERE $pk='$id'";
	$delete2=$con->exec($sql2);
	foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
	
	echo "<script>
			alert('Data hasbeen deleted');
			window.location.href='?p=$page';
			</script>";

}
catch(PDOException $e){
	echo "Error : " .$e->getMessage();
}
}


//time since

function time_since($original)
{
  date_default_timezone_set('Asia/Jakarta');
  $chunks = array(
      array(60 * 60 * 24 * 365, 'years'),
      array(60 * 60 * 24 * 30, 'months'),
      array(60 * 60 * 24 * 7, 'weeks'),
      array(60 * 60 * 24, 'days'),
      array(60 * 60, 'hours'),
      array(60, 'minutes'),
  );
 
  $today = time();
  $since = $today - $original;
 
  if ($since > 604800)
  {
    $print = date("M jS", $original);
    if ($since > 31536000)
    {
      $print .= ", " . date("Y", $original);
    }
    return $print;
  }
 
  for ($i = 0, $j = count($chunks); $i < $j; $i++)
  {
    $seconds = $chunks[$i][0];
    $name = $chunks[$i][1];
 
    if (($count = floor($since / $seconds)) != 0)
      break;
  }
 
  $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
	if($print=="0 Min"){
		$tampil="Just Now" ;
	}
	else {
		$tampil=$print .' ago';
	}
  return $tampil ;
}

//select admin 
function selectPictAdmin($username){
	$connection= new Connection();
	$conn=$connection->getConnection();
	
		$sql=$conn->prepare("SELECT * FROM admin WHERE username='$username'");
		$sql->execute();
		$data=$sql->fetch(PDO::FECTH_ASSOC);
		echo "$data[foto]";
		
	
}


function tglindo($tanggal){
	$tgl=strtotime($tanggal);
	$tglnya=date('d-m-Y',$tgl);
	return($tglnya);
}
function laporanbulan($bulan,$tahun){
	switch($bulan){
		case "01" :
			$nmbulan ="Januari";
			break;
		case "02" :
			$nmbulan ="Februari";
			break;
		case "03" :
			$nmbulan ="Maret" ;
			break;
		case "04" :
			$nmbulan="April";
			break;
		case "05":
			$nmbulan="Mei";
			break;
		case "06" :
			$nmbulan="Juni";
			break;
		case "07" :
			$nmbulan="Juli";
			break ;
		case "08" :
			$nmbulan="Agustus";
			break;
		case "09" :
			$nmbulan="September";
			break;
		case "10" :
			$nmbulan="Oktober";
			break;
		case "11" :
			$nmbulan="November" ;
			break;
		case "12" :
			$nmbulan="Desember" ;
			break;
	}
	$result=$nmbulan." ".$tahun ;
	return($result);
}

function namabulan($bulan){
	switch($bulan){
		case "01" :
			$nmbulan ="Januari";
			break;
		case "02" :
			$nmbulan ="Februari";
			break;
		case "03" :
			$nmbulan ="Maret" ;
			break;
		case "04" :
			$nmbulan="April";
			break;
		case "05":
			$nmbulan="Mei";
			break;
		case "06" :
			$nmbulan="Juni";
			break;
		case "07" :
			$nmbulan="Juli";
			break ;
		case "08" :
			$nmbulan="Agustus";
			break;
		case "09" :
			$nmbulan="September";
			break;
		case "10" :
			$nmbulan="Oktober";
			break;
		case "11" :
			$nmbulan="November" ;
			break;
		case "12" :
			$nmbulan="Desember" ;
			break;
	}
	$result=$nmbulan;
	return($result);
}
function laporantanggal($dari,$sampai){
	$a=date('d-M-Y',strtotime($dari));
	$b=date('d-M-Y',strtotime($sampai));
	return($a." s/d ".$b) ;
}
function hariini($hariini){
	$ambilhari=date('D',strtotime($hariini));
	$namahari=array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
	);
	$hari=$namahari[$ambilhari].", ".$hariini;
	
	return($hari);

}
function hariinibulan($hariini){
	$ambilhari=date('D',strtotime($hariini));
	$ambilbulan=date('M',strtotime($hariini));
	$ambiltgl=date('d',strtotime($hariini));
	$ambilthn=date('Y',strtotime($hariini));
	
	$namahari=array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
	);
	$namabulan=array(
			'Jan' => 'Januari',
			'Feb' => 'Februari',
			'Mar' => 'Maret',
			'Apr' => 'April',
			'May' => 'Mei',
			'Jun' => 'Juni',
			'Jul' => 'Jul',
			'Aug' => 'Agustus',
			'Sep' => 'September',
			'Oct' => 'Oktober',
			'Nov' => 'November',
			'Dec' => 'Desember'
	);
		
	$hari=$namahari[$ambilhari].", ".$ambiltgl." ".$namabulan[$ambilbulan]." ".$ambilthn;
	
	return($hari);

}

function Terbilang($x)
{
  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", 

"sepuluh", "sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . "belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
}
function antaratanggal($startDate, $endDate)
{
    $return = array($startDate);
    $start = $startDate;
    $i=1;
    if (strtotime($startDate) < strtotime($endDate))
    {
       while (strtotime($start) < strtotime($endDate))
        {
            $start = date('Y-m-d', strtotime($startDate.'+'.$i.' days'));
            $return[] = $start;
            $i++;
        }
    }

    return $return;
} 

function cek($table,$pk,$post){
	$connection= new Connection();
	$conn=$connection->getConnection();
	//mulai
	$sql=$conn->prepare("SELECT COUNT(*) FROM $table WHERE $pk=$post");
		$sql->execute();
	$hasil=$sql->fetch(PDO::FETCH_COLUMN);
	//hasil
	return $hasil;
}
function gagalpk($page,$pk){
	$dan="<script>
	alert(\"Maaf $pk sudah digunakan !\") ;
	window.location.href='?p=$page' ; </script>";
	echo $dan;
	return ;
}
function sumTableBln($nmtbl,$pk,$tgl,$bln){
$connection= new Connection();
$conn=$connection->getConnection();

$sql=$conn->query("SELECT SUM($pk) FROM $nmtbl WHERE $tgl LIKE '$bln%'");
$pbii=$sql->fetchColumn();
return($pbii);
}
?>