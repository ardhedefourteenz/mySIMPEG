<?php
include "koneksi.php";
date_default_timezone_set('Asia/Makassar');

function getData($field,$tabel,$term){
	$dt = mysql_fetch_array(mysql_query("SELECT $field FROM $tabel WHERE $term"));
	return $dt;
}

function getValue($field,$table,$term){
	$z = mysql_fetch_array(mysql_query("SELECT $field FROM $table WHERE $term"));
	return $z[0];
}

function getJumlah($query){
	$z = mysql_num_rows(mysql_query("$query"));
	return $z;
}

function getAktivitas($field,$tabel,$id){
	$z = mysql_num_rows(mysql_query("SELECT $field FROM $tabel WHERE $field='$id'"));
	return $z;
}

function getTahun(){
	$thn_s = date('Y');
	$start = 2005;
	$thn = array();
	for ($x = $start; $x <= $thn_s; $x++){
		array_push($thn, $x);
	}
	return $thn;
}

function getMRNum($field,$tabel,$term,$jslice){
	$q = mysql_fetch_array(mysql_query("SELECT MAX($field) as x FROM $tabel WHERE $term"));
	$d = $q['x'];
	$not = substr($d, $jslice,5);
	
	if ($not==""){
		$y = "00001";
	}else{
		$i = $not;
		$i++;
		if (strlen($i)==1){
			$y="0000".$i;
		}elseif (strlen($i)==2){
			$y="000".$i;
		}elseif (strlen($i)==3){
			$y="00".$i;
		}elseif (strlen($i)==4) {
			$y="0".$i;
		}else{
			$y=$i;
		}
	}
	return $y; 
}

function getPAktif(){
	$dt = mysql_fetch_array(mysql_query("SELECT * FROM periode WHERE pAktif='1'"));
	$prId = $dt['pId'];
	$prStg = $dt['pSatgas'];
	$_SESSION['sesPr'] = $prId;
	$_SESSION['sesStg'] = $prStg;
}



function getProporsi($nil){
	if (($nil>=50)&&($nil<=58)){
		return "100 %";
	}else if (($nil>=40)&&($nil<=49)){
		return "90 %";
	}else if (($nil>=30)&&($nil<=39)){
		return "80 %";
	}else if (($nil>=20)&&($nil<=29)){
		return "70 %";
	}
}


function getNHuruf($nil){
	if (($nil>85)){
		return "A";
	}else if (($nil>=81)&&($nil<=85)){
		return "A-";
	}else if (($nil>=76)&&($nil<=80)){
		return "B+";
	}else if (($nil>=71)&&($nil<=75)){
		return "B";
	}else if (($nil>=66)&&($nil<=70)){
		return "B-";
	}else if (($nil>=61)&&($nil<=65)){
		return "C+";
	}else if (($nil>=51)&&($nil<=60)){
		return "C";
	}else if (($nil>=45)&&($nil<=50)){
		return "D";
	}else if (($nil<45)){
		return "E";
	}
}
?>