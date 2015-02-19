<?php
include "../config/koneksi.php";
include "../config/fungsiku.php";

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$uname = anti_injection($_POST['username']);
$upass = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($uname) OR !ctype_alnum($upass)){
  header('location:index.php');
}else{
	$login=mysql_query("SELECT * FROM user WHERE uUname='$uname' AND uPass='$upass'");	
	$ketemu=mysql_num_rows($login);
	$r=mysql_fetch_array($login);
	$uid=$r['uUname'];
	$unama=$r['uNama'];
	$ulevel=$r['uLevel'];
	
	
	// apabila username dan password ditemukan
	if ($ketemu > 0){
		session_start();
		include "timeout.php";
		$_SESSION['medId'] = $uid;
		$_SESSION['medNama'] = $unama;
		$_SESSION['medLevel'] = $ulevel;
		getPAktif();

		timer();
		$sid_lama = session_id();
    	session_regenerate_id();
    	$sid_baru = session_id();
    	mysql_query("UPDATE user SET uSes='$sid_baru' WHERE uUname='$uname'");
		header('location:media.php?page=home');
	}else{
		echo "<script>parent.location = 'index.php?result=error';</script>";  
	}
}
?>
