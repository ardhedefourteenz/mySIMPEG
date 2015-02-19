<?php
if ($_SESSION['medLevel']=='0'){
	include "menu_admin.php";
}elseif ($_SESSION['medLevel']=='1'){
	include "menu_operator.php";
}
?>