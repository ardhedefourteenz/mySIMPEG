<?php
if ($_SESSION['medLevel']=='0'){
	include "content_admin.php";
}elseif ($_SESSION['medLevel']=='1'){
	include "content_operator.php";
}
?>